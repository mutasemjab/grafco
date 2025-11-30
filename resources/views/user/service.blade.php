@extends('layouts.app')
@section('title', __('front.service') . ' | graphco')

@section('content')
<section class="page-hero about-banner" style="background-image:url('{{ asset('assets_front/img/about-banner.jpg') }}')">
    <div class="about-banner__overlay"></div>
    <div class="container about-banner__inner">
        <h1 class="about-banner__title">{{ __('front.Graphic Supplies') }}</h1>
    </div>
</section>

<section class="service-shell">
    <div class="container service-shell__inner">
        <aside class="service-side">
            @foreach($servicePages as $index => $page)
            <button class="service-side-btn {{ $index === 0 ? 'is-primary' : '' }}" data-panel="{{ $page->slug }}">
                {{ $locale === 'ar' ? $page->name_ar : $page->name_en }}
            </button>
            @endforeach
        </aside>

        <div class="service-main">
            <div class="service-headbar">
                <div class="service-head-top">
                    <div class="service-pill" data-svc-pill>
                        {{ $servicePages->first() ? ($locale === 'ar' ? $servicePages->first()->name_ar : $servicePages->first()->name_en) : '' }}
                    </div>
                    <div class="service-breadcrumb" data-svc-breadcrumb>
                        <span>{{ __('front.home') }}</span>
                        <span class="svc-sep">›</span>
                        <span>{{ __('front.service') }}</span>
                        <span class="svc-sep">›</span>
                        <span class="svc-current">
                            {{ $servicePages->first() ? ($locale === 'ar' ? $servicePages->first()->name_ar : $servicePages->first()->name_en) : '' }}
                        </span>
                    </div>
                </div>
                <div class="service-head-bottom">
                    <h2 class="service-head-title" data-svc-title>
                        {{ $servicePages->first() ? ($locale === 'ar' ? $servicePages->first()->title_ar : $servicePages->first()->title_en) : '' }}
                    </h2>
                    <p class="service-head-sub" data-svc-sub>
                        {{ $servicePages->first() ? ($locale === 'ar' ? $servicePages->first()->subtitle_ar : $servicePages->first()->subtitle_en) : '' }}
                    </p>
                </div>
            </div>

            <div class="service-panels">
                @foreach($servicePages as $pageIndex => $page)
                <div class="service-panel {{ $pageIndex === 0 ? 'is-active' : '' }}" data-panel="{{ $page->slug }}">
                    <div class="service-blocks">
                        @foreach($page->sections as $index => $section)
                        <div class="svc-row {{ $section->image_right ? 'svc-row-alt' : '' }}">
                            @if(!$section->image_right)
                            <div class="svc-img">
                                <img src="{{ asset('assets/admin/uploads/' . $section->photo) }}" alt="{{ $locale === 'ar' ? $section->title_ar : $section->title_en }}">
                            </div>
                            @endif
                            
                            <div class="svc-text">
                                <h3 class="svc-title">{{ $locale === 'ar' ? $section->title_ar : $section->title_en }}</h3>
                                <p class="svc-lead">{{ $locale === 'ar' ? $section->description_ar : $section->description_en }}</p>
                                
                                @php
                                    $features = $locale === 'ar' ? $section->features_ar : $section->features_en;
                                @endphp
                                
                                @if($features && count($features) > 0)
                                <ul class="svc-list">
                                    @foreach($features as $feature)
                                    <li>{{ $feature }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            
                            @if($section->image_right)
                            <div class="svc-img">
                                <img src="{{ asset('assets/admin/uploads/' . $section->photo) }}" alt="{{ $locale === 'ar' ? $section->title_ar : $section->title_en }}">
                            </div>
                            @endif
                        </div>
                        @endforeach

                        {{-- Add forms for appointment and parts pages --}}
                        @if($page->slug === 'appointment')
                        <div class="service-form-section">
                            @include('partials.appointment-form')
                        </div>
                        @endif

                        @if($page->slug === 'parts')
                        <div class="service-form-section">
                            @include('partials.parts-request-form')
                        </div>
                        @endif

                        @if($page->slug === 'software')
                        <div class="svc-bottom">
                            <div class="svc-features">
                                <div class="svc-feature">
                                    <div class="svc-feature-ico">
                                        <svg width="32" height="32" viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10" fill="#01AD5E" opacity=".12"/>
                                            <path d="M8 12h4V7" fill="none" stroke="#01AD5E" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8 12l3.2-3.2" fill="none" stroke="#01AD5E" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="svc-feature-body">
                                        <div class="svc-feature-title">{{ __('front.response_time') }}</div>
                                        <div class="svc-feature-text">{{ __('front.response_time_desc') }}</div>
                                    </div>
                                </div>
                                <div class="svc-feature">
                                    <div class="svc-feature-ico">
                                        <svg width="32" height="32" viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10" fill="#01AD5E" opacity=".12"/>
                                            <path d="M7 15l3.5-6L13 13l2-3 2 5" fill="none" stroke="#01AD5E" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="svc-feature-body">
                                        <div class="svc-feature-title">{{ __('front.same_day_shipping') }}</div>
                                        <div class="svc-feature-text">{{ __('front.same_day_shipping_desc') }}</div>
                                    </div>
                                </div>
                                <div class="svc-feature">
                                    <div class="svc-feature-ico">
                                        <svg width="32" height="32" viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10" fill="#01AD5E" opacity=".12"/>
                                            <path d="M8 9h3v6H8zM13 9h3v6h-3z" fill="none" stroke="#01AD5E" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="svc-feature-body">
                                        <div class="svc-feature-title">{{ __('front.onsite_support') }}</div>
                                        <div class="svc-feature-text">{{ __('front.onsite_support_desc') }}</div>
                                    </div>
                                </div>
                            </div>

                           
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection