<?php $__env->startSection('content'); ?>
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white"><?php echo e(__('messages.add_new')); ?></div>
        <div class="card-body">

            <form action="<?php echo e(route('careers.store')); ?>" method="post">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label class="form-label"><?php echo e(__('messages.name_en')); ?></label>
                    <input class="form-control" type="text" name="name_en">
                </div>
                <div class="mb-3">
                    <label class="form-label"><?php echo e(__('messages.name_ar')); ?></label>
                    <input class="form-control" type="text" name="name_ar">
                </div>
                <div class="mb-3">
                    <label class="form-label"><?php echo e(__('messages.description_en')); ?></label>
                    <textarea class="form-control rich-text" name="description_en"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label"><?php echo e(__('messages.description_ar')); ?></label>
                    <textarea class="form-control rich-text" name="description_ar"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label"><?php echo e(__('messages.bottom_name_en')); ?></label>
                    <input class="form-control" type="text" name="bottom_name_en">
                </div>
                <div class="mb-3">
                    <label class="form-label"><?php echo e(__('messages.bottom_name_ar')); ?></label>
                    <input class="form-control" type="text" name="bottom_name_ar">
                </div>
                <div class="mb-3">
                    <label class="form-label"><?php echo e(__('messages.bottom_description_en')); ?></label>
                    <textarea class="form-control rich-text" name="bottom_description_en"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label"><?php echo e(__('messages.bottom_description_ar')); ?></label>
                    <textarea class="form-control rich-text" name="bottom_description_ar"></textarea>
                </div>

                <button class="btn btn-success"><?php echo e(__('messages.save')); ?></button>
            </form>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/admin/careers/create.blade.php ENDPATH**/ ?>