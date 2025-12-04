@extends('layouts.app')
@section('title', ($locale === 'ar' ? $product->name_ar : $product->name_en) . ' | graphco')

@section('content')
<section class="page-hero about-banner" style="background-image:url('{{ asset('assets_front/img/about-banner.jpg') }}')">
    <div class="about-banner__overlay"></div>
    <div class="container about-banner__inner">
        <h1 class="about-banner__title">{{ __('front.Graphic Supplies') }}</h1>
    </div>
</section>

<section class="pdetail-shell">
    <div class="container pdetail-shell__inner">
        <aside class="prod-sidebar">
            <div class="prod-side-top">
                <div class="prod-side-main">
                    <span class="prod-side-caret">
                        <svg width="14" height="14" viewBox="0 0 24 24">
                            <path d="M7 10l5 5 5-5" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="prod-side-label">{{ __('front.consumable') }}</span>
                </div>
            </div>

            <div class="prod-nav">               
                    <span class="prod-nav-arrow">
                        <svg width="10" height="10" viewBox="0 0 24 24">
                            <path d="M9 6l6 6-6 6" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span>{{ $locale === 'ar' ? $product->consumable->name_ar : $product->consumable->name_en }}</span>
            </div>
        </aside>

        <div class="pdetail-main">
            <div class="pdetail-headbar">
                <div class="prod-breadcrumb">
                    <span>{{ __('front.home') }}</span>
                    <span class="prod-sep">›</span>
                    <span>{{ __('front.consumables') }}</span>
                    <span class="prod-sep">›</span>
                    <span>{{ $locale === 'ar' ? $product->consumable->name_ar : $product->consumable->name_en }}</span>
                </div>
            </div>

            <div class="pdetail-top">
                <div class="pdetail-top-img">
                    <img src="{{ asset('assets/admin/uploads/' . $product->photo) }}" alt="{{ $locale === 'ar' ? $product->name_ar : $product->name_en }}">
                </div>
                <div class="pdetail-top-info">
                    <div class="pdetail-brand">{{ $locale === 'ar' ? $product->consumable->name_ar : $product->consumable->name_en }}</div>
                    <h1 class="pdetail-title">{{ $locale === 'ar' ? $product->name_ar : $product->name_en }}</h1>

                    @if($locale === 'ar' && $product->description_ar)
                    <div class="pdetail-subtitle">{!! nl2br(e($product->description_ar)) !!}</div>
                    @elseif($product->description_en)
                    <div class="pdetail-subtitle">{!! nl2br(e($product->description_en)) !!}</div>
                    @endif

                    @php
                        $keyFeatures = $locale === 'ar' ? $product->key_features_ar : $product->key_features_en;
                        if(is_string($keyFeatures)) {
                            $keyFeatures = json_decode($keyFeatures, true);
                        }
                    @endphp

                   

                    
                </div>
            </div>

            <div class="pdetail-tabs" data-pdetail-tabs>
                <button class="pdetail-tab is-active" data-tab="features">{{ __('front.features') }}</button>
            </div>

            <div class="pdetail-panels">
                <div class="pdetail-panel is-active" data-panel="features">
                    <div class="pdetail-features-block">
                        <h2 class="pdetail-block-title">{{ __('front.key_features') }}</h2>
                        @if($keyFeatures && count($keyFeatures) > 0)
                        <ul class="pdetail-feature-list">
                            @foreach($keyFeatures as $feature)
                                @if($feature)
                                <li>{{ $feature }}</li>
                                @endif
                            @endforeach
                        </ul>
                        @else
                        <p>{{ __('front.no_features') }}</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection