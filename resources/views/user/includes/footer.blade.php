@php
    $year = date('Y');
    $setting = App\Models\Setting::first();
@endphp
<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-brand-col">
            <a href="{{ route('home') }}" class="footer-logo">
                <img src="{{ asset('assets_front/img/logo.png') }}" alt="graphco">
            </a>
            <p class="footer-tag">{{ __('front.footer_tagline') }}</p>
            <ul class="footer-social">
                <li><a href="{{$setting->facebook}}" target="_blank" aria-label="{{ __('front.facebook') }}">
                    <svg width="22" height="22" viewBox="0 0 24 24"><path d="M14 9h3V6h-3c-1.7 0-3 1.3-3 3v2H8v3h3v7h3v-7h3l1-3h-4V9c0-.6.4-1 1-1Z" fill="currentColor"/></svg>
                </a></li>
             
                <li><a href="{{$setting->instagram}}" target="_blank" aria-label="{{ __('front.instagram') }}">
                    <svg width="22" height="22" viewBox="0 0 24 24"><path d="M7 3h10a4 4 0 0 1 4 4v10a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V7a4 4 0 0 1 4-4Zm0 2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H7Zm5 3.5A4.5 4.5 0 1 1 7.5 13 4.5 4.5 0 0 1 12 8.5Zm0 2a2.5 2.5 0 1 0 2.5 2.5A2.5 2.5 0 0 0 12 10.5Zm4.8-3.3a.9.9 0 1 1-.9.9.9.9 0 0 1 .9-.9Z" fill="currentColor"/></svg>
                </a></li>
                <li><a href="{{$setting->twitter}}" target="_blank" aria-label="{{ __('front.twitter') }}">
                    <svg width="22" height="22" viewBox="0 0 24 24"><path d="M21 6.5c-.6.3-1.3.5-2 .6.7-.4 1.2-1 1.4-1.8-.7.4-1.4.7-2.2.9a3.2 3.2 0 0 0-5.6 2.2c0 .3 0 .6.1.8-2.7-.1-5.1-1.4-6.7-3.4a3.3 3.3 0 0 0 .4 3.3c.5.6 1.1 1 1.9 1.2-.6 0-1.2-.2-1.7-.5 0 1.5 1 2.8 2.5 3.1-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.7 2.3 3.2 2.3A6.5 6.5 0 0 1 3 18.8a9.2 9.2 0 0 0 5 1.5c6 0 9.4-5 9.4-9.4v-.4c.6-.4 1.2-1 1.6-1.6Z" fill="currentColor"/></svg>
                </a></li>
            </ul>
            <div class="footer-copy">{{ __('front.copyright', ['year' => $year]) }}</div>
        </div>

        <div class="footer-links-col">
            <h3 class="footer-title">{{ __('front.quick_links') }}</h3>
            <ul class="footer-links">
                <li><a href="{{ route('products.index') }}">{{ __('front.products') }}</a></li>
                <li><a href="#">{{ __('front.applications') }}</a></li>
                <li><a href="#">{{ __('front.brands') }}</a></li>
                <li><a href="{{ route('service') }}">{{ __('front.services') }}</a></li>
                <li><a href="#">{{ __('front.support') }}</a></li>
                <li><a href="{{ route('about') }}">{{ __('front.about_us') }}</a></li>
                <li><a href="{{ route('contact') }}">{{ __('front.contact') }}</a></li>
            </ul>
        </div>

        <div class="footer-contact-col">
            <h3 class="footer-title">{{ __('front.contact_us') }}</h3>
            <ul class="footer-contact">
                <li>
                    <span class="ico">
                        <svg width="18" height="18" viewBox="0 0 24 24"><path d="M12 2a8 8 0 0 0-8 8c0 5.2 8 12 8 12s8-6.8 8-12a8 8 0 0 0-8-8Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" fill="currentColor"/></svg>
                    </span>
                    <span>{{$setting->address}}</span>
                </li>
                <li>
                    <span class="ico">
                        <svg width="18" height="18" viewBox="0 0 24 24"><path d="M6.6 10.8c1.3 2.5 3.3 4.5 5.8 5.8l2-2c.3-.3.8-.4 1.1-.2 1.2.4 2.5.6 3.9.6.5 0 .9.4.9.9v3.4c0 .5-.4.9-.9.9C10.6 21.9 2.1 13.4 2.1 2.9c0-.5.4-.9.9-.9H7c.5 0 .9.4.9.9 0 1.3.2 2.6.6 3.9.1.4 0 .8-.3 1.1l-1.6 1.6Z" fill="currentColor"/></svg>
                    </span>
                    <a href="tel:+08505447514">{{$setting->phone}}</a>
                </li>
                <li>
                    <span class="ico">
                        <svg width="18" height="18" viewBox="0 0 24 24"><path d="M4 6h16v12H4V6Zm8 6L4 6h16l-8 6Z" fill="currentColor"/></svg>
                    </span>
                    <a href="mailto:info@Graphic">{{$setting->email}}</a>
                </li>
            </ul>

            <h4 class="footer-subtitle">{{ __('front.we_serve') }}</h4>
            <ul class="serve-list">
                <li>
                    <span class="serve-badge">
                        <img src="{{ asset('assets_front/img/flags/jordan.png') }}" alt="{{ __('front.jordan') }}">
                        <span>{{ __('front.jordan') }}</span>
                    </span>
                </li>
                <li>
                    <span class="serve-badge">
                        <img src="{{ asset('assets_front/img/flags/palestine.png') }}" alt="{{ __('front.palestine') }}">
                        <span>{{ __('front.palestine') }}</span>
                    </span>
                </li>
            </ul>
        </div>

        <div class="footer-cert-col">
            <h3 class="footer-title">{{ __('front.certifications') }}</h3>
            <ul class="cert-list">
                <li>{{ __('front.iso_9001') }}</li>
                <li>{{ __('front.iso_14001') }}</li>
                <li>{{ __('front.authorized_service') }}</li>
                <li>{{ __('front.factory_trained') }}</li>
            </ul>
        </div>
    </div>
</footer>