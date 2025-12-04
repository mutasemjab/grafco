@extends('layouts.app')

@section('content')
<div class="container">
    <div class="search-results">
        <h1>{{ __('front.search_results') }}</h1>
        <p>{{ __('front.search_results_for') }}: <strong>{{ $query }}</strong></p>
        <p>{{ __('front.found') }} {{ $products->total() }} {{ __('front.products') }}</p>
        
        @if($products->count() > 0)
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <a href="{{ route('product.details', $product->slug) }}">
                            <img src="{{ asset('assets/admin/uploads/' . $product->thumbnail) }}" alt="{{ $product->name }}">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ Str::limit($product->subtitle, 100) }}</p>
                            <span class="price">{{ $product->price_display }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
            
            <div class="pagination">
                {{ $products->appends(['q' => $query])->links() }}
            </div>
        @else
            <div class="no-results">
                <p>{{ __('front.no_products_found') }}</p>
                <a href="{{ route('products.index') }}" class="btn-primary">
                    {{ __('front.view_all_products') }}
                </a>
            </div>
        @endif
    </div>
</div>
@endsection