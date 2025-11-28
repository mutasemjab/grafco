<?php $__env->startSection('title', __('front.news') . ' | graphco'); ?>

<?php $__env->startSection('content'); ?>
<?php
    // Get unique years from news
    $newsYears = $news->pluck('date_of_news')
                     ->map(function($date) {
                         return \Carbon\Carbon::parse($date)->year;
                     })
                     ->unique()
                     ->sort()
                     ->values();
?>

<section class="news-page">
    <div class="container">
        <h1 class="news-title-main"><?php echo e(__('front.graphco_news')); ?></h1>
        <div class="news-title-line"></div>

        <div class="news-toprow">
            <div class="news-tabs" data-news-tabs>
                <button class="news-tab is-active" data-year="all"><?php echo e(__('front.all')); ?></button>
                <?php $__currentLoopData = $newsYears; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button class="news-tab" data-year="<?php echo e($year); ?>"><?php echo e($year); ?></button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="news-search">
                <span class="news-search-ico">
                    <svg width="18" height="18" viewBox="0 0 24 24">
                        <path d="M21 21l-3.9-3.9M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z" stroke="#8a8f96" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
                <input type="text" placeholder="<?php echo e(__('front.search')); ?>" data-news-search>
            </div>
        </div>

        <div class="news-list" data-news-list>
            <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $year = \Carbon\Carbon::parse($item->date_of_news)->year;
                    $formattedDate = \Carbon\Carbon::parse($item->date_of_news)->format('M d, Y');
                ?>
                                    <a href="<?php echo e(route('new.details',$item->id)); ?>" style=" color: inherit; text-decoration: none;">

                <article class="news-item" data-year="<?php echo e($year); ?>" data-index="<?php echo e($index); ?>">
                    <div class="news-item-image">
                        <img src="<?php echo e(asset('assets/admin/uploads/' . $item->photo)); ?>" alt="<?php echo e($locale === 'ar' ? $item->name_ar : $item->name_en); ?>">
                    </div>
                    <div class="news-item-body">
                        <div class="news-item-head">
                            <h2 class="news-item-title"><?php echo e($locale === 'ar' ? $item->name_ar : $item->name_en); ?></h2>
                            <span class="news-item-date"><?php echo e($formattedDate); ?></span>
                        </div>
                        <p class="news-item-text">
                            <?php echo Str::limit($locale === 'ar' ? $item->description_ar : $item->description_en, 150); ?>

                        </p>
                    </div>
                     
                </article>
               </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if($news->count() > 6): ?>
        <div class="news-more-wrap">
            <button class="news-more-btn" type="button" data-news-more><?php echo e(__('front.load_more')); ?></button>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/user/news.blade.php ENDPATH**/ ?>