<section class="contact-page" style="padding: 40px 0;">
    <div class="container">
        <h2 class="contact-title"><?php echo e(__('front.request_spare_parts')); ?></h2>
        <p class="contact-lead">
            <?php echo e(__('front.parts_request_intro')); ?>

        </p>

        <?php if(session('parts_success')): ?>
            <div class="alert alert-success mb-4" style="padding: 15px; background: #d4edda; border: 1px solid #c3e6cb; border-radius: 8px; color: #155724; margin-bottom: 20px;">
                <?php echo e(session('parts_success')); ?>

            </div>
        <?php endif; ?>

        <div class="contact-layout">
            <div class="contact-main" data-contact>
                <div class="contact-body">
                    <form class="contact-form" action="<?php echo e(route('parts-requests.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

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
                                <label class="contact-label"><?php echo e(__('front.company_name')); ?></label>
                                <input class="contact-input <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="company_name" value="<?php echo e(old('company_name')); ?>">
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
                                <label class="contact-label"><?php echo e(__('front.equipment_model')); ?></label>
                                <input class="contact-input <?php $__errorArgs = ['equipment_model'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="equipment_model" value="<?php echo e(old('equipment_model')); ?>" placeholder="<?php echo e(__('front.equipment_model_placeholder')); ?>">
                                <?php $__errorArgs = ['equipment_model'];
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
                            <div class="contact-col full">
                                <label class="contact-label"><?php echo e(__('front.parts_needed')); ?> *</label>
                                <textarea class="contact-input contact-textarea <?php $__errorArgs = ['parts_needed'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="parts_needed" placeholder="<?php echo e(__('front.parts_needed_placeholder')); ?>" required><?php echo e(old('parts_needed')); ?></textarea>
                                <?php $__errorArgs = ['parts_needed'];
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
                                <input type="checkbox" name="agree_privacy" required>
                                <span class="contact-check-box"></span>
                                <span class="contact-check-text">
                                    <?php echo e(__('front.privacy_agreement')); ?> *
                                </span>
                            </label>
                        </div>

                        <div class="contact-row contact-row-submit">
                            <button type="submit" class="contact-submit">
                                <span class="contact-submit-ico">
                                    <svg width="18" height="18" viewBox="0 0 24 24">
                                        <path d="M4 4l16 8-16 8 3-8-3-8z" fill="none" stroke="#fff" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"/>
                                    </svg>
                                </span>
                                <span class="contact-submit-text"><?php echo e(__('front.send_request')); ?></span>
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
                            <a href="mailto:<?php echo e($setting->email); ?>"><?php echo e($setting->email); ?></a>
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
            </aside>
        </div>
    </div>
</section><?php /**PATH C:\xampp\htdocs\grafco\resources\views/partials/parts-request-form.blade.php ENDPATH**/ ?>