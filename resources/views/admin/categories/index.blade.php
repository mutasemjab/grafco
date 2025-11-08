@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">{{ __('messages.categories') }}</h1>
        @can('category-create')
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> {{ __('messages.add_category') }}
        </a>
        @endcan
    </div>


    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('messages.id') }}</th>
                            <th>{{ __('messages.name_en') }}</th>
                            <th>{{ __('messages.name_ar') }}</th>
                            <th>{{ __('messages.parent_category') }}</th>
                            <th>{{ __('messages.brands') }}</th>
                            <th>{{ __('messages.sort_order') }}</th>
                            <th>{{ __('messages.status') }}</th>
                            <th>{{ __('messages.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name_en }}</td>
                            <td>{{ $category->name_ar }}</td>
                            <td>
                                @if($category->parent)
                                    <span class="badge bg-secondary">{{ $category->parent->name_en }}</span>
                                @else
                                    <span class="text-muted">{{ __('messages.main_category') }}</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-info">{{ $category->brands->count() }}</span>
                            </td>
                            <td>{{ $category->sort_order }}</td>
                            <td>
                                @if($category->is_active)
                                    <span class="badge bg-success">{{ __('messages.active') }}</span>
                                @else
                                    <span class="badge bg-danger">{{ __('messages.inactive') }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    @can('category-edit')
                                    <a href="{{ route('admin.categories.edit', $category) }}" 
                                       class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan
                                    
                                    @can('category-delete')
                                    <form action="{{ route('admin.categories.destroy', $category) }}" 
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
                            <td colspan="8" class="text-center text-muted py-4">
                                {{ __('messages.no_categories_found') }}
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection