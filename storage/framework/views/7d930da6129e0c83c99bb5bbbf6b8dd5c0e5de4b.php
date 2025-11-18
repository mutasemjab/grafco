<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><?php echo e(__('messages.create_service')); ?></h4>
                </div>

                <div class="card-body">
                    <form action="<?php echo e(route('services.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label><?php echo e(__('messages.name_en')); ?></label>
                            <input type="text" name="name_en" value="<?php echo e(old('name_en')); ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label><?php echo e(__('messages.name_ar')); ?></label>
                            <input type="text" name="name_ar" value="<?php echo e(old('name_ar')); ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label><?php echo e(__('messages.description_en')); ?></label>
                            <textarea name="description_en" class="form-control rich-text"><?php echo e(old('description_en')); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label><?php echo e(__('messages.description_ar')); ?></label>
                            <textarea name="description_ar" class="form-control rich-text"><?php echo e(old('description_ar')); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label><?php echo e(__('messages.icon')); ?></label>
                            <input type="file" name="icon" class="form-control">
                        </div>

                        <button class="btn btn-success btn-block"><?php echo e(__('messages.save')); ?></button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u215380673/domains/glovana.net/public_html/grafco/resources/views/admin/services/create.blade.php ENDPATH**/ ?>