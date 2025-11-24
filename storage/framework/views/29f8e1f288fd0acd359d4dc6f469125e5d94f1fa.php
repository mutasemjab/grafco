<?php $__env->startSection('title', __('front.consumable') . ' | graphco'); ?>

<?php $__env->startSection('content'); ?>
<section class="page-hero about-banner" style="background-image:url('<?php echo e(asset('assets_front/img/about-banner.jpg')); ?>')">
    <div class="about-banner__overlay"></div>
    <div class="container about-banner__inner">
        <h1 class="about-banner__title"><?php echo e(__('front.graphco_full_name')); ?></h1>
    </div>
</section>

<section class="consumable-shell">
    <div class="container cons-shell__inner">
        <aside class="cons-side">
            <div class="cons-side-top is-open">
                <span class="cons-side-label"><?php echo e(__('front.offset')); ?></span>
                <span class="cons-side-caret">
                    <svg width="14" height="14" viewBox="0 0 24 24">
                        <path d="M7 10l5 5 5-5" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>

           
            <div class="cons-side-logos">
                <?php $__currentLoopData = $consumables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consumable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button class="cons-logo-item cons-nav" 
                        data-cons-btn 
                        data-panel="consumable-<?php echo e($consumable->id); ?>" 
                        data-title="<?php echo e($locale === 'ar' ? $consumable->name_ar : $consumable->name_en); ?>">
                    <img src="<?php echo e(asset('assets/admin/uploads/' . $consumable->photo)); ?>" alt="<?php echo e($locale === 'ar' ? $consumable->name_ar : $consumable->name_en); ?>">
                </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="cons-side-bottom cons-nav" data-cons-btn data-panel="digital" data-title="<?php echo e(__('front.digital_media')); ?>">
                <span class="cons-side-caret-light">
                    <svg width="12" height="12" viewBox="0 0 24 24">
                        <path d="M7 10l5 5 5-5" fill="none" stroke="#665D99" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
                <span class="cons-side-bottom-label"><?php echo e(__('front.digital')); ?></span>
            </div>
        </aside>

        <div class="cons-main">
            <div class="cons-headbar">
                <div class="cons-breadcrumb">
                    <span><?php echo e(__('front.home')); ?></span>
                    <span class="cons-sep">›</span>
                    <span><?php echo e(__('front.consumable')); ?></span>
                    <span class="cons-sep">›</span>
                    <span class="cons-current" data-cons-current>
                        <?php if($consumables->first()): ?>
                            <?php echo e($locale === 'ar' ? $consumables->first()->name_ar : $consumables->first()->name_en); ?>

                        <?php endif; ?>
                    </span>
                </div>
            </div>

            <div class="cons-body">
                <div class="cons-heading">
                    <span class="cons-heading-mark">//</span>
                    <span class="cons-heading-tag" data-cons-heading>
                        <?php if($consumables->first()): ?>
                            <?php echo e($locale === 'ar' ? $consumables->first()->name_ar : $consumables->first()->name_en); ?>

                        <?php endif; ?>
                    </span>
                </div>

                <div class="cons-panels">
                    <?php $__currentLoopData = $consumables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $consumable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="cons-panel <?php echo e($index === 0 ? 'is-active' : ''); ?>" data-panel="consumable-<?php echo e($consumable->id); ?>">
                        <p class="cons-text">
                            <?php echo $locale === 'ar' ? $consumable->description_ar : $consumable->description_en; ?>

                        </p>

                        <?php if($consumable->key_features_en || $consumable->key_features_ar): ?>
                        <div class="cons-key">
                            <div class="cons-key-title"><?php echo e(__('front.key_features')); ?></div>
                            <ul class="cons-key-list">
                                <?php
                                    $features = $locale === 'ar' ? $consumable->key_features_ar : $consumable->key_features_en;
                                ?>
                                <?php if($features): ?>
                                    <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($feature); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <?php endif; ?>

                        <?php if($consumable->products->count() > 0): ?>
                        <div class="cons-products">
                            <?php $__currentLoopData = $consumable->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <article class="cons-prod-card">
                                <div class="cons-prod-img">
                                    <img src="<?php echo e(asset('assets/admin/uploads/' . $product->photo)); ?>" alt="<?php echo e($locale === 'ar' ? $product->name_ar : $product->name_en); ?>">
                                </div>
                                <div class="cons-prod-foot"><?php echo e($locale === 'ar' ? $product->name_ar : $product->name_en); ?></div>
                            </article>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/user/consumable.blade.php ENDPATH**/ ?>