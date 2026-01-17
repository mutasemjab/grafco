<?php
    $locale = app()->getLocale();
    $dir = $locale === 'ar' ? 'rtl' : 'ltr';
    $nav = [
        ['name'=> __('front.home'),'route'=>'home'],
        ['name'=> __('front.about'),'route'=>'about'],
        ['name'=> __('front.products'),'route'=>'products.index'],
        ['name'=> __('front.consumable'),'route'=>'consumable'],
        ['name'=> __('front.service'),'route'=>'service'],
        ['name'=> __('front.news_update'),'route'=>'news'],
        ['name'=> __('front.contact'),'route'=>'contact'],
        ['name'=> __('front.career'),'route'=>'career'],
    ];

    $setting = App\Models\Setting::first();

?>

<!-- Section: Topbar -->
<div class="topbar">
    <div class="container topbar-inner">
        <div class="help">
            <span class="ico">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M6.6 10.8c1.3 2.5 3.3 4.5 5.8 5.8l2-2c.3-.3.8-.4 1.1-.2 1.2.4 2.5.6 3.9.6.5 0 .9.4.9.9v3.4c0 .5-.4.9-.9.9C10.6 21.9 2.1 13.4 2.1 2.9c0-.5.4-.9.9-.9H7c.5 0 .9.4.9.9 0 1.3.2 2.6.6 3.9.1.4 0 .8-.3 1.1l-1.6 1.6Z" fill="currentColor"/>
                </svg>
            </span>
            <div class="help-text">
                <div class="help-title"><?php echo e(__('front.need_help')); ?></div>
             <a class="help-phone" href="tel: <?php echo e($setting->phone); ?>" dir="ltr">
                <?php echo e($setting->phone); ?>

            </a>

            </div>
        </div>

        <div class="top-actions">
           <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="lang-chip"  hreflang="<?php echo e($localeCode); ?>"
                href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>">

                    <?php if($localeCode == 'ar'): ?>
                        ع
                    <?php elseif($localeCode == 'en'): ?>
                        EN
                    <?php else: ?>
                        <?php echo e(strtoupper($localeCode)); ?>

                    <?php endif; ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <button class="icon-btn" type="button" data-open="search">
                <svg width="22" height="22" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M21 21l-3.9-3.9M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"/>
                </svg>
            </button>
            <button class="nav-toggle" aria-label="<?php echo e(__('front.menu')); ?>" data-toggle="mobile">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</div>

<!-- Section: Navbar -->
<header class="site-header">
    <div class="container nav-inner">
        <a href="<?php echo e(route('home')); ?>" class="brand">
            <img src="<?php echo e(asset('assets_front/img/logo.png')); ?>" alt="graphco" />
        </a>

        <nav class="nav" data-nav>
            <ul class="nav-list">
                <?php $__currentLoopData = $nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item <?php echo e(request()->routeIs($item['route']) ? 'is-active' : ''); ?>">
                        <a href="<?php echo e(route($item['route'])); ?>"><?php echo e($item['name']); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </nav>
    </div>

    <div class="mobile-panel" data-mobile-panel>
        <div class="mobile-head">
            <span><?php echo e(__('front.menu')); ?></span>
            <button class="icon-btn" data-close="mobile" aria-label="<?php echo e(__('front.close')); ?>">
                <svg width="22" height="22" viewBox="0 0 24 24"><path d="M18 6 6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            </button>
        </div>
        <ul class="mobile-list">
            <?php $__currentLoopData = $nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route($item['route'])); ?>"><?php echo e($item['name']); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="mobile-actions">
              <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="lang-chip full"  hreflang="<?php echo e($localeCode); ?>" href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>">
                <?php echo e($properties['native']); ?>

            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="search-drop" data-search>
        <form class="search-form" action="<?php echo e(route('products.search')); ?>" method="GET">
            <input type="text" name="q" placeholder="<?php echo e(__('front.search_placeholder')); ?>" required />
            <button type="submit" class="btn-primary"><?php echo e(__('front.search')); ?></button>
            <button class="icon-btn" type="button" data-close="search" aria-label="<?php echo e(__('front.close')); ?>">
                <svg width="22" height="22" viewBox="0 0 24 24"><path d="M18 6 6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            </button>
        </form>
    </div>

    <div class="overlay" data-overlay></div>
</header>
<?php /**PATH C:\xampp\htdocs\grafco\resources\views/user/includes/header.blade.php ENDPATH**/ ?>