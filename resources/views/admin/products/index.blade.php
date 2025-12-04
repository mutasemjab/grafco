@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">{{ __('messages.products') }}</h1>
        @can('product-create')
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> {{ __('messages.add_product') }}
        </a>
        @endcan
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
            <form action="{{ route('admin.products.index') }}" method="GET">
                <div class="row g-3">
                    <!-- Search -->
                    <div class="col-md-4">
                        <label class="form-label">{{ __('messages.search') }}</label>
                        <input type="text" 
                               name="search" 
                               class="form-control" 
                               placeholder="{{ __('messages.search_products') }}"
                               value="{{ request('search') }}">
                    </div>

                    <!-- Category Filter -->
                    <div class="col-md-2">
                        <label class="form-label">{{ __('messages.category') }}</label>
                        <select name="category" class="form-select">
                            <option value="">{{ __('messages.all_categories') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                        {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name_en }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Brand Filter -->
                    <div class="col-md-2">
                        <label class="form-label">{{ __('messages.brand') }}</label>
                        <select name="brand" class="form-select">
                            <option value="">{{ __('messages.all_brands') }}</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" 
                                        {{ request('brand') == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status Filter -->
                    <div class="col-md-2">
                        <label class="form-label">{{ __('messages.status') }}</label>
                        <select name="status" class="form-select">
                            <option value="">{{ __('messages.all_status') }}</option>
                            <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>
                                {{ __('messages.active') }}
                            </option>
                            <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>
                                {{ __('messages.inactive') }}
                            </option>
                        </select>
                    </div>

                    <!-- Featured Filter -->
                    <div class="col-md-2">
                        <label class="form-label">{{ __('messages.featured') }}</label>
                        <select name="featured" class="form-select">
                            <option value="">{{ __('messages.all') }}</option>
                            <option value="1" {{ request('featured') === '1' ? 'selected' : '' }}>
                                {{ __('messages.featured_only') }}
                            </option>
                            <option value="0" {{ request('featured') === '0' ? 'selected' : '' }}>
                                {{ __('messages.not_featured') }}
                            </option>
                        </select>
                    </div>

                    <!-- Sort By -->
                    <div class="col-md-2">
                        <label class="form-label">{{ __('messages.sort_by') }}</label>
                        <select name="sort_by" class="form-select">
                            <option value="sort_order" {{ request('sort_by') == 'sort_order' ? 'selected' : '' }}>
                                {{ __('messages.default_order') }}
                            </option>
                            <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>
                                {{ __('messages.name') }}
                            </option>
                            <option value="price" {{ request('sort_by') == 'price' ? 'selected' : '' }}>
                                {{ __('messages.price') }}
                            </option>
                            <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>
                                {{ __('messages.date_created') }}
                            </option>
                        </select>
                    </div>

                    <!-- Sort Order -->
                    <div class="col-md-2">
                        <label class="form-label">{{ __('messages.order') }}</label>
                        <select name="sort_order" class="form-select">
                            <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>
                                {{ __('messages.ascending') }}
                            </option>
                            <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>
                                {{ __('messages.descending') }}
                            </option>
                        </select>
                    </div>

                    <!-- Action Buttons -->
                    <div class="col-md-8 d-flex align-items-end gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> {{ __('messages.filter') }}
                        </button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                            <i class="fas fa-redo"></i> {{ __('messages.reset') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Results Summary -->
    @if(request()->hasAny(['search', 'category', 'brand', 'status', 'featured']))
    <div class="alert alert-info mb-3">
        <i class="fas fa-info-circle"></i>
        {{ __('messages.showing') }} <strong>{{ $products->total() }}</strong> {{ __('messages.results') }}
        @if(request('search'))
            {{ __('messages.for_search') }}: <strong>"{{ request('search') }}"</strong>
        @endif
        <a href="{{ route('admin.products.index') }}" class="alert-link ms-2">
            {{ __('messages.clear_filters') }}
        </a>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 60px;">{{ __('messages.image') }}</th>
                            <th>{{ __('messages.name_en') }}</th>
                            <th>{{ __('messages.name_ar') }}</th>
                            <th>{{ __('messages.category') }}</th>
                            <th>{{ __('messages.brand') }}</th>
                            <th>{{ __('messages.price') }}</th>
                            <th>{{ __('messages.featured') }}</th>
                            <th>{{ __('messages.status') }}</th>
                            <th>{{ __('messages.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>
                                @if($product->thumbnail)
                                    <img src="{{ asset('assets/admin/uploads/'.$product->thumbnail) }}" 
                                         alt="{{ $product->name_en }}" 
                                         class="img-thumbnail" 
                                         style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center" 
                                         style="width: 50px; height: 50px;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $product->name_en }}</td>
                            <td dir="rtl">{{ $product->name_ar }}</td>
                            <td>
                                <span class="badge bg-secondary">{{ $product->category->name_en }}</span>
                            </td>
                            <td>{{ $product->brand->name }}</td>
                            <td>
                                @if($product->show_price)
                                    <strong>{{ number_format($product->price, 2) }}</strong>
                                @else
                                    <span class="text-muted">{{ __('messages.poa') }}</span>
                                @endif
                            </td>
                            <td>
                                @if($product->is_featured)
                                    <i class="fas fa-star text-warning"></i>
                                @endif
                            </td>
                            <td>
                                @if($product->is_active)
                                    <span class="badge bg-success">{{ __('messages.active') }}</span>
                                @else
                                    <span class="badge bg-danger">{{ __('messages.inactive') }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    @can('product-edit')
                                    <a href="{{ route('admin.products.edit', $product) }}" 
                                       class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan
                                    
                                    @can('product-delete')
                                    <form action="{{ route('admin.products.destroy', $product) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('{{ __('messages.confirm_delete') }}');"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">
                                @if(request()->hasAny(['search', 'category', 'brand', 'status', 'featured']))
                                    <i class="fas fa-search fa-3x mb-3 d-block"></i>
                                    {{ __('messages.no_results_found') }}
                                @else
                                    {{ __('messages.no_products_found') }}
                                @endif
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted">
                    {{ __('messages.showing') }} 
                    <strong>{{ $products->firstItem() ?? 0 }}</strong> 
                    {{ __('messages.to') }} 
                    <strong>{{ $products->lastItem() ?? 0 }}</strong> 
                    {{ __('messages.of') }} 
                    <strong>{{ $products->total() }}</strong> 
                    {{ __('messages.entries') }}
                </div>
                <div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection