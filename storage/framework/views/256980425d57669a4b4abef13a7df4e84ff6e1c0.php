<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0"><?php echo e(__('messages.edit_brand')); ?></h4>
                </div>

                <div class="card-body">
                    <form action="<?php echo e(route('brands.update',$brand->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="form-group">
                            <label><?php echo e(__('messages.name')); ?></label>
                            <input type="text" name="name" value="<?php echo e(old('name',$brand->name)); ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label><?php echo e(__('messages.photo')); ?></label><br>
                            <img src="<?php echo e(asset('storage/'.$brand->photo)); ?>" width="80" class="mb-2 rounded">
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <button class="btn btn-primary btn-block"><?php echo e(__('messages.save')); ?></button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u215380673/domains/glovana.net/public_html/grafco/resources/views/admin/brands/edit.blade.php ENDPATH**/ ?>