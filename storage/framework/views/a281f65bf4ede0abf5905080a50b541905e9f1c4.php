<?php $__env->startSection('content'); ?>
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark"><?php echo e(__('messages.edit')); ?></div>
        <div class="card-body">

            <form action="<?php echo e(route('news.update', $item->id)); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

                <div class="mb-3">
                    <label class="form-label"><?php echo e(__('messages.date')); ?></label>
                    <input class="form-control" type="date" name="date_of_news" value="<?php echo e($item->date_of_news); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label"><?php echo e(__('messages.name_en')); ?></label>
                    <input class="form-control" type="text" name="name_en" value="<?php echo e($item->name_en); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label"><?php echo e(__('messages.name_ar')); ?></label>
                    <input class="form-control" type="text" name="name_ar" value="<?php echo e($item->name_ar); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label"><?php echo e(__('messages.description_en')); ?></label>
                    <textarea class="form-control rich-text" name="description_en"><?php echo e($item->description_en); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label"><?php echo e(__('messages.description_ar')); ?></label>
                    <textarea class="form-control rich-text" name="description_ar"><?php echo e($item->description_ar); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label"><?php echo e(__('messages.photo')); ?></label>
                    <input class="form-control" type="file" name="photo">
                    <img src="<?php echo e(asset('assets/admin/uploads/' . $item->photo)); ?>" width="100"
                        class="rounded mt-2 border">
                </div>

                <button class="btn btn-success"><?php echo e(__('messages.update')); ?></button>
            </form>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u215380673/domains/glovana.net/public_html/grafco/resources/views/admin/news/edit.blade.php ENDPATH**/ ?>