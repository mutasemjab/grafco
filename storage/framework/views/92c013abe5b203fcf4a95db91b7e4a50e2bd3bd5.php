<?php $__env->startSection('title', __('front.title') . ' | graphco'); ?>

<?php $__env->startSection('content'); ?>
<section class="page-hero about-banner" style="background-image:url('<?php echo e(asset('assets_front/img/about-banner.jpg')); ?>')">
    <div class="about-banner__overlay"></div>
    <div class="container about-banner__inner">
        <h1 class="about-banner__title">Graphic Supplies Co.</h1>
    </div>
</section>

<section class="products-shell">
    <div class="container products-shell__inner">
        <aside class="prod-sidebar">
            <div class="prod-side-top">
                <div class="prod-side-main">
                    <span class="prod-side-caret">
                        <svg width="14" height="14" viewBox="0 0 24 24">
                            <path d="M7 10l5 5 5-5" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="prod-side-label"><?php echo e($selectedCategory ? $selectedCategory->name : __('front.all_categories')); ?></span>
                </div>
            </div>

            <?php if($selectedBrands->count() > 0): ?>
            <div class="prod-partner">
                <?php $__currentLoopData = $selectedBrands->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="<?php echo e($index == 0 ? 'prod-partner-main' : 'prod-partner-sub'); ?>">
                    <img src="<?php echo e(asset('assets/admin/uploads/' . $brand->photo)); ?>" alt="<?php echo e($brand->name); ?>">
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>

            <div class="prod-nav" data-prod-nav>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button class="prod-nav-item <?php echo e($selectedCategory && $selectedCategory->id == $category->id ? 'is-active' : ''); ?>" 
                        data-prod-brand 
                        data-panel="category-<?php echo e($category->id); ?>" 
                        data-title="<?php echo e($category->name); ?>">
                    <span class="prod-nav-arrow">
                        <svg width="10" height="10" viewBox="0 0 24 24">
                            <path d="M9 6l6 6-6 6" fill="none" stroke="#665D99" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span><?php echo e($category->name); ?></span>
                </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </aside>

        <div class="prod-main">
            <div class="prod-headbar">
                <div class="prod-breadcrumb">
                    <span><?php echo e(__('front.home')); ?></span>
                    <span class="prod-sep">›</span>
                    <span><?php echo e(__('front.products')); ?></span>
                    <?php if($selectedCategory): ?>
                    <span class="prod-sep">›</span>
                    <span class="prod-current" data-prod-current><?php echo e($selectedCategory->name); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="prod-body">
                <div class="prod-heading">
                    <span class="prod-heading-mark">//</span>
                    <span class="prod-heading-tag" data-prod-heading>
                        <?php echo e($selectedCategory ? $selectedCategory->name : __('front.all_products')); ?>

                    </span>
                </div>

                <div class="prod-panels">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="prod-panel <?php echo e($selectedCategory && $selectedCategory->id == $category->id ? 'is-active' : ''); ?>" 
                         data-panel="category-<?php echo e($category->id); ?>">
                        
                        <?php if($category->children->count() > 0): ?>
                            <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="prod-section">
                                <div class="prod-subheading">
                                    <span class="prod-heading-mark">//</span>
                                    <span><?php echo e($subcategory->name); ?></span>
                                </div>
                                <div class="prod-grid">
                                    <?php $__currentLoopData = $subcategory->products->where('is_active', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <article class="prod-card">
                                        <a href="<?php echo e(route('product.details', $product->slug)); ?>">
                                            <div class="prod-card-img">
                                                <img src="<?php echo e(asset('assets/admin/uploads/' . $product->thumbnail)); ?>" alt="<?php echo e($product->name); ?>">
                                            </div>
                                            <div class="prod-card-foot"><?php echo e($product->name); ?></div>
                                        </a>
                                    </article>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="prod-grid">
                                <?php $__currentLoopData = $category->products->where('is_active', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <article class="prod-card">
                                    <a href="<?php echo e(route('product.details', $product->slug)); ?>">
                                        <div class="prod-card-img">
                                            <img src="<?php echo e(asset('assets/admin/uploads/' . $product->thumbnail)); ?>" alt="<?php echo e($product->name); ?>">
                                        </div>
                                        <div class="prod-card-foot"><?php echo e($product->name); ?></div>
                                    </a>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u215380673/domains/glovana.net/public_html/grafco/resources/views/user/products.blade.php ENDPATH**/ ?>