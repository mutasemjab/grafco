@extends('layouts.app')
@section('title','About | graphco')



@section('content')
<section class="page-hero about-banner" style="background-image:url('{{ asset('assets_front/img/about-banner.jpg') }}')">
    <div class="about-banner__overlay"></div>
    <div class="container about-banner__inner">
        <h1 class="about-banner__title">{{ __('front.graphco_full_name') }}</h1>
    </div>
</section>

<section class="about-shell">
    <div class="container about-shell__inner">
        <aside class="about-tabs">
            <button class="about-tab is-active" data-tab="company">{{ __('front.company_profile') }}</button>
            <button class="about-tab" data-tab="vision">{{ __('front.vision') }}</button>
        </aside>

        <div class="about-maincol">
            <div class="about-strip">
                <div class="about-breadcrumb">
                    <span class="crumb-home">
                        <svg width="16" height="16" viewBox="0 0 24 24">
                            <path d="M5 12l7-7 7 7v7a1 1 0 0 1-1 1h-4v-5H10v5H6a1 1 0 0 1-1-1v-7z" fill="#fff"/>
                        </svg>
                    </span>
                    <span class="crumb-text">{{ __('front.home') }}</span>
                    <span class="crumb-sep">›</span>
                    <span class="crumb-current">{{ __('front.about') }}</span>
                </div>
            </div>

            <div class="about-panels">
                @php
                    $companyProfiles = $abouts->where('type', 'company_profile');
                    $visions = $abouts->where('type', 'vision');
                @endphp

                {{-- Company Profile Panel --}}
                <div class="about-panel is-active" data-panel="company">
                    <div class="about-tag">{{ __('front.company') }}</div>
                    
                    @foreach($companyProfiles as $profile)
                        <h2 class="about-heading">{{ $locale === 'ar' ? $profile->name_ar : $profile->name_en }}</h2>

                        @if($profile->photo)
                        <figure class="about-media">
                            <img src="{{ asset('assets/admin/uploads/' . $profile->photo) }}" alt="{{ $locale === 'ar' ? $profile->name_ar : $profile->name_en }}">
                        </figure>
                        @endif
                        
                        <p class="about-text">
                            {!! $locale === 'ar' ? $profile->description_ar : $profile->description_en !!}
                        </p>
                    @endforeach
                </div>

                {{-- Vision Panel --}}
                <div class="about-panel" data-panel="vision">
                    <div class="about-tag">{{ __('front.vision') }}</div>
                    
                    @foreach($visions as $vision)
                        <h2 class="about-heading">{{ $locale === 'ar' ? $vision->name_ar : $vision->name_en }}</h2>

                        @if($vision->photo)
                        <figure class="about-media">
                            <img src="{{ asset('assets/admin/uploads/' . $vision->photo) }}" alt="{{ $locale === 'ar' ? $vision->name_ar : $vision->name_en }}">
                        </figure>
                        @endif
                        
                        <p class="about-text">
                            {!! $locale === 'ar' ? $vision->description_ar : $vision->description_en !!}
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection