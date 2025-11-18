<?php
    $locale = app()->getLocale();
    $dir = $locale === 'ar' ? 'rtl' : 'ltr';
?>
<!doctype html>
<html lang="<?php echo e($locale); ?>" dir="<?php echo e($dir); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'graphco'); ?></title>

    <!-- Section: Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Tajawal:wght@400;500;700&display=swap"
        rel="stylesheet">

    <!-- Section: Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_front/css/base.css')); ?>">
    <?php if($dir === 'rtl'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets_front/css/rtl.css')); ?>">
    <?php endif; ?>
</head>

<body>
    <?php echo $__env->make('user.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="page-wrap">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('user.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Section: Scripts -->
    <script src="<?php echo e(asset('assets_front/js/app.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\grafco\resources\views/layouts/app.blade.php ENDPATH**/ ?>