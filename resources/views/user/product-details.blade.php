@extends('layouts.app')
@section('title', $product->name . ' | graphco')

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
                                <path d="M7 10l5 5 5-5" fill="none" stroke="#fff" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="prod-side-label">{{ $product->mainCategory->name }}</span>
                    </div>
                </div>

                <div class="prod-partner">
                    <div class="prod-partner-main">
                        <img src="{{ asset('assets/admin/uploads/' . $product->brand->photo) }}"
                            alt="{{ $product->brand->name }}">
                    </div>
                </div>

                <div class="prod-nav">
                    @foreach ($categories as $category)
                        <button class="prod-nav-item {{ $product->category->id == $category->id ? 'is-active' : '' }}"
                            onclick="window.location.href='{{ route('products.index', $category->slug) }}'">
                            <span class="prod-nav-arrow">
                                <svg width="10" height="10" viewBox="0 0 24 24">
                                    <path d="M9 6l6 6-6 6" fill="none"
                                        stroke="{{ $product->category->id == $category->id ? '#fff' : '#9b51e0' }}"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span>{{ $category->name }}</span>
                        </button>
                    @endforeach
                </div>
            </aside>

            <div class="pdetail-main">
                <div class="pdetail-headbar">
                    <div class="prod-breadcrumb">
                        <span>{{ __('front.home') }}</span>
                        <span class="prod-sep">›</span>
                        <span>{{ __('front.products') }}</span>
                        <span class="prod-sep">›</span>
                        <span>{{ $product->mainCategory->name }}</span>
                        @if ($product->subcategory)
                            <span class="prod-sep">›</span>
                            <span>{{ $product->subcategory->name }}</span>
                        @endif
                        <span class="prod-sep">›</span>
                        <span>{{ $product->brand->name }}</span>
                        <span class="prod-sep">›</span>
                        <span class="prod-current">{{ $product->name }}</span>
                    </div>
                </div>

                <div class="pdetail-top">
                    <div class="pdetail-top-img">
                        <img src="{{ asset('assets/admin/uploads/' . $product->main_image) }}" alt="{{ $product->name }}">
                    </div>
                    <div class="pdetail-top-info">
                        <div class="pdetail-brand">{{ $product->brand->name }}</div>
                        <h1 class="pdetail-title">{{ $product->name }}</h1>
                        <div class="pdetail-subtitle">{{ $product->subtitle }}</div>

                        <div class="pdetail-download-paragraph">
                            {!! $product->description !!}
                        </div>

                        <div class="pdetail-price-card">
                            <div class="pdetail-price-label">{{ __('front.price') }}</div>
                            <div class="pdetail-price-value">{{ $product->price_display }}</div>
                            <p class="pdetail-price-text">{{ __('front.contact_for_quote') }}</p>
                        </div>

                        <div class="pdetail-specialist">
                            <div class="pdetail-specialist-title">{{ __('front.talk_to_specialist') }}</div>
                            <div class="pdetail-specialist-text">{{ __('front.experts_available') }}</div>
                            <div class="pdetail-specialist-contacts">
                                <a href="mailto:info@graphicsupplies.com" class="pdetail-specialist-link">
                                    <svg width="14" height="14" viewBox="0 0 24 24">
                                        <path d="M4 6h16v12H4V6Zm8 6L4 6h16l-8 6Z" fill="#fff" />
                                    </svg>
                                    <span>{{ $setting->email }}</span>
                                </a>
                                <a dir="ltr" href="tel:+08505447514" class="pdetail-specialist-link">
                                    <svg width="14" height="14" viewBox="0 0 24 24">
                                        <path
                                            d="M6.6 10.8c1.3 2.5 3.3 4.5 5.8 5.8l2-2c.3-.3.8-.4 1.1-.2 1.2.4 2.5.6 3.9.6.5 0 .9.4.9.9v3.4c0 .5-.4.9-.9.9C10.6 21.9 2.1 13.4 2.1 2.9c0-.5.4-.9.9-.9H7c.5 0 .9.4.9.9 0 1.3.2 2.6.6 3.9.1.4 0 .8-.3 1.1l-1.6 1.6Z"
                                            fill="#fff" />
                                    </svg>
                                    <span>{{ $setting->phone }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pdetail-tabs {{ app()->getLocale() == 'ar' ? 'pdetail-tabs--rtl' : '' }}" data-pdetail-tabs>
                    <button class="pdetail-tab is-active" data-tab="spec">{{ __('front.specifications') }}</button>
                    <button class="pdetail-tab" data-tab="features">{{ __('front.features') }}</button>
                    <button class="pdetail-tab" data-tab="download">{{ __('front.downloads') }}</button>
                    <button class="pdetail-tab" data-tab="request">{{ __('front.request_product') }}</button>
                </div>

               <div class="pdetail-panel is-active" data-panel="spec">
                @if ($product->specifications->count() > 0)
                    <div class="pdetail-spec-table {{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">
                        @foreach ($product->specifications as $spec)
                            <div class="pdetail-spec-row">
                                <div class="pdetail-spec-label">{{ $spec->label }}</div>
                                <div class="pdetail-spec-value">{{ $spec->value }}</div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>{{ __('front.no_specifications') }}</p>
                @endif
            </div>

                    <div class="pdetail-panel" data-panel="features">
                        <div class="pdetail-features-block">
                            <h2 class="pdetail-block-title">{{ __('front.detailed_features') }}</h2>
                            @if ($product->features->count() > 0)
                                <ul class="pdetail-feature-list">
                                    @foreach ($product->features as $feature)
                                        <li>{{ $feature->feature }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p>{{ __('front.no_features') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="pdetail-panel" data-panel="download">
                        @if ($product->downloads->count() > 0)
                            <div class="pdetail-downloads-grid">
                                @foreach ($product->downloads as $download)
                                    <div class="pdetail-download-card">
                                        <div class="pdetail-download-main">
                                            <div class="pdetail-download-ico">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path d="M12 3v12m0 0 4-4m-4 4-4-4M5 19h14" fill="none"
                                                        stroke="#01AD5E" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <div class="pdetail-download-text">
                                                <div class="pdetail-download-title">{{ $download->title }}</div>
                                                <div class="pdetail-download-meta">
                                                    {{ $download->file_type }} · {{ $download->file_size }}
                                                    @if ($download->updated_date)
                                                        · {{ __('front.updated') }} {{ $download->formatted_date }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ asset('assets/admin/uploads/downloads/' . $download->file_path) }}"
                                            download class="pdetail-download-btn">
                                            <svg width="16" height="16" viewBox="0 0 24 24">
                                                <path d="M12 3v12m0 0 4-4m-4 4-4-4M5 19h14" fill="none"
                                                    stroke="#9b51e0" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif


                    </div>

                    <div class="pdetail-panel" data-panel="request">
                        <div class="pdetail-request-head">
                            <h2 class="pdetail-block-title">{{ __('front.order_contact_24h') }}</h2>
                        </div>

                        <div class="pdetail-request-form" data-contact>
                            <div class="contact-body">
                                <form class="contact-form" method="POST"
                                    action="{{ route('product.request', $product->id) }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                    <div class="contact-row">
                                        <div class="contact-col">
                                            <label class="contact-label">{{ __('front.first_name') }} *</label>
                                            <input class="contact-input" type="text" name="first_name" required>
                                        </div>
                                        <div class="contact-col">
                                            <label class="contact-label">{{ __('front.last_name') }} *</label>
                                            <input class="contact-input" type="text" name="last_name" required>
                                        </div>
                                    </div>

                                    <div class="contact-row">
                                        <div class="contact-col">
                                            <label class="contact-label">{{ __('front.email') }} *</label>
                                            <input class="contact-input" type="email" name="email" required>
                                        </div>
                                        <div class="contact-col">
                                            <label class="contact-label">{{ __('front.phone') }} *</label>
                                            <input class="contact-input" type="text" name="phone" required>
                                        </div>
                                    </div>

                                    <div class="contact-row">
                                        <div class="contact-col">
                                            <label class="contact-label">{{ __('front.company_name') }} *</label>
                                            <input class="contact-input" type="text" name="company_name">
                                        </div>
                                        <div class="contact-col">
                                            <label class="contact-label">{{ __('front.quantity') }} *</label>
                                            <input class="contact-input" type="number" name="quantity" value="1"
                                                min="1" required>
                                        </div>
                                    </div>

                                    <div class="contact-row">
                                        <div class="contact-col">
                                            <label class="contact-label">{{ __('front.country') }} *</label>
                                            <select class="contact-input" name="country" required>
                                                <option value="">{{ __('front.select_country') }}</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Palestine">Palestine</option>
                                                <option value="UAE">United Arab Emirates</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Egypt">Egypt</option>
                                            </select>
                                        </div>
                                        <div class="contact-col"></div>
                                    </div>

                                    <div class="contact-row">
                                        <div class="contact-col full">
                                            <label class="contact-label">{{ __('front.message') }}</label>
                                            <textarea class="contact-input contact-textarea" name="message" placeholder="{{ __('front.leave_message') }}"></textarea>
                                        </div>
                                    </div>

                                    <div class="contact-row contact-row-check">
                                        <label class="contact-check">
                                            <input type="checkbox" name="agree_to_policy" value="1" required>
                                            <span class="contact-check-box"></span>
                                            <span class="contact-check-text">
                                                {{ __('front.agree_privacy') }} *
                                            </span>
                                        </label>
                                    </div>

                                    <div class="contact-row contact-row-submit">
                                        <button type="submit" class="pdetail-request-submit">
                                            <span>{{ __('front.submit') }}</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <style>
.pdetail-tabs--rtl {
    direction: rtl;
    text-align: right;
}

.pdetail-tabs--rtl .pdetail-tab {
    text-align: right;
}

/* RTL Specifications Table */
.pdetail-spec-table {
    display: flex;
    flex-direction: column;
    gap: 1px;
    background-color: #e5e5e5;
    border: 1px solid #e5e5e5;
}

.pdetail-spec-row {
    display: flex;
    background-color: #fff;
}

.pdetail-spec-label,
.pdetail-spec-value {
    padding: 12px 16px;
    flex: 1;
}

.pdetail-spec-label {
    background-color: #f8f8f8;
    font-weight: 500;
    color: #333;
}

.pdetail-spec-value {
    background-color: #fff;
    color: #666;
}

/* RTL Specific Styles */
[dir="rtl"] .pdetail-spec-table,
.pdetail-spec-table.rtl {
    direction: rtl;
}

[dir="rtl"] .pdetail-spec-row,
.pdetail-spec-table.rtl .pdetail-spec-row {
    flex-direction: row-reverse;
}

[dir="rtl"] .pdetail-spec-label,
.pdetail-spec-table.rtl .pdetail-spec-label {
    text-align: right;
    border-left: 1px solid #e5e5e5;
    border-right: none;
}

[dir="rtl"] .pdetail-spec-value,
.pdetail-spec-table.rtl .pdetail-spec-value {
    text-align: right;
    border-right: none;
}

/* LTR Specific Styles */
.pdetail-spec-table:not(.rtl) .pdetail-spec-label {
    text-align: left;
    border-right: 1px solid #e5e5e5;
}

.pdetail-spec-table:not(.rtl) .pdetail-spec-value {
    text-align: left;
}

/* Responsive */
@media (max-width: 768px) {
    .pdetail-spec-row {
        flex-direction: column;
    }
    
    [dir="rtl"] .pdetail-spec-row,
    .pdetail-spec-table.rtl .pdetail-spec-row {
        flex-direction: column;
    }
    
    .pdetail-spec-label {
        border-right: none !important;
        border-left: none !important;
        border-bottom: 1px solid #e5e5e5;
    }
}
</style>
@endsection
