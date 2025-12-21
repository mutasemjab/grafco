

<?php $__env->startSection('title', __('front.Our Partners')); ?>

<?php $__env->startSection('content'); ?>
    <!-- Brands Hero Section -->
    <section class="brands-hero">
        <div class="brands-hero__overlay"></div>
        <div class="container">
            <div class="brands-hero__inner">
                <h1 class="brands-hero__title"><?php echo e(__('front.Our Partners')); ?></h1>
                <div class="brands-hero__line"></div>
                <p class="brands-hero__text"><?php echo e(__('front.Trusted brands and partnerships')); ?></p>
            </div>
        </div>
    </section>

    <!-- Brands Grid Section -->
    <section class="brands-page-content">
        <div class="container">
            <div class="brands-page-grid">
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="brands-page-card">
                        <a href="<?php echo e(route('products.index', ['brand' => $brand->id])); ?>" class="brands-page-card__link">
                            <div class="brands-page-card__image">
                                <img src="<?php echo e(asset('assets/admin/uploads/' . $brand->photo)); ?>" alt="<?php echo e($brand->name ?? 'Brand'); ?>">
                            </div>
                            <div class="brands-page-card__overlay">
                                <span class="brands-page-card__name"><?php echo e($brand->name ?? ''); ?></span>
                                <div class="brands-page-card__arrow">
                                    <svg width="20" height="20" viewBox="0 0 24 24">
                                        <path d="M9 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php if($brands->isEmpty()): ?>
                <div class="brands-empty">
                    <p><?php echo e(__('front.No brands available')); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <style>
        .brands-hero {
    position: relative;
    background: linear-gradient(135deg, #9b51e0 0%, #665e99 100%);
    padding: 80px 0;
    color: #fff;
    overflow: hidden;
}

.brands-hero::before {
    content: "";
    position: absolute;
    inset: 0;
    background: url("../img/product-lines-bg.png") right center/contain no-repeat;
    opacity: 0.08;
    pointer-events: none;
}

.brands-hero__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, rgba(155, 81, 224, 0.95), rgba(102, 93, 153, 0.85));
}

.brands-hero__inner {
    position: relative;
    z-index: 1;
    text-align: center;
    max-width: 720px;
    margin: 0 auto;
}

.brands-hero__title {
    margin: 0 0 16px;
    font-size: 48px;
    font-weight: 700;
    line-height: 1.1;
}

.brands-hero__line {
    width: 120px;
    height: 4px;
    background: #01AD5E;
    margin: 0 auto 20px;
    border-radius: 4px;
}

.brands-hero__text {
    margin: 0;
    font-size: 18px;
    opacity: 0.95;
    line-height: 1.6;
}

/* Brands Page Content */
.brands-page-content {
    padding: 80px 0;
    background: #fff;
}

.brands-page-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 32px;
    margin-top: 40px;
}

.brands-page-card {
    background: #fff;
    border: 2px solid #e9e9e9;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
    position: relative;
}

.brands-page-card:hover {
    border-color: #9b51e0;
    box-shadow: 0 12px 32px rgba(155, 81, 224, 0.15);
    transform: translateY(-4px);
}

.brands-page-card__link {
    display: block;
    text-decoration: none;
    color: inherit;
}

.brands-page-card__image {
    position: relative;
    width: 100%;
    height: 220px;
    background: #f9f9f9;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 30px;
    overflow: hidden;
}

.brands-page-card__image img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    filter: grayscale(0);
    transition: all 0.3s ease;
}

.brands-page-card:hover .brands-page-card__image img {
    transform: scale(1.05);
}

.brands-page-card__overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(155, 81, 224, 0.95), rgba(155, 81, 224, 0.85));
    padding: 16px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    opacity: 0;
    transform: translateY(100%);
    transition: all 0.3s ease;
}

.brands-page-card:hover .brands-page-card__overlay {
    opacity: 1;
    transform: translateY(0);
}

.brands-page-card__name {
    color: #fff;
    font-size: 15px;
    font-weight: 600;
}

.brands-page-card__arrow {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    transition: all 0.3s ease;
}

.brands-page-card:hover .brands-page-card__arrow {
    background: rgba(255, 255, 255, 0.3);
    transform: translateX(4px);
}

.brands-empty {
    text-align: center;
    padding: 60px 20px;
    color: #8a8f96;
    font-size: 16px;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .brands-hero__title {
        font-size: 40px;
    }
    
    .brands-page-grid {
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 24px;
    }
    
    .brands-page-card__image {
        height: 200px;
        padding: 24px;
    }
}

@media (max-width: 768px) {
    .brands-hero {
        padding: 60px 0;
    }
    
    .brands-hero__title {
        font-size: 34px;
    }
    
    .brands-hero__text {
        font-size: 16px;
    }
    
    .brands-page-content {
        padding: 60px 0;
    }
    
    .brands-page-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 30px;
    }
    
    .brands-page-card__image {
        height: 180px;
        padding: 20px;
    }
}

@media (max-width: 480px) {
    .brands-hero__title {
        font-size: 28px;
    }
    
    .brands-hero__line {
        width: 80px;
        height: 3px;
    }
    
    .brands-page-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }
    
    .brands-page-card__image {
        height: 160px;
        padding: 16px;
    }
    
    .brands-page-card__name {
        font-size: 13px;
    }
}

/* RTL Specific Styles */
html[dir="rtl"] .brands-hero__inner {
    text-align: center;
}

html[dir="rtl"] .brands-page-card__arrow {
    transform: scaleX(-1);
}

html[dir="rtl"] .brands-page-card:hover .brands-page-card__arrow {
    transform: scaleX(-1) translateX(4px);
}

        </style>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/user/brands.blade.php ENDPATH**/ ?>