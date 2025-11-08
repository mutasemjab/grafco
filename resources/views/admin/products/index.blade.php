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
                            <td>{{ $product->brand->name_en }}</td>
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
                                {{ __('messages.no_products_found') }}
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection