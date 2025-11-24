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

    <div class="prod-nav" data-prod-nav>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="prod-nav-group">
          <button class="prod-nav-item <?php echo e($selectedCategory && $selectedCategory->id == $category->id ? 'is-active' : ''); ?>"
                    data-prod-category
                    data-category-id="<?php echo e($category->id); ?>"
                    data-panel="category-<?php echo e($category->id); ?>"
                    data-title="<?php echo e($category->name); ?>"
                    type="button">
                <span class="prod-nav-arrow">
                    <svg width="10" height="10" viewBox="0 0 24 24">
                        <path d="M9 6l6 6-6 6" fill="none" stroke="#665D99" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
                <span><?php echo e($category->name); ?></span>
            </button>

            
            <?php if($category->brands->count() > 0): ?>
            <div class="prod-brands-list" 
                 data-brands-for="category-<?php echo e($category->id); ?>"
                 style="display: <?php echo e($selectedCategory && $selectedCategory->id == $category->id ? 'block' : 'none'); ?>">
                <?php $__currentLoopData = $category->brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('products.index', ['category' => $category->slug, 'brand' => $brand->id])); ?>"
                   class="prod-brand-item <?php echo e($selectedBrand && $selectedBrand->id == $brand->id ? 'is-active' : ''); ?>">
                    <img src="<?php echo e(asset('assets/admin/uploads/' . $brand->photo)); ?>"
                         alt="<?php echo e($brand->name); ?>"
                         title="<?php echo e($brand->name); ?>">
                    <span><?php echo e($brand->name); ?></span>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</aside>

        <div class="prod-main">
            <div class="prod-headbar">
                <div class="prod-breadcrumb">
                    <span><?php echo e(__('front.home')); ?></span>
                    <span class="prod-sep">›</span>
                    <span><?php echo e(__('front.products')); ?></span>
                    <?php if($selectedBrand): ?>
                    <span class="prod-sep">›</span>
                    <span class="prod-current"><?php echo e($selectedBrand->name); ?></span>
                    <?php elseif($selectedCategory): ?>
                    <span class="prod-sep">›</span>
                    <span class="prod-current" data-prod-current><?php echo e($selectedCategory->name); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="prod-body">
              <div class="prod-heading">
                    <span class="prod-heading-mark">//</span>
                    <span class="prod-heading-tag" data-prod-heading>
                        <?php if($selectedBrand): ?>
                            <?php echo e($selectedBrand->name); ?> <?php echo e(__('front.products')); ?>

                        <?php elseif($selectedCategory): ?>
                            <?php echo e($selectedCategory->name); ?>

                        <?php else: ?>
                            <?php echo e(__('front.all_products')); ?>

                        <?php endif; ?>
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
                                <?php
                                    $products = $subcategory->products->where('is_active', true);
                                    if($selectedBrand) {
                                        $products = $products->where('brand_id', $selectedBrand->id);
                                    }
                                ?>

                                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <article class="prod-card">
                                    <a href="<?php echo e(route('product.details', $product->slug)); ?>">
                                        <div class="prod-card-img">
                                            <img src="<?php echo e(asset('assets/admin/uploads/' . $product->thumbnail)); ?>" alt="<?php echo e($product->name); ?>">
                                        </div>
                                        <div class="prod-card-foot"><?php echo e($product->name); ?></div>
                                    </a>
                                </article>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="no-products"><?php echo e(__('front.no_products_found')); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="prod-grid">
                            <?php
                                $products = $category->products->where('is_active', true);
                                if($selectedBrand) {
                                    $products = $products->where('brand_id', $selectedBrand->id);
                                }
                            ?>

                            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <article class="prod-card">
                                <a href="<?php echo e(route('product.details', $product->slug)); ?>">
                                    <div class="prod-card-img">
                                        <img src="<?php echo e(asset('assets/admin/uploads/' . $product->thumbnail)); ?>" alt="<?php echo e($product->name); ?>">
                                    </div>
                                    <div class="prod-card-foot"><?php echo e($product->name); ?></div>
                                </a>
                            </article>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="no-products"><?php echo e(__('front.no_products_found')); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            </div>
        </div>
    </div>
</section>

<style>
    .prod-nav-group {
    border-bottom: 1px solid rgba(102, 93, 153, 0.1);
}

.prod-nav-item {
    width: 100%;
    display: flex;
    align-items: center;
    padding: 12px 15px;
    background: none;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.prod-nav-item:hover {
    background-color: rgba(102, 93, 153, 0.05);
}

.prod-nav-item.is-active {
    background-color: rgba(102, 93, 153, 0.1);
    font-weight: 600;
}

.prod-nav-arrow {
    display: inline-flex;
    margin-right: 8px;
    transition: transform 0.3s ease;
}

.prod-nav-item.is-active .prod-nav-arrow {
    transform: rotate(90deg);
}

.prod-brands-list {
    padding-left: 25px;
    padding-bottom: 10px;
    background-color: rgba(102, 93, 153, 0.02);
}

.prod-brand-item {
    display: flex;
    align-items: center;
    padding: 8px 15px;
    text-decoration: none;
    color: #333;
    transition: all 0.3s ease;
    border-left: 3px solid transparent;
}

.prod-brand-item:hover {
    background-color: rgba(102, 93, 153, 0.05);
    border-left-color: #665D99;
}

.prod-brand-item.is-active {
    background-color: rgba(0, 0, 0, 0.1);
    border-left-color: #665D99;
    font-weight: 600;
}

.prod-brand-item img {
    width: 30px;
    height: 30px;
    object-fit: contain;
    margin-right: 10px;
}

.prod-brand-item span {
    font-size: 14px;
}
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
(function() {
    'use strict';
    
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
    
    function init() {
        const categoryButtons = document.querySelectorAll('[data-prod-category]');
        
        categoryButtons.forEach(function(button) {
            button.addEventListener('click', handleCategoryClick);
        });
        
        // Handle brand clicks to keep category open
        const brandLinks = document.querySelectorAll('.prod-brand-item');
        brandLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                // Let the link work normally, just mark that we clicked a brand
                sessionStorage.setItem('brandClicked', 'true');
                sessionStorage.setItem('activeCategoryId', this.closest('.prod-nav-group').querySelector('[data-category-id]').getAttribute('data-category-id'));
            });
        });
        
        // On page load, check if we came from a brand click
        const brandClicked = sessionStorage.getItem('brandClicked');
        const activeCategoryId = sessionStorage.getItem('activeCategoryId');
        
        if (brandClicked === 'true' && activeCategoryId) {
            // Keep the category open
            const categoryButton = document.querySelector(`[data-category-id="${activeCategoryId}"]`);
            const brandsSection = document.querySelector(`[data-brands-for="category-${activeCategoryId}"]`);
            const panel = document.querySelector(`[data-panel="category-${activeCategoryId}"]`);
            
            if (categoryButton) {
                categoryButton.classList.add('is-active');
            }
            if (brandsSection) {
                brandsSection.style.display = 'block';
            }
            if (panel) {
                panel.classList.add('is-active');
            }
            
            // Clear the session storage
            sessionStorage.removeItem('brandClicked');
        }
    }
    
    function handleCategoryClick(event) {
        event.preventDefault();
        
        const button = this;
        const categoryId = button.getAttribute('data-category-id');
        const brandsSelector = '[data-brands-for="category-' + categoryId + '"]';
        const brandsSection = document.querySelector(brandsSelector);
        
        // Toggle behavior
        const isActive = button.classList.contains('is-active');
        
        // Close all
        closeAllCategories();
        
        // Open clicked category if it wasn't active
        if (!isActive && brandsSection) {
            button.classList.add('is-active');
            brandsSection.style.display = 'block';
            
            // Show corresponding panel
            const panel = document.querySelector('[data-panel="category-' + categoryId + '"]');
            if (panel) {
                panel.classList.add('is-active');
            }
            
            // Update breadcrumb
            updateBreadcrumb(button.getAttribute('data-title'));
            
            // Store active category
            sessionStorage.setItem('activeCategoryId', categoryId);
        } else {
            sessionStorage.removeItem('activeCategoryId');
        }
    }
    
    function closeAllCategories() {
        // Remove all active states
        document.querySelectorAll('[data-prod-category]').forEach(function(btn) {
            btn.classList.remove('is-active');
        });
        
        // Hide all brand lists
        document.querySelectorAll('.prod-brands-list').forEach(function(section) {
            section.style.display = 'none';
        });
        
        // Hide all panels
        document.querySelectorAll('.prod-panel').forEach(function(panel) {
            panel.classList.remove('is-active');
        });
    }
    
    function updateBreadcrumb(title) {
        const heading = document.querySelector('[data-prod-heading]');
        const breadcrumb = document.querySelector('[data-prod-current]');
        
        if (heading) heading.textContent = title;
        if (breadcrumb) breadcrumb.textContent = title;
    }
})();
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/user/products.blade.php ENDPATH**/ ?>