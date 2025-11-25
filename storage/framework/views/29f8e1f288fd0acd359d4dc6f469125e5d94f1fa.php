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
            
            <div class="cons-type-group">
                <div class="cons-side-top" data-cons-type data-type-id="offset">
                    <span class="cons-side-label"><?php echo e(__('front.offset')); ?></span>
                    <span class="cons-side-caret">
                        <svg width="14" height="14" viewBox="0 0 24 24">
                            <path d="M7 10l5 5 5-5" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </div>

                <div class="cons-side-logos" data-logos-for="offset" style="display: block;">
                    <?php $__currentLoopData = $offsetConsumables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consumable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button class="cons-logo-item" 
                            data-cons-btn 
                            data-type="offset"
                            data-panel="consumable-<?php echo e($consumable->id); ?>" 
                            data-title="<?php echo e($locale === 'ar' ? $consumable->name_ar : $consumable->name_en); ?>">
                        <img src="<?php echo e(asset('assets/admin/uploads/' . $consumable->photo)); ?>" 
                             alt="<?php echo e($locale === 'ar' ? $consumable->name_ar : $consumable->name_en); ?>">
                        <span class="cons-logo-name"><?php echo e($locale === 'ar' ? $consumable->name_ar : $consumable->name_en); ?></span>

                    </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div class="cons-type-group">
                <div class="cons-side-bottom" data-cons-type data-type-id="digital">
                    <span class="cons-side-caret-light">
                        <svg width="12" height="12" viewBox="0 0 24 24">
                            <path d="M7 10l5 5 5-5" fill="none" stroke="#665D99" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="cons-side-bottom-label"><?php echo e(__('front.digital')); ?></span>
                </div>

                <div class="cons-side-logos cons-side-logos--digital" data-logos-for="digital" style="display: none;">
                    <?php $__currentLoopData = $digitalConsumables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consumable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button class="cons-logo-item" 
                            data-cons-btn 
                            data-type="digital"
                            data-panel="consumable-<?php echo e($consumable->id); ?>" 
                            data-title="<?php echo e($locale === 'ar' ? $consumable->name_ar : $consumable->name_en); ?>">
                        <img src="<?php echo e(asset('assets/admin/uploads/' . $consumable->photo)); ?>" 
                             alt="<?php echo e($locale === 'ar' ? $consumable->name_ar : $consumable->name_en); ?>">
                         <span class="cons-logo-name"><?php echo e($locale === 'ar' ? $consumable->name_ar : $consumable->name_en); ?></span>
                    </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </aside>

        <div class="cons-main">
            <div class="cons-headbar">
                <div class="cons-breadcrumb">
                    <span><?php echo e(__('front.home')); ?></span>
                    <span class="cons-sep">›</span>
                    <span><?php echo e(__('front.consumable')); ?></span>
                    <span class="cons-sep">›</span>
                    <span class="cons-type-breadcrumb" data-type-breadcrumb><?php echo e(__('front.offset')); ?></span>
                    <span class="cons-sep">›</span>
                    <span class="cons-current" data-cons-current>
                        <?php if($offsetConsumables->first()): ?>
                            <?php echo e($locale === 'ar' ? $offsetConsumables->first()->name_ar : $offsetConsumables->first()->name_en); ?>

                        <?php endif; ?>
                    </span>
                </div>
            </div>

            <div class="cons-body">
                <div class="cons-heading">
                    <span class="cons-heading-mark">//</span>
                    <span class="cons-heading-tag" data-cons-heading>
                        <?php if($offsetConsumables->first()): ?>
                            <?php echo e($locale === 'ar' ? $offsetConsumables->first()->name_ar : $offsetConsumables->first()->name_en); ?>

                        <?php endif; ?>
                    </span>
                </div>

              <div class="cons-panels">
    
    <?php $__currentLoopData = $offsetConsumables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $consumable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="cons-panel <?php echo e($index === 0 ? 'is-active' : ''); ?>" 
         data-panel="consumable-<?php echo e($consumable->id); ?>"
         data-type="offset">
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

        <?php if($consumable->products && $consumable->products->count() > 0): ?>
        <div class="cons-products">
            <?php $__currentLoopData = $consumable->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="cons-prod-card">
                <a href="<?php echo e(route('consumable_product.show', $product->id)); ?>" class="cons-prod-link">
                    <div class="cons-prod-img">
                        <img src="<?php echo e(asset('assets/admin/uploads/' . $product->photo)); ?>" 
                             alt="<?php echo e($locale === 'ar' ? $product->name_ar : $product->name_en); ?>">
                    </div>
                    <div class="cons-prod-foot"><?php echo e($locale === 'ar' ? $product->name_ar : $product->name_en); ?></div>
                </a>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <?php $__currentLoopData = $digitalConsumables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consumable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="cons-panel" 
         data-panel="consumable-<?php echo e($consumable->id); ?>"
         data-type="digital">
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

        <?php if($consumable->products && $consumable->products->count() > 0): ?>
        <div class="cons-products">
            <?php $__currentLoopData = $consumable->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="cons-prod-card">
                <a href="<?php echo e(route('consumable_product.show', $product->id)); ?>" class="cons-prod-link">
                    <div class="cons-prod-img">
                        <img src="<?php echo e(asset('assets/admin/uploads/' . $product->photo)); ?>" 
                             alt="<?php echo e($locale === 'ar' ? $product->name_ar : $product->name_en); ?>">
                    </div>
                    <div class="cons-prod-foot"><?php echo e($locale === 'ar' ? $product->name_ar : $product->name_en); ?></div>
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
<style>
.cons-type-group {
    border-bottom: 1px solid rgba(102, 93, 153, 0.1);
}

.cons-side-top,
.cons-side-bottom {
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px;
}

.cons-side-top:hover,
.cons-side-bottom:hover {
    background-color: rgba(102, 93, 153, 0.05);
}

.cons-side-top.is-active .cons-side-caret,
.cons-side-bottom.is-active .cons-side-caret-light {
    transform: rotate(180deg);
}

.cons-side-caret,
.cons-side-caret-light {
    transition: transform 0.3s ease;
    display: inline-flex;
}

.cons-side-logos {
    padding: 10px;
    display: none;
}

.cons-side-logos.is-visible {
    display: block;
}

.cons-side-logos--digital {
    background-color: rgba(102, 93, 153, 0.02);
}

.cons-logo-item {
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    background: none;
    padding: 8px;
    margin: 5px;
    display: flex;
    align-items: center;
    gap: 10px;
    width: 100%;
    text-align: left;
}

.cons-logo-item img {
    width: 40px;
    height: 40px;
    object-fit: contain;
    flex-shrink: 0;
}

.cons-logo-name {
    font-size: 14px;
    color: #333;
    flex: 1;
}

.cons-logo-item:hover {
    border-color: #665D99;
    background-color: rgba(102, 93, 153, 0.05);
}

.cons-logo-item.is-active {
    border-color: #665D99;
    background-color: rgba(102, 93, 153, 0.1);
}

.cons-logo-item.is-active .cons-logo-name {
    font-weight: 600;
    color: #665D99;
}

.cons-panel {
    display: none;
}

.cons-panel.is-active {
    display: block;
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
        console.log('Consumable navigation initialized');
        
        const typeButtons = document.querySelectorAll('[data-cons-type]');
        const consumableButtons = document.querySelectorAll('[data-cons-btn]');
        
        console.log('Type buttons found:', typeButtons.length);
        console.log('Consumable buttons found:', consumableButtons.length);
        
        typeButtons.forEach(function(button) {
            button.addEventListener('click', handleTypeClick);
        });
        
        consumableButtons.forEach(function(button) {
            button.addEventListener('click', handleConsumableClick);
        });
        
        // Set first offset type as active by default
        const firstTypeButton = document.querySelector('[data-type-id="offset"]');
        if (firstTypeButton) {
            firstTypeButton.classList.add('is-active');
            console.log('Offset type set as active');
        }
        
        // Set first offset consumable as active
        const firstConsumableButton = document.querySelector('[data-cons-btn][data-type="offset"]');
        if (firstConsumableButton) {
            firstConsumableButton.classList.add('is-active');
            console.log('First offset consumable set as active');
        }
    }
    
    function handleTypeClick(event) {
        console.log('Type clicked');
        const button = this;
        const typeId = button.getAttribute('data-type-id');
        const logosSelector = '[data-logos-for="' + typeId + '"]';
        const logosSection = document.querySelector(logosSelector);
        
        console.log('Type ID:', typeId);
        console.log('Logos section found:', logosSection !== null);
        
        const isActive = button.classList.contains('is-active');
        
        // Close all types
        closeAllTypes();
        
        // Open clicked type if it wasn't active
        if (!isActive) {
            button.classList.add('is-active');
            
            if (logosSection) {
                logosSection.style.display = 'block';
                
                // Activate first consumable in this type
                const firstConsumable = logosSection.querySelector('[data-cons-btn]');
                if (firstConsumable) {
                    console.log('Triggering first consumable click');
                    firstConsumable.click();
                }
            }
            
            // Update type breadcrumb
            updateTypeBreadcrumb(typeId);
        }
    }
    
    function handleConsumableClick(event) {
        event.preventDefault(); // Prevent default button behavior
        
        console.log('Consumable clicked');
        const button = this;
        const panelId = button.getAttribute('data-panel');
        const title = button.getAttribute('data-title');
        const type = button.getAttribute('data-type');
        
        console.log('Panel ID:', panelId);
        console.log('Title:', title);
        console.log('Type:', type);
        
        // Check if this button is already active
        const isAlreadyActive = button.classList.contains('is-active');
        
        // If clicking the same button that's already active, do nothing
        if (isAlreadyActive) {
            console.log('Already active, ignoring click');
            return;
        }
        
        // Remove active class from all consumable buttons
        document.querySelectorAll('[data-cons-btn]').forEach(function(btn) {
            btn.classList.remove('is-active');
        });
        
        // Add active class to clicked button
        button.classList.add('is-active');
        
        // Hide all panels first
        document.querySelectorAll('.cons-panel').forEach(function(panel) {
            panel.classList.remove('is-active');
        });
        
        // Show selected panel
        const selectedPanel = document.querySelector('[data-panel="' + panelId + '"]');
        console.log('Selected panel found:', selectedPanel !== null);
        
        if (selectedPanel) {
            // Use a small delay to ensure the remove class is processed first
            setTimeout(function() {
                selectedPanel.classList.add('is-active');
                console.log('Panel shown:', panelId);
            }, 10);
        } else {
            console.error('Panel not found:', panelId);
        }
        
        // Update breadcrumb and heading
        updateBreadcrumb(title);
    }
    
    function closeAllTypes() {
        // Remove active state from all type buttons
        document.querySelectorAll('[data-cons-type]').forEach(function(btn) {
            btn.classList.remove('is-active');
        });
        
        // Hide all logos sections
        document.querySelectorAll('[data-logos-for]').forEach(function(section) {
            section.style.display = 'none';
        });
        
        // Hide all panels
        document.querySelectorAll('.cons-panel').forEach(function(panel) {
            panel.classList.remove('is-active');
        });
    }
    
    function updateTypeBreadcrumb(typeId) {
        const typeBreadcrumb = document.querySelector('[data-type-breadcrumb]');
        if (typeBreadcrumb) {
            if (typeId === 'offset') {
                typeBreadcrumb.textContent = '<?php echo e(__("front.offset")); ?>';
            } else if (typeId === 'digital') {
                typeBreadcrumb.textContent = '<?php echo e(__("front.digital")); ?>';
            }
        }
    }
    
    function updateBreadcrumb(title) {
        const heading = document.querySelector('[data-cons-heading]');
        const breadcrumb = document.querySelector('[data-cons-current]');
        
        if (heading) {
            heading.textContent = title;
            console.log('Heading updated:', title);
        }
        if (breadcrumb) {
            breadcrumb.textContent = title;
            console.log('Breadcrumb updated:', title);
        }
    }
})();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/user/consumable.blade.php ENDPATH**/ ?>