<section class="contact-page" style="padding: 40px 0;">
    <div class="container">
        <h2 class="contact-title">{{ __('front.book_appointment') }}</h2>
        <p class="contact-lead">
            {{ __('front.appointment_intro') }}
        </p>

        @if(session('appointment_success'))
            <div class="alert alert-success mb-4" style="padding: 15px; background: #d4edda; border: 1px solid #c3e6cb; border-radius: 8px; color: #155724; margin-bottom: 20px;">
                {{ session('appointment_success') }}
            </div>
        @endif

        <div class="contact-layout">
            <div class="contact-main" data-contact>
                <div class="contact-tabs">
                    <button class="contact-tab is-active" data-form="general" data-btn="{{ __('front.send_message') }}" data-product="0">
                        {{ __('front.general_inquiry') }}
                    </button>
                    <button class="contact-tab" data-form="quote" data-btn="{{ __('front.request_quote') }}" data-product="1">
                        {{ __('front.request_quote') }}
                    </button>
                </div>

                <div class="contact-body">
                    <form class="contact-form" action="{{ route('appointments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="general">

                        <div class="contact-row">
                            <div class="contact-col">
                                <label class="contact-label">{{ __('front.first_name') }} *</label>
                                <input class="contact-input @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ old('first_name') }}" required>
                                @error('first_name')
                                    <span class="text-danger" style="font-size: 14px; color: #dc3545;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="contact-col">
                                <label class="contact-label">{{ __('front.last_name') }} *</label>
                                <input class="contact-input @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ old('last_name') }}" required>
                                @error('last_name')
                                    <span class="text-danger" style="font-size: 14px; color: #dc3545;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="contact-row">
                            <div class="contact-col">
                                <label class="contact-label">{{ __('front.email') }}*</label>
                                <input class="contact-input @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="text-danger" style="font-size: 14px; color: #dc3545;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="contact-col">
                                <label class="contact-label">{{ __('front.phone') }}*</label>
                                <input class="contact-input @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <span class="text-danger" style="font-size: 14px; color: #dc3545;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="contact-row">
                            <div class="contact-col">
                                <label class="contact-label">{{ __('front.company_name') }}*</label>
                                <input class="contact-input @error('company_name') is-invalid @enderror" type="text" name="company_name" value="{{ old('company_name') }}" required>
                                @error('company_name')
                                    <span class="text-danger" style="font-size: 14px; color: #dc3545;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="contact-col">
                                <label class="contact-label">{{ __('front.country') }}*</label>
                                <select class="contact-input @error('country') is-invalid @enderror" name="country" required>
                                    <option value="">{{ __('front.select_country') }}</option>
                                    <option value="Jordan" {{ old('country') == 'Jordan' ? 'selected' : '' }}>{{ __('front.jordan') }}</option>
                                    <option value="Palestine" {{ old('country') == 'Palestine' ? 'selected' : '' }}>{{ __('front.palestine') }}</option>
                                    <option value="UAE" {{ old('country') == 'UAE' ? 'selected' : '' }}>UAE</option>
                                    <option value="Saudi Arabia" {{ old('country') == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                                    <option value="Kuwait" {{ old('country') == 'Kuwait' ? 'selected' : '' }}>Kuwait</option>
                                </select>
                                @error('country')
                                    <span class="text-danger" style="font-size: 14px; color: #dc3545;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="contact-row contact-row-extra" data-extra="product" style="display: none;">
                            <div class="contact-col full">
                                <label class="contact-label">{{ __('front.product_category') }}*</label>
                                <select class="contact-input" name="product_category">
                                    <option value="">{{ __('front.select_category') }}</option>
                                    <option value="Printers">{{ __('front.printers') }}</option>
                                    <option value="Cutters">{{ __('front.cutters') }}</option>
                                    <option value="Finishing">{{ __('front.finishing') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="contact-row">
                            <div class="contact-col full">
                                <label class="contact-label">{{ __('front.message') }}</label>
                                <textarea class="contact-input contact-textarea @error('message') is-invalid @enderror" name="message" placeholder="{{ __('front.please_leave_message') }}">{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="text-danger" style="font-size: 14px; color: #dc3545;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="contact-row contact-row-check">
                            <label class="contact-check">
                                <input type="checkbox" name="agree_privacy" required>
                                <span class="contact-check-box"></span>
                                <span class="contact-check-text">
                                    {{ __('front.privacy_agreement') }} *
                                </span>
                            </label>
                        </div>

                        <div class="contact-row contact-row-submit">
                            <button type="submit" class="contact-submit" data-contact-btn>
                                <span class="contact-submit-ico">
                                    <svg width="18" height="18" viewBox="0 0 24 24">
                                        <path d="M4 4l16 8-16 8 3-8-3-8z" fill="none" stroke="#fff" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"/>
                                    </svg>
                                </span>
                                <span class="contact-submit-text">{{ __('front.send_message') }}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <aside class="contact-side">
                <div class="contact-card">
                    <h3 class="contact-card-title">{{ __('front.contact_us') }}</h3>
                    <ul class="contact-info">
                        <li>
                            <span class="contact-info-ico">
                                <svg width="16" height="16" viewBox="0 0 24 24">
                                    <path d="M12 2a7 7 0 0 0-7 7c0 4.4 7 13 7 13s7-8.6 7-13a7 7 0 0 0-7-7zm0 9.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5z" fill="#01AD5E"/>
                                </svg>
                            </span>
                            <span>{{ $setting->address }}</span>
                        </li>
                        <li>
                            <span class="contact-info-ico">
                                <svg width="16" height="16" viewBox="0 0 24 24">
                                    <path d="M6.6 10.8c1.3 2.5 3.3 4.5 5.8 5.8l2-2c.3-.3.8-.4 1.1-.2 1.2.4 2.5.6 3.9.6.5 0 .9.4.9.9v3.4c0 .5-.4.9-.9.9C10.6 21.9 2.1 13.4 2.1 2.9c0-.5.4-.9.9-.9H7c.5 0 .9.4.9.9 0 1.3.2 2.6.6 3.9.1.4 0 .8-.3 1.1l-1.6 1.6Z" fill="#01AD5E"/>
                                </svg>
                            </span>
                            <a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a>
                        </li>
                        <li>
                            <span class="contact-info-ico">
                                <svg width="16" height="16" viewBox="0 0 24 24">
                                    <path d="M4 6h16v12H4V6Zm8 6L4 6h16l-8 6Z" fill="#01AD5E"/>
                                </svg>
                            </span>
                            <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                        </li>
                    </ul>
                </div>

                <div class="contact-card">
                    <h3 class="contact-card-title">{{ __('front.office_hours') }}</h3>
                    <ul class="office-list">
                        <li>
                            <span>{{ __('front.mon_fri') }}</span>
                            <span>{{ __('front.hours_9_6') }}</span>
                        </li>
                        <li>
                            <span>{{ __('front.saturday') }}</span>
                            <span>{{ __('front.hours_9_1') }}</span>
                        </li>
                        <li>
                            <span>{{ __('front.sunday') }}</span>
                            <span>{{ __('front.closed') }}</span>
                        </li>
                    </ul>
                </div>

                <div class="contact-region">
                    <div class="region-item">
                        <div class="region-flag">
                            <span>🇯🇴</span>
                            <span>{{ __('front.jordan') }}</span>
                        </div>
                        <div class="region-phone">{{ $setting->phone }}</div>
                    </div>
                    <div class="region-item">
                        <div class="region-flag">
                            <span>🇵🇸</span>
                            <span>{{ __('front.palestine') }}</span>
                        </div>
                        <div class="region-phone">{{ $setting->phone }}</div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.contact-tab');
    const typeInput = document.querySelector('input[name="type"]');
    const submitBtn = document.querySelector('[data-contact-btn] .contact-submit-text');
    const productRow = document.querySelector('[data-extra="product"]');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tabs.forEach(t => t.classList.remove('is-active'));
            this.classList.add('is-active');
            
            const formType = this.dataset.form;
            typeInput.value = formType;
            
            submitBtn.textContent = this.dataset.btn;
            
            if (this.dataset.product === '1') {
                productRow.style.display = 'flex';
            } else {
                productRow.style.display = 'none';
            }
        });
    });
});
</script>