<?php $__env->startSection('title','About | graphco'); ?>



<?php $__env->startSection('content'); ?>
<section class="page-hero about-banner" style="background-image:url('<?php echo e(asset('assets_front/img/about-banner.jpg')); ?>')">
    <div class="about-banner__overlay"></div>
    <div class="container about-banner__inner">
        <h1 class="about-banner__title"><?php echo e(__('front.graphco_full_name')); ?></h1>
    </div>
</section>

<section class="about-shell">
    <div class="container about-shell__inner">
        <aside class="about-tabs">
            <button class="about-tab is-active" data-tab="company"><?php echo e(__('front.company_profile')); ?></button>
            <button class="about-tab" data-tab="vision"><?php echo e(__('front.vision')); ?></button>
        </aside>

        <div class="about-maincol">
            <div class="about-strip">
                <div class="about-breadcrumb">
                    <span class="crumb-home">
                        <svg width="16" height="16" viewBox="0 0 24 24">
                            <path d="M5 12l7-7 7 7v7a1 1 0 0 1-1 1h-4v-5H10v5H6a1 1 0 0 1-1-1v-7z" fill="#fff"/>
                        </svg>
                    </span>
                    <span class="crumb-text"><?php echo e(__('front.home')); ?></span>
                    <span class="crumb-sep">›</span>
                    <span class="crumb-current"><?php echo e(__('front.about')); ?></span>
                </div>
            </div>

            <div class="about-panels">
                <?php
                    $companyProfiles = $abouts->where('type', 'company_profile');
                    $visions = $abouts->where('type', 'vision');
                ?>

                
                <div class="about-panel is-active" data-panel="company">
                    <div class="about-tag"><?php echo e(__('front.company')); ?></div>
                    
                    <?php $__currentLoopData = $companyProfiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h2 class="about-heading"><?php echo e($locale === 'ar' ? $profile->name_ar : $profile->name_en); ?></h2>

                        <?php if($profile->photo): ?>
                        <figure class="about-media">
                            <img src="<?php echo e(asset('assets/admin/uploads/' . $profile->photo)); ?>" alt="<?php echo e($locale === 'ar' ? $profile->name_ar : $profile->name_en); ?>">
                        </figure>
                        <?php endif; ?>
                        
                        <p class="about-text">
                            <?php echo $locale === 'ar' ? $profile->description_ar : $profile->description_en; ?>

                        </p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                
                <div class="about-panel" data-panel="vision">
                    <div class="about-tag"><?php echo e(__('front.vision')); ?></div>
                    
                    <?php $__currentLoopData = $visions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vision): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h2 class="about-heading"><?php echo e($locale === 'ar' ? $vision->name_ar : $vision->name_en); ?></h2>

                        <?php if($vision->photo): ?>
                        <figure class="about-media">
                            <img src="<?php echo e(asset('assets/admin/uploads/' . $vision->photo)); ?>" alt="<?php echo e($locale === 'ar' ? $vision->name_ar : $vision->name_en); ?>">
                        </figure>
                        <?php endif; ?>
                        
                        <p class="about-text">
                            <?php echo $locale === 'ar' ? $vision->description_ar : $vision->description_en; ?>

                        </p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/user/about.blade.php ENDPATH**/ ?>