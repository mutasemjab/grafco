@extends('layouts.app')
@section('title', 'Home | graphco')

@section('content')
    <section class="hero-slider" data-slider>
        @foreach ($banners as $index => $banner)
            <div class="hero-slide {{ $index === 0 ? 'is-active' : '' }}"
                style="background-image:url('{{ asset('assets/admin/uploads/' . $banner->photo) }}')">
                <div class="hero-overlay"></div>
                <div class="container hero-inner">
                    <h1 class="hero-title">
                        <span>{{ $locale === 'ar' ? $banner->title_ar : $banner->title_en }}</span>
                        <i></i>
                    </h1>
                    <span class="hero-sub">
                        {!! $locale === 'ar' ? $banner->descrispantion_ar : $banner->description_en !!}
                    </span>

                    <div class="hero-cta">
                        <a href="{{ route('products.category') }}" class="btn-cta">{{ __('front.our_products') }}
                            <svg width="18" height="18" viewBox="0 0 24 24">
                                <path d="M5 12h12M13 6l6 6-6 6" stroke="#fff" stroke-width="2" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <div class="call-chip">
                            <span class="chip-ico">
                                <svg width="20" height="20" viewBox="0 0 24 24">
                                    <path
                                        d="M6.6 10.8c1.3 2.5 3.3 4.5 5.8 5.8l2-2c.3-.3.8-.4 1.1-.2 1.2.4 2.5.6 3.9.6.5 0 .9.4.9.9v3.4c0 .5-.4.9-.9.9C10.6 21.9 2.1 13.4 2.1 2.9c0-.5.4-.9.9-.9H7c.5 0 .9.4.9.9 0 1.3.2 2.6.6 3.9.1.4 0 .8-.3 1.1l-1.6 1.6Z"
                                        fill="#fff" />
                                </svg>
                            </span>
                            <div class="chip-txt">
                                <span>{{ __('front.our_service') }}</span>
                                <a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="hero-dots" data-dots></div>
    </section>

    <section class="featured" data-featured>
        <div class="container featured-grid">
            <div class="featured-left">
                <h2 class="featured-title">{{ __('messages.featured') }}<br>{{ __('messages.products') }}</h2>
                <a href="{{ route('products.category') }}" class="featured-btn">{{ __('messages.view_all') }}</a>
                <div class="featured-arrows">
                    <button class="featured-arrow" data-prev type="button" aria-label="{{ __('messages.previous') }}">
                        <svg width="20" height="20" viewBox="0 0 24 24">
                            <path d="M15 6l-6 6 6 6" fill="none" stroke="#665D99" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button class="featured-arrow" data-next type="button" aria-label="{{ __('messages.next') }}">
                        <svg width="20" height="20" viewBox="0 0 24 24">
                            <path d="M9 6l6 6-6 6" fill="none" stroke="#665D99" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="featured-right">
                @if ($featuredProducts->count() > 0)
                    <div class="feat-viewport">
                        <div class="feat-track" data-track>
                            @foreach ($featuredProducts as $product)
                                <article class="feat-card">
                                    <h3 class="feat-card-title">
                                        {{ app()->getLocale() == 'ar' ? $product->name_ar : $product->name_en }}
                                    </h3>
                                    <div class="feat-sep"></div>
                                    <p class="feat-card-text">
                                        {{ Str::limit(app()->getLocale() == 'ar' ? $product->subtitle_ar ?? $product->description_ar : $product->subtitle_en ?? $product->description_en, 150) }}
                                    </p>
                                    <div class="feat-card-img">
                                        <img src="{{ asset('assets/admin/uploads/' . $product->main_image) }}"
                                            alt="{{ app()->getLocale() == 'ar' ? $product->name_ar : $product->name_en }}"
                                            loading="lazy">
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="feat-viewport">
                        <div class="feat-track">
                            <div class="text-center py-5">
                                <p class="text-muted">{{ __('messages.no_featured_products') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="brands" data-brands>
        <div class="container brands-head">
            <h2 class="brands-title">{{ __('front.Our Partners') }}</h2>
        </div>
<br>

        <div class="brands-wrap">
            <button class="brands-nav" data-prev type="button">
                <svg width="20" height="20" viewBox="0 0 24 24">
                    <path d="M15 6l-6 6 6 6" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>

            <div class="brands-viewport">
                <div class="brands-track" data-track>
                    @foreach ($brands as $brand)
                        <div class="brand-item">
                            <a href="{{ route('products.index', ['brand' => $brand->id]) }}">
                                <img src="{{ asset('assets/admin/uploads/' . $brand->photo) }}" alt="brand"> </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <button class="brands-nav" data-next type="button">
                <svg width="20" height="20" viewBox="0 0 24 24">
                    <path d="M9 6l6 6-6 6" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </section>

    <section class="services">
        <div class="container services-head">
            <span class="services-kicker">{{ __('front.graphco_services') }}</span>
            <h2 class="services-title">{{ __('front.services_headline') }}</h2>
        </div>

        <div class="container services-grid">
            @foreach ($services as $service)
                <article class="service-card">
                    <div class="service-ico">
                        <img src="{{ asset('assets/admin/uploads/' . $service->icon) }}" alt="">
                    </div>
                    <h3 class="service-title">{{ $locale === 'ar' ? $service->name_ar : $service->name_en }}</h3>
                    <p class="service-text">{!! $locale === 'ar' ? $service->description_ar : $service->description_en !!}</p>
                </article>
            @endforeach
        </div>
    </section>

    @if ($bottomSection)
        <section class="about-hero"
            style="background-image:url('{{ asset('assets/admin/uploads/' . $bottomSection->photo) }}')">
            <div class="about-hero__overlay"></div>
            <div class="container about-hero__grid">
                <div class="about-hero__left">
                    <h2 class="about-hero__title">
                        {{ $locale === 'ar' ? $bottomSection->name_ar : $bottomSection->name_en }}</h2>
                    <p class="about-hero__kicker">{!! $locale === 'ar' ? $bottomSection->short_description_ar : $bottomSection->short_description_en !!}</p>
                </div>
                <div class="about-hero__right">
                    <div class="about-hero__rule"></div>
                    <p class="about-hero__text">
                        {!! $locale === 'ar' ? $bottomSection->tall_description_ar : $bottomSection->tall_description_en !!}
                    </p>
                </div>
            </div>
        </section>
    @endif



@endsection
@section('script')
<script>
(function() {
    'use strict';
    
    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initBrandsCarousel);
    } else {
        initBrandsCarousel();
    }
    
    function initBrandsCarousel() {
        const brandsSection = document.querySelector('[data-brands]');
        if (!brandsSection) return;
        
        const track = brandsSection.querySelector('[data-track]');
        const prevBtn = brandsSection.querySelector('[data-prev]');
        const nextBtn = brandsSection.querySelector('[data-next]');
        const brandItems = track.querySelectorAll('.brand-item');
        
        if (!track || !prevBtn || !nextBtn || brandItems.length === 0) return;
        
        let currentIndex = 0;
        const itemWidth = brandItems[0].offsetWidth;
        const gap = 20; // Adjust this based on your CSS gap
        const slideWidth = itemWidth + gap;
        const visibleItems = Math.floor(track.parentElement.offsetWidth / slideWidth);
        const maxIndex = Math.max(0, brandItems.length - visibleItems);
        
        // Update button states
        function updateButtons() {
            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex >= maxIndex;
            
            prevBtn.style.opacity = currentIndex === 0 ? '0.5' : '1';
            nextBtn.style.opacity = currentIndex >= maxIndex ? '0.5' : '1';
        }
        
        // Slide to position
        function slideTo(index) {
            currentIndex = Math.max(0, Math.min(index, maxIndex));
            const offset = -(currentIndex * slideWidth);
            track.style.transform = `translateX(${offset}px)`;
            updateButtons();
        }
        
        // Next button
        nextBtn.addEventListener('click', function() {
            slideTo(currentIndex + 1);
        });
        
        // Previous button
        prevBtn.addEventListener('click', function() {
            slideTo(currentIndex - 1);
        });
        
        // Handle window resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                currentIndex = 0;
                slideTo(0);
            }, 250);
        });
        
        // Initial state
        updateButtons();
    }
})();
</script>
@endsection