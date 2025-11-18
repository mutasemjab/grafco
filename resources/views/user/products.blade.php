@extends('layouts.app')
@section('title', __('front.title') . ' | graphco')

@section('content')
<section class="page-hero about-banner" style="background-image:url('{{ asset('assets_front/img/about-banner.jpg') }}')">
    <div class="about-banner__overlay"></div>
    <div class="container about-banner__inner">
        <h1 class="about-banner__title">Graphic Supplies Co.</h1>
    </div>
</section>

<section class="products-shell">
    <div class="container products-shell__inner">
        <aside class="prod-sidebar">
            <div class="prod-side-top">
                <div class="prod-side-main">
                    <span class="prod-side-caret">
                        <svg width="14" height="14" viewBox="0 0 24 24">
                            <path d="M7 10l5 5 5-5" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="prod-side-label">{{ $selectedCategory ? $selectedCategory->name : __('front.all_categories') }}</span>
                </div>
            </div>

           @if($selectedBrands->count() > 0)
            <div class="prod-partner">
                @foreach($selectedBrands as $index => $brand)
                <div class="{{ $index == 0 ? 'prod-partner-main' : 'prod-partner-sub' }}">
                    <a href="{{ route('products.index', ['brand' => $brand->id]) }}"
                    class="{{ $selectedBrand && $selectedBrand->id == $brand->id ? 'active-brand' : '' }}">
                        <img src="{{ asset('assets/admin/uploads/' . $brand->photo) }}"
                            alt="{{ $brand->name }}"
                            title="{{ $brand->name }}">
                    </a>
                </div>
                @endforeach
            </div>
            @endif

            <div class="prod-nav" data-prod-nav>
                @foreach($categories as $category)
                <button class="prod-nav-item {{ $selectedCategory && $selectedCategory->id == $category->id ? 'is-active' : '' }}"
                        data-prod-brand
                        data-panel="category-{{ $category->id }}"
                        data-title="{{ $category->name }}">
                    <span class="prod-nav-arrow">
                        <svg width="10" height="10" viewBox="0 0 24 24">
                            <path d="M9 6l6 6-6 6" fill="none" stroke="#665D99" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span>{{ $category->name }}</span>
                </button>
                @endforeach
            </div>
        </aside>

        <div class="prod-main">
            <div class="prod-headbar">
                <div class="prod-breadcrumb">
                    <span>{{ __('front.home') }}</span>
                    <span class="prod-sep">›</span>
                    <span>{{ __('front.products') }}</span>
                    @if($selectedBrand)
                    <span class="prod-sep">›</span>
                    <span class="prod-current">{{ $selectedBrand->name }}</span>
                    @elseif($selectedCategory)
                    <span class="prod-sep">›</span>
                    <span class="prod-current" data-prod-current>{{ $selectedCategory->name }}</span>
                    @endif
                </div>
            </div>

            <div class="prod-body">
              <div class="prod-heading">
                    <span class="prod-heading-mark">//</span>
                    <span class="prod-heading-tag" data-prod-heading>
                        @if($selectedBrand)
                            {{ $selectedBrand->name }} {{ __('front.products') }}
                        @elseif($selectedCategory)
                            {{ $selectedCategory->name }}
                        @else
                            {{ __('front.all_products') }}
                        @endif
                    </span>
                </div>

                <div class="prod-panels">
                @foreach($categories as $category)
                <div class="prod-panel {{ $selectedCategory && $selectedCategory->id == $category->id ? 'is-active' : '' }}"
                    data-panel="category-{{ $category->id }}">

                    @if($category->children->count() > 0)
                        @foreach($category->children as $subcategory)
                        <div class="prod-section">
                            <div class="prod-subheading">
                                <span class="prod-heading-mark">//</span>
                                <span>{{ $subcategory->name }}</span>
                            </div>
                            <div class="prod-grid">
                                @php
                                    $products = $subcategory->products->where('is_active', true);
                                    if($selectedBrand) {
                                        $products = $products->where('brand_id', $selectedBrand->id);
                                    }
                                @endphp

                                @forelse($products as $product)
                                <article class="prod-card">
                                    <a href="{{ route('product.details', $product->slug) }}">
                                        <div class="prod-card-img">
                                            <img src="{{ asset('assets/admin/uploads/' . $product->thumbnail) }}" alt="{{ $product->name }}">
                                        </div>
                                        <div class="prod-card-foot">{{ $product->name }}</div>
                                    </a>
                                </article>
                                @empty
                                <p class="no-products">{{ __('front.no_products_found') }}</p>
                                @endforelse
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="prod-grid">
                            @php
                                $products = $category->products->where('is_active', true);
                                if($selectedBrand) {
                                    $products = $products->where('brand_id', $selectedBrand->id);
                                }
                            @endphp

                            @forelse($products as $product)
                            <article class="prod-card">
                                <a href="{{ route('product.details', $product->slug) }}">
                                    <div class="prod-card-img">
                                        <img src="{{ asset('assets/admin/uploads/' . $product->thumbnail) }}" alt="{{ $product->name }}">
                                    </div>
                                    <div class="prod-card-foot">{{ $product->name }}</div>
                                </a>
                            </article>
                            @empty
                            <p class="no-products">{{ __('front.no_products_found') }}</p>
                            @endforelse
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
