<?php $__env->startSection('title', ($locale === 'ar' ? $product->name_ar : $product->name_en) . ' | graphco'); ?>

<?php $__env->startSection('content'); ?>
<section class="page-hero about-banner" style="background-image:url('<?php echo e(asset('assets_front/img/about-banner.jpg')); ?>')">
    <div class="about-banner__overlay"></div>
    <div class="container about-banner__inner">
        <h1 class="about-banner__title">Graphic Supplies Co.</h1>
    </div>
</section>

<section class="pdetail-shell">
    <div class="container pdetail-shell__inner">
        <aside class="prod-sidebar">
            <div class="prod-side-top">
                <div class="prod-side-main">
                    <span class="prod-side-caret">
                        <svg width="14" height="14" viewBox="0 0 24 24">
                            <path d="M7 10l5 5 5-5" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="prod-side-label"><?php echo e(__('front.consumable')); ?></span>
                </div>
            </div>

            <div class="prod-nav">
                <?php $__currentLoopData = $consumables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consumable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               
                    <span class="prod-nav-arrow">
                        <svg width="10" height="10" viewBox="0 0 24 24">
                            <path d="M9 6l6 6-6 6" fill="none" stroke="<?php echo e($product->consumable_id == $consumable->id ? '#fff' : '#665D99'); ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span><?php echo e($locale === 'ar' ? $consumable->name_ar : $consumable->name_en); ?></span>
                </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </aside>

        <div class="pdetail-main">
            <div class="pdetail-headbar">
                <div class="prod-breadcrumb">
                    <span><?php echo e(__('front.home')); ?></span>
                    <span class="prod-sep">›</span>
                    <span><?php echo e(__('front.consumables')); ?></span>
                    <span class="prod-sep">›</span>
                    <span><?php echo e($locale === 'ar' ? $product->consumable->name_ar : $product->consumable->name_en); ?></span>
                    <span class="prod-sep">›</span>
                    <span class="prod-current"><?php echo e($locale === 'ar' ? $product->name_ar : $product->name_en); ?></span>
                </div>
            </div>

            <div class="pdetail-top">
                <div class="pdetail-top-img">
                    <img src="<?php echo e(asset('assets/admin/uploads/' . $product->photo)); ?>" alt="<?php echo e($locale === 'ar' ? $product->name_ar : $product->name_en); ?>">
                </div>
                <div class="pdetail-top-info">
                    <div class="pdetail-brand"><?php echo e($locale === 'ar' ? $product->consumable->name_ar : $product->consumable->name_en); ?></div>
                    <h1 class="pdetail-title"><?php echo e($locale === 'ar' ? $product->name_ar : $product->name_en); ?></h1>

                    <?php if($locale === 'ar' && $product->description_ar): ?>
                    <div class="pdetail-subtitle"><?php echo nl2br(e($product->description_ar)); ?></div>
                    <?php elseif($product->description_en): ?>
                    <div class="pdetail-subtitle"><?php echo nl2br(e($product->description_en)); ?></div>
                    <?php endif; ?>

                    <?php
                        $keyFeatures = $locale === 'ar' ? $product->key_features_ar : $product->key_features_en;
                        if(is_string($keyFeatures)) {
                            $keyFeatures = json_decode($keyFeatures, true);
                        }
                    ?>

                    <?php if($keyFeatures && count($keyFeatures) > 0): ?>
                    <div class="pdetail-small-title"><?php echo e(__('front.key_features')); ?></div>
                    <ul class="pdetail-features">
                        <?php $__currentLoopData = $keyFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($feature): ?>
                            <li><?php echo e($feature); ?></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php endif; ?>

                   

                    
                </div>
            </div>

            <div class="pdetail-tabs" data-pdetail-tabs>
                <button class="pdetail-tab is-active" data-tab="about"><?php echo e(__('front.about')); ?></button>
                <button class="pdetail-tab" data-tab="features"><?php echo e(__('front.features')); ?></button>
            </div>

            <div class="pdetail-panels">
                <div class="pdetail-panel is-active" data-panel="about">
                    <div class="pdetail-features-block">
                        <h2 class="pdetail-block-title"><?php echo e($locale === 'ar' ? $product->name_ar : $product->name_en); ?></h2>
                        <?php if($locale === 'ar' && $product->description_ar): ?>
                        <div class="pdetail-download-paragraph">
                            <?php echo nl2br(e($product->description_ar)); ?>

                        </div>
                        <?php elseif($product->description_en): ?>
                        <div class="pdetail-download-paragraph">
                            <?php echo nl2br(e($product->description_en)); ?>

                        </div>
                        <?php else: ?>
                        <p><?php echo e(__('front.no_description')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="pdetail-panel" data-panel="features">
                    <div class="pdetail-features-block">
                        <h2 class="pdetail-block-title"><?php echo e(__('front.key_features')); ?></h2>
                        <?php if($keyFeatures && count($keyFeatures) > 0): ?>
                        <ul class="pdetail-feature-list">
                            <?php $__currentLoopData = $keyFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($feature): ?>
                                <li><?php echo e($feature); ?></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php else: ?>
                        <p><?php echo e(__('front.no_features')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/user/product-consumable-details.blade.php ENDPATH**/ ?>