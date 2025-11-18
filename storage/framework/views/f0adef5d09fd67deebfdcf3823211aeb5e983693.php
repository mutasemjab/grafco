<?php $__env->startSection('title', __('front.title') . ' | graphco'); ?>

<?php $__env->startSection('content'); ?>
<section class="career-page">
    <div class="container">
        <h1 class="career-title"><?php echo e(__('front.title')); ?></h1>
        <div class="career-title-line"></div>

        <?php if($career): ?>
        <div class="career-intro">
            <div class="career-intro-line"></div>
            <h2 class="career-intro-heading"><?php echo e($career->name); ?></h2>
            <div class="career-intro-line"></div>
        </div>

        <p class="career-intro-text">
            <?php echo e($career->description); ?>

        </p>
        <?php endif; ?>

        <div class="career-positions-head">
            <div class="career-pos-line"></div>
            <div class="career-pos-title"><?php echo e(__('front.available_positions')); ?></div>
            <div class="career-pos-line"></div>
        </div>

        <div class="career-positions">
            <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="career-position">
                <div class="career-icon">
                    <?php if($position->photo): ?>
                        <img src="<?php echo e(asset('assets/admin/uploads/' . $position->photo)); ?>" alt="<?php echo e($position->name); ?>" width="40" height="40">
                    <?php else: ?>
                        <!-- Default SVG icon -->
                        <svg width="40" height="40" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" fill="#01AD5E" opacity=".12"/>
                            <path d="M12 6a3 3 0 0 1 3 3c0 1.3-.4 2.1-.9 2.6l-.5.5V14h-2.2v-2.3l-.5-.5C10.4 11.1 10 10.3 10 9a3 3 0 0 1 3-3Z" fill="#01AD5E"/>
                            <path d="M8.5 17.5c.4-1.5 1.9-2.5 3.5-2.5s3.1 1 3.5 2.5" stroke="#01AD5E" stroke-width="1.6" stroke-linecap="round"/>
                        </svg>
                    <?php endif; ?>
                </div>
                <button class="career-pill"><?php echo e($position->name); ?></button>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="career-apply-wrap">
            <button class="career-apply-btn"><?php echo e(__('front.apply_online')); ?></button>
        </div>

        <?php if($career): ?>
        <div class="career-footer">
            <h2 class="career-footer-title"><?php echo e($career->bottom_name); ?></h2>
            <p class="career-footer-text">
                <?php echo $career->bottom_description; ?>

            </p>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/user/career.blade.php ENDPATH**/ ?>