@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">{{ __('messages.consumable_products') }}</h3>
        <a href="{{ route('consumable_products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> {{ __('messages.add_new') }}
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Search and Filters -->
    <div class="card mb-3">
        <div class="card-header bg-light">
            <h5 class="mb-0">
                <i class="fas fa-filter"></i> {{ __('messages.search_filters') }}
            </h5>
        </div>
        <div class="card-body">
            <form action="{{ route('consumable_products.index') }}" method="GET">
                <div class="row g-3">
                    <!-- Search -->
                    <div class="col-md-4">
                        <label class="form-label">{{ __('messages.search') }}</label>
                        <input type="text" 
                               name="search" 
                               class="form-control" 
                               placeholder="{{ __('messages.search_consumable_products') }}"
                               value="{{ request('search') }}">
                    </div>

                    <!-- Consumable Filter -->
                    <div class="col-md-3">
                        <label class="form-label">{{ __('messages.consumable') }}</label>
                        <select name="consumable" class="form-select">
                            <option value="">{{ __('messages.all_consumables') }}</option>
                            @foreach($consumables as $consumable)
                                <option value="{{ $consumable->id }}" 
                                        {{ request('consumable') == $consumable->id ? 'selected' : '' }}>
                                    {{ $consumable->name_en }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Type Filter -->
                    <div class="col-md-2">
                        <label class="form-label">{{ __('messages.type') }}</label>
                        <select name="type" class="form-select">
                            <option value="">{{ __('messages.all_types') }}</option>
                            <option value="offset" {{ request('type') == 'offset' ? 'selected' : '' }}>
                                {{ __('messages.offset') }}
                            </option>
                            <option value="digital" {{ request('type') == 'digital' ? 'selected' : '' }}>
                                {{ __('messages.digital') }}
                            </option>
                        </select>
                    </div>

                    <!-- Sort By -->
                    <div class="col-md-2">
                        <label class="form-label">{{ __('messages.sort_by') }}</label>
                        <select name="sort_by" class="form-select">
                            <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>
                                {{ __('messages.date_created') }}
                            </option>
                            <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>
                                {{ __('messages.name') }}
                            </option>
                            <option value="consumable" {{ request('sort_by') == 'consumable' ? 'selected' : '' }}>
                                {{ __('messages.consumable') }}
                            </option>
                        </select>
                    </div>

                    <!-- Sort Order -->
                    <div class="col-md-1">
                        <label class="form-label">{{ __('messages.order') }}</label>
                        <select name="sort_order" class="form-select">
                            <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>
                                {{ __('messages.asc') }}
                            </option>
                            <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>
                                {{ __('messages.desc') }}
                            </option>
                        </select>
                    </div>

                    <!-- Action Buttons -->
                    <div class="col-12 d-flex align-items-end gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> {{ __('messages.filter') }}
                        </button>
                        <a href="{{ route('consumable_products.index') }}" class="btn btn-secondary">
                            <i class="fas fa-redo"></i> {{ __('messages.reset') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Results Summary -->
    @if(request()->hasAny(['search', 'consumable', 'type']))
    <div class="alert alert-info mb-3">
        <i class="fas fa-info-circle"></i>
        {{ __('messages.showing') }} <strong>{{ $items->total() }}</strong> {{ __('messages.results') }}
        @if(request('search'))
            {{ __('messages.for_search') }}: <strong>"{{ request('search') }}"</strong>
        @endif
        <a href="{{ route('consumable_products.index') }}" class="alert-link ms-2">
            {{ __('messages.clear_filters') }}
        </a>
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 80px;">{{ __('messages.photo') }}</th>
                            <th>{{ __('messages.name_en') }}</th>
                            <th>{{ __('messages.name_ar') }}</th>
                            <th>{{ __('messages.consumable') }}</th>
                            <th>{{ __('messages.type') }}</th>
                            <th style="width: 150px;">{{ __('messages.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                        <tr>
                            <td>
                                @if($item->photo)
                                    <img src="{{ asset('assets/admin/uploads/'.$item->photo) }}" 
                                         alt="{{ $item->name_en }}" 
                                         class="img-thumbnail" 
                                         style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center" 
                                         style="width: 60px; height: 60px;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $item->name_en }}</td>
                            <td dir="rtl">{{ $item->name_ar }}</td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $item->consumable->name_en ?? '-' }}
                                </span>
                            </td>
                            <td>
                                @if($item->consumable)
                                    <span class="badge {{ $item->consumable->type === 'offset' ? 'bg-primary' : 'bg-info' }}">
                                        {{ __('messages.' . $item->consumable->type) }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('consumable_products.edit', $item->id) }}" 
                                       class="btn btn-sm btn-warning"
                                       title="{{ __('messages.edit') }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('consumable_products.destroy', $item->id) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('{{ __('messages.confirm_delete') }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger"
                                                title="{{ __('messages.delete') }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                @if(request()->hasAny(['search', 'consumable', 'type']))
                                    <i class="fas fa-search fa-3x mb-3 d-block"></i>
                                    {{ __('messages.no_results_found') }}
                                @else
                                    <i class="fas fa-box-open fa-3x mb-3 d-block"></i>
                                    {{ __('messages.no_consumable_products_found') }}
                                @endif
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="text-muted">
            {{ __('messages.showing') }} 
            <strong>{{ $items->firstItem() ?? 0 }}</strong> 
            {{ __('messages.to') }} 
            <strong>{{ $items->lastItem() ?? 0 }}</strong> 
            {{ __('messages.of') }} 
            <strong>{{ $items->total() }}</strong> 
            {{ __('messages.entries') }}
        </div>
        <div>
            {{ $items->links() }}
        </div>
    </div>
</div>
@endsection