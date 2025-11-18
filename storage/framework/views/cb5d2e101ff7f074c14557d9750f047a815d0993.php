<?php $__env->startSection('title', __('front.service') . ' | graphco'); ?>

<?php $__env->startSection('content'); ?>
<section class="page-hero about-banner" style="background-image:url('<?php echo e(asset('assets_front/img/about-banner.jpg')); ?>')">
    <div class="about-banner__overlay"></div>
    <div class="container about-banner__inner">
        <h1 class="about-banner__title"><?php echo e(__('front.graphco_full_name')); ?></h1>
    </div>
</section>

<section class="service-shell">
    <div class="container service-shell__inner">
        <aside class="service-side">
            <?php $__currentLoopData = $servicePages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button class="service-side-btn <?php echo e($index === 0 ? 'is-primary' : ''); ?>" data-panel="<?php echo e($page->slug); ?>">
                <?php echo e($locale === 'ar' ? $page->name_ar : $page->name_en); ?>

            </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </aside>

        <div class="service-main">
            <div class="service-headbar">
                <div class="service-head-top">
                    <div class="service-pill" data-svc-pill>
                        <?php echo e($servicePages->first() ? ($locale === 'ar' ? $servicePages->first()->name_ar : $servicePages->first()->name_en) : ''); ?>

                    </div>
                    <div class="service-breadcrumb" data-svc-breadcrumb>
                        <span><?php echo e(__('front.home')); ?></span>
                        <span class="svc-sep">›</span>
                        <span><?php echo e(__('front.service')); ?></span>
                        <span class="svc-sep">›</span>
                        <span class="svc-current">
                            <?php echo e($servicePages->first() ? ($locale === 'ar' ? $servicePages->first()->name_ar : $servicePages->first()->name_en) : ''); ?>

                        </span>
                    </div>
                </div>
                <div class="service-head-bottom">
                    <h2 class="service-head-title" data-svc-title>
                        <?php echo e($servicePages->first() ? ($locale === 'ar' ? $servicePages->first()->title_ar : $servicePages->first()->title_en) : ''); ?>

                    </h2>
                    <p class="service-head-sub" data-svc-sub>
                        <?php echo e($servicePages->first() ? ($locale === 'ar' ? $servicePages->first()->subtitle_ar : $servicePages->first()->subtitle_en) : ''); ?>

                    </p>
                </div>
            </div>

            <div class="service-panels">
                <?php $__currentLoopData = $servicePages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pageIndex => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="service-panel <?php echo e($pageIndex === 0 ? 'is-active' : ''); ?>" data-panel="<?php echo e($page->slug); ?>">
                    <div class="service-blocks">
                        <?php $__currentLoopData = $page->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="svc-row <?php echo e($section->image_right ? 'svc-row-alt' : ''); ?>">
                            <?php if(!$section->image_right): ?>
                            <div class="svc-img">
                                <img src="<?php echo e(asset('assets/admin/uploads/' . $section->photo)); ?>" alt="<?php echo e($locale === 'ar' ? $section->title_ar : $section->title_en); ?>">
                            </div>
                            <?php endif; ?>
                            
                            <div class="svc-text">
                                <h3 class="svc-title"><?php echo e($locale === 'ar' ? $section->title_ar : $section->title_en); ?></h3>
                                <p class="svc-lead"><?php echo e($locale === 'ar' ? $section->description_ar : $section->description_en); ?></p>
                                
                                <?php
                                    $features = $locale === 'ar' ? $section->features_ar : $section->features_en;
                                ?>
                                
                                <?php if($features && count($features) > 0): ?>
                                <ul class="svc-list">
                                    <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($feature); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                            
                            <?php if($section->image_right): ?>
                            <div class="svc-img">
                                <img src="<?php echo e(asset('assets/admin/uploads/' . $section->photo)); ?>" alt="<?php echo e($locale === 'ar' ? $section->title_ar : $section->title_en); ?>">
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        <?php if($page->slug === 'appointment'): ?>
                        <div class="service-form-section">
                            <?php echo $__env->make('partials.appointment-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <?php endif; ?>

                        <?php if($page->slug === 'parts'): ?>
                        <div class="service-form-section">
                            <?php echo $__env->make('partials.parts-request-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <?php endif; ?>

                        <?php if($page->slug === 'software'): ?>
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
                                        <div class="svc-feature-title"><?php echo e(__('front.response_time')); ?></div>
                                        <div class="svc-feature-text"><?php echo e(__('front.response_time_desc')); ?></div>
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
                                        <div class="svc-feature-title"><?php echo e(__('front.same_day_shipping')); ?></div>
                                        <div class="svc-feature-text"><?php echo e(__('front.same_day_shipping_desc')); ?></div>
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
                                        <div class="svc-feature-title"><?php echo e(__('front.onsite_support')); ?></div>
                                        <div class="svc-feature-text"><?php echo e(__('front.onsite_support_desc')); ?></div>
                                    </div>
                                </div>
                            </div>

                            <div class="svc-region-card">
                                <div class="svc-region-head">
                                    <div class="svc-region-title"><?php echo e(__('front.regional_coverage')); ?></div>
                                    <div class="svc-region-sub"><?php echo e(__('front.regional_coverage_desc')); ?></div>
                                </div>
                                <div class="svc-region-list">
                                    <div class="svc-region-item">
                                        <span class="svc-region-flag">🇯🇴</span>
                                        <span><?php echo e(__('front.jordan')); ?></span>
                                    </div>
                                    <div class="svc-region-item">
                                        <span class="svc-region-flag">🇵🇸</span>
                                        <span><?php echo e(__('front.palestine')); ?></span>
                                    </div>
                                </div>
                                <button class="svc-region-btn"><?php echo e(__('front.find_local_office')); ?></button>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/user/service.blade.php ENDPATH**/ ?>