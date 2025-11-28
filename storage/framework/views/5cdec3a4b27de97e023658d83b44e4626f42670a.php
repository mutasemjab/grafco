<?php $__env->startSection('title', __('front.contact') . ' | graphco'); ?>

<?php $__env->startSection('content'); ?>
<section class="contact-page">
    <div class="container">
        <h1 class="contact-title"><?php echo e(__('front.get_in_touch')); ?></h1>
        <p class="contact-lead">
            <?php echo e(__('front.contact_intro')); ?>

        </p>

        <?php if(session('contact_success')): ?>
            <div class="alert alert-success mb-4" style="padding: 15px; background: #d4edda; border: 1px solid #c3e6cb; border-radius: 8px; color: #155724; margin-bottom: 20px;">
                <?php echo e(session('contact_success')); ?>

            </div>
        <?php endif; ?>

        <div class="contact-layout">
            <div class="contact-main" data-contact>
                <div class="contact-tabs">
                    <button class="contact-tab is-active" data-form="sales" data-btn="<?php echo e(__('front.send_message')); ?>" data-product="0">
                        <?php echo e(__('front.request_sales_call')); ?>

                    </button>
                    <button class="contact-tab" data-form="tech" data-btn="<?php echo e(__('front.request_quote')); ?>" data-product="1">
                        <?php echo e(__('front.report_technical_issue')); ?>

                    </button>
                </div>

                <div class="contact-body">
                    <form class="contact-form" action="<?php echo e(route('contacts.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="type" value="sales_call">

                        <div class="contact-row">
                            <div class="contact-col">
                                <label class="contact-label"><?php echo e(__('front.first_name')); ?> *</label>
                                <input class="contact-input <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="first_name" value="<?php echo e(old('first_name')); ?>" required>
                                <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger" style="font-size: 14px; color: #dc3545;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="contact-col">
                                <label class="contact-label"><?php echo e(__('front.last_name')); ?> *</label>
                                <input class="contact-input <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="last_name" value="<?php echo e(old('last_name')); ?>" required>
                                <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger" style="font-size: 14px; color: #dc3545;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="contact-row">
                            <div class="contact-col">
                                <label class="contact-label"><?php echo e(__('front.email')); ?>*</label>
                                <input class="contact-input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="email" name="email" value="<?php echo e(old('email')); ?>" required>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger" style="font-size: 14px; color: #dc3545;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="contact-col">
                                <label class="contact-label"><?php echo e(__('front.phone')); ?>*</label>
                                <input class="contact-input <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="phone" value="<?php echo e(old('phone')); ?>" required>
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger" style="font-size: 14px; color: #dc3545;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="contact-row">
                            <div class="contact-col">
                                <label class="contact-label"><?php echo e(__('front.company_name')); ?>*</label>
                                <input class="contact-input <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="company_name" value="<?php echo e(old('company_name')); ?>" required>
                                <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger" style="font-size: 14px; color: #dc3545;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="contact-col">
                                <label class="contact-label"><?php echo e(__('front.country')); ?>*</label>
                                <select class="contact-input <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="country" required>
                                    <option value=""><?php echo e(__('front.select_country')); ?></option>
                                    <option value="Jordan" <?php echo e(old('country') == 'Jordan' ? 'selected' : ''); ?>><?php echo e(__('front.jordan')); ?></option>
                                    <option value="Palestine" <?php echo e(old('country') == 'Palestine' ? 'selected' : ''); ?>><?php echo e(__('front.palestine')); ?></option>
                                    <option value="UAE" <?php echo e(old('country') == 'UAE' ? 'selected' : ''); ?>>UAE</option>
                                    <option value="Saudi Arabia" <?php echo e(old('country') == 'Saudi Arabia' ? 'selected' : ''); ?>>Saudi Arabia</option>
                                    <option value="Kuwait" <?php echo e(old('country') == 'Kuwait' ? 'selected' : ''); ?>>Kuwait</option>
                                    <option value="Other" <?php echo e(old('country') == 'Other' ? 'selected' : ''); ?>><?php echo e(__('front.other')); ?></option>
                                </select>
                                <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger" style="font-size: 14px; color: #dc3545;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="contact-row contact-row-extra" data-extra="product" style="display: none;">
                            <div class="contact-col full">
                                <label class="contact-label"><?php echo e(__('front.product_category')); ?>*</label>
                                <select class="contact-input" name="product_category">
                                    <option value=""><?php echo e(__('front.select_category')); ?></option>
                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($brand->id); ?>" <?php echo e(old('brand_id') == $brand->id ? 'selected' : ''); ?>>
                                        <?php echo e($brand->name); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="contact-row">
                            <div class="contact-col full">
                                <label class="contact-label"><?php echo e(__('front.message')); ?></label>
                                <textarea class="contact-input contact-textarea <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="message" placeholder="<?php echo e(__('front.please_leave_message')); ?>" required><?php echo e(old('message')); ?></textarea>
                                <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger" style="font-size: 14px; color: #dc3545;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="contact-row contact-row-check">
                            <label class="contact-check">
                                <input type="checkbox" name="agree" required>
                                <span class="contact-check-box"></span>
                                <span class="contact-check-text">
                                    <?php echo e(__('front.privacy_agreement')); ?> *
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
                                <span class="contact-submit-text"><?php echo e(__('front.send_message')); ?></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <aside class="contact-side">
                <div class="contact-card">
                    <h3 class="contact-card-title"><?php echo e(__('front.contact_us')); ?></h3>
                    <ul class="contact-info">
                        <li>
                            <span class="contact-info-ico">
                                <svg width="16" height="16" viewBox="0 0 24 24">
                                    <path d="M12 2a7 7 0 0 0-7 7c0 4.4 7 13 7 13s7-8.6 7-13a7 7 0 0 0-7-7zm0 9.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5z" fill="#01AD5E"/>
                                </svg>
                            </span>
                            <span><?php echo e($setting->address); ?></span>
                        </li>
                        <li>
                            <span class="contact-info-ico">
                                <svg width="16" height="16" viewBox="0 0 24 24">
                                    <path d="M6.6 10.8c1.3 2.5 3.3 4.5 5.8 5.8l2-2c.3-.3.8-.4 1.1-.2 1.2.4 2.5.6 3.9.6.5 0 .9.4.9.9v3.4c0 .5-.4.9-.9.9C10.6 21.9 2.1 13.4 2.1 2.9c0-.5.4-.9.9-.9H7c.5 0 .9.4.9.9 0 1.3.2 2.6.6 3.9.1.4 0 .8-.3 1.1l-1.6 1.6Z" fill="#01AD5E"/>
                                </svg>
                            </span>
                            <a href="tel:<?php echo e($setting->phone); ?>"><?php echo e($setting->phone); ?></a>
                        </li>
                       <li>
                            <span class="contact-info-ico">
                                <svg width="16" height="16" viewBox="0 0 24 24">
                                    <path d="M4 6h16v12H4V6Zm8 6L4 6h16l-8 6Z" fill="#01AD5E"/>
                                </svg>
                            </span>
                            <a href="mailto:<?php echo e($setting->email); ?>" data-email-display><?php echo e($setting->email); ?></a>
                        </li>
                    </ul>
                </div>

                <div class="contact-card">
                    <h3 class="contact-card-title"><?php echo e(__('front.office_hours')); ?></h3>
                    <ul class="office-list">
                        <li>
                            <span><?php echo e(__('front.mon_fri')); ?></span>
                            <span><?php echo e(__('front.hours_9_6')); ?></span>
                        </li>
                        <li>
                            <span><?php echo e(__('front.saturday')); ?></span>
                            <span><?php echo e(__('front.hours_9_1')); ?></span>
                        </li>
                        <li>
                            <span><?php echo e(__('front.sunday')); ?></span>
                            <span><?php echo e(__('front.closed')); ?></span>
                        </li>
                    </ul>
                </div>

                <div class="contact-region">
                    <div class="region-item">
                        <div class="region-flag">
                            <span>🇯🇴</span>
                            <span><?php echo e(__('front.jordan')); ?></span>
                        </div>
                        <div class="region-phone"><?php echo e($setting->phone); ?></div>
                    </div>
                    <div class="region-item">
                        <div class="region-flag">
                            <span>🇵🇸</span>
                            <span><?php echo e(__('front.palestine')); ?></span>
                        </div>
                        <div class="region-phone"><?php echo e($setting->phone); ?></div>
                    </div>
                </div>
                <div class="contact-card contact-map-card">
                    <h3 class="contact-card-title"><?php echo e(__('front.find_us')); ?></h3>
                    <div class="contact-map-wrapper">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3384.972838092734!2d35.963302524575276!3d31.96163357401495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151b5e3292a5d023%3A0x2170c882727fef78!2z2LTYsdmD2Kkg2KrYrNmH2YrYstin2Kog2KfZhNmF2LfYp9io2LkgLyDZg9ix2KfZgdmD2YggLCBHcmFwaGljIFN1cHBsaWVzIENvLiBcIEdSQVBIQ08!5e0!3m2!1sar!2sjo!4v1764342779309!5m2!1sar!2sjo" 
                            width="100%" 
                            height="120" 
                            style="border:0; border-radius: 8px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
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
    const emailDisplay = document.querySelector('[data-email-display]');
    
    const emails = {
        sales: '<?php echo e($setting->email); ?>',
        tech: '<?php echo e($setting->email_technical_issue); ?>'
    };
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs
            tabs.forEach(t => t.classList.remove('is-active'));
            
            // Add active class to clicked tab
            this.classList.add('is-active');
            
            // Update form type
            const formType = this.dataset.form;
            typeInput.value = formType === 'sales' ? 'sales_call' : 'technical_issue';
            
            // Update button text
            submitBtn.textContent = this.dataset.btn;
            
            // Update email display
            const selectedEmail = emails[formType];
            emailDisplay.textContent = selectedEmail;
            emailDisplay.href = 'mailto:' + selectedEmail;
            
            // Show/hide product field
            if (this.dataset.product === '1') {
                productRow.style.display = 'flex';
            } else {
                productRow.style.display = 'none';
            }
        });
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/user/contact.blade.php ENDPATH**/ ?>