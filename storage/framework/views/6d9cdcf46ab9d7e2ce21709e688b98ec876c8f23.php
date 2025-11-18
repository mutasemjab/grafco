<?php $__env->startSection('content'); ?>
<div class="container">
    <h3 class="mb-4"><?php echo e(__('messages.create_about')); ?></h3>

    <form action="<?php echo e(route('abouts.store')); ?>" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label><?php echo e(__('messages.type')); ?></label>
            <select name="type" class="form-control">
                <option value="company_profile"><?php echo e(__('messages.company_profile')); ?></option>
                <option value="vision"><?php echo e(__('messages.vision')); ?></option>
            </select>
        </div>

        <div class="form-group">
            <label><?php echo e(__('messages.name_en')); ?></label>
            <input type="text" name="name_en" class="form-control" value="<?php echo e(old('name_en')); ?>">
        </div>

        <div class="form-group">
            <label><?php echo e(__('messages.name_ar')); ?></label>
            <input type="text" name="name_ar" class="form-control" value="<?php echo e(old('name_ar')); ?>">
        </div>

        <div class="form-group">
            <label><?php echo e(__('messages.description_en')); ?></label>
            <textarea name="description_en" class="form-control rich-text" rows="3"><?php echo e(old('description_en')); ?></textarea>
        </div>

        <div class="form-group">
            <label><?php echo e(__('messages.description_ar')); ?></label>
            <textarea name="description_ar" class="form-control rich-text" rows="3"><?php echo e(old('description_ar')); ?></textarea>
        </div>

        <div class="form-group">
            <label><?php echo e(__('messages.photo')); ?></label>
            <input type="file" name="photo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary"><?php echo e(__('messages.save')); ?></button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u215380673/domains/glovana.net/public_html/grafco/resources/views/admin/abouts/create.blade.php ENDPATH**/ ?>