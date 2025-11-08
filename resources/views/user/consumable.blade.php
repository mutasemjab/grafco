@extends('layouts.app')
@section('title', __('front.consumable') . ' | graphco')

@section('content')
<section class="page-hero about-banner" style="background-image:url('{{ asset('assets_front/img/about-banner.jpg') }}')">
    <div class="about-banner__overlay"></div>
    <div class="container about-banner__inner">
        <h1 class="about-banner__title">{{ __('front.graphco_full_name') }}</h1>
    </div>
</section>

<section class="consumable-shell">
    <div class="container cons-shell__inner">
        <aside class="cons-side">
            <div class="cons-side-top is-open">
                <span class="cons-side-label">{{ __('front.offset') }}</span>
                <span class="cons-side-caret">
                    <svg width="14" height="14" viewBox="0 0 24 24">
                        <path d="M7 10l5 5 5-5" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>

            <div class="cons-side-box">
                @foreach($consumables as $index => $consumable)
                <button class="cons-side-item cons-nav {{ $index === 0 ? 'is-active' : '' }}" 
                        data-cons-btn 
                        data-panel="consumable-{{ $consumable->id }}" 
                        data-title="{{ $locale === 'ar' ? $consumable->name_ar : $consumable->name_en }}">
                    {{ $locale === 'ar' ? $consumable->name_ar : $consumable->name_en }}
                </button>
                @endforeach
            </div>

            <div class="cons-side-logos">
                @foreach($consumables as $consumable)
                <button class="cons-logo-item cons-nav" 
                        data-cons-btn 
                        data-panel="consumable-{{ $consumable->id }}" 
                        data-title="{{ $locale === 'ar' ? $consumable->name_ar : $consumable->name_en }}">
                    <img src="{{ asset('assets/admin/uploads/' . $consumable->photo) }}" alt="{{ $locale === 'ar' ? $consumable->name_ar : $consumable->name_en }}">
                </button>
                @endforeach
            </div>

            <div class="cons-side-bottom cons-nav" data-cons-btn data-panel="digital" data-title="{{ __('front.digital_media') }}">
                <span class="cons-side-caret-light">
                    <svg width="12" height="12" viewBox="0 0 24 24">
                        <path d="M7 10l5 5 5-5" fill="none" stroke="#665D99" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
                <span class="cons-side-bottom-label">{{ __('front.digital') }}</span>
            </div>
        </aside>

        <div class="cons-main">
            <div class="cons-headbar">
                <div class="cons-breadcrumb">
                    <span>{{ __('front.home') }}</span>
                    <span class="cons-sep">›</span>
                    <span>{{ __('front.consumable') }}</span>
                    <span class="cons-sep">›</span>
                    <span class="cons-current" data-cons-current>
                        @if($consumables->first())
                            {{ $locale === 'ar' ? $consumables->first()->name_ar : $consumables->first()->name_en }}
                        @endif
                    </span>
                </div>
            </div>

            <div class="cons-body">
                <div class="cons-heading">
                    <span class="cons-heading-mark">//</span>
                    <span class="cons-heading-tag" data-cons-heading>
                        @if($consumables->first())
                            {{ $locale === 'ar' ? $consumables->first()->name_ar : $consumables->first()->name_en }}
                        @endif
                    </span>
                </div>

                <div class="cons-panels">
                    @foreach($consumables as $index => $consumable)
                    <div class="cons-panel {{ $index === 0 ? 'is-active' : '' }}" data-panel="consumable-{{ $consumable->id }}">
                        <p class="cons-text">
                            {!! $locale === 'ar' ? $consumable->description_ar : $consumable->description_en !!}
                        </p>

                        @if($consumable->key_features_en || $consumable->key_features_ar)
                        <div class="cons-key">
                            <div class="cons-key-title">{{ __('front.key_features') }}</div>
                            <ul class="cons-key-list">
                                @php
                                    $features = $locale === 'ar' ? $consumable->key_features_ar : $consumable->key_features_en;
                                @endphp
                                @if($features)
                                    @foreach($features as $feature)
                                        <li>{{ $feature }}</li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        @endif

                        @if($consumable->products->count() > 0)
                        <div class="cons-products">
                            @foreach($consumable->products as $product)
                            <article class="cons-prod-card">
                                <div class="cons-prod-img">
                                    <img src="{{ asset('assets/admin/uploads/' . $product->photo) }}" alt="{{ $locale === 'ar' ? $product->name_ar : $product->name_en }}">
                                </div>
                                <div class="cons-prod-foot">{{ $locale === 'ar' ? $product->name_ar : $product->name_en }}</div>
                            </article>
                            @endforeach
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