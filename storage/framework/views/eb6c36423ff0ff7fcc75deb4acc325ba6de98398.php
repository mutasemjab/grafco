<?php $__env->startSection('content'); ?>
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-warning text-dark"><?php echo e(__('messages.edit')); ?></div>
        <div class="card-body">

            <form action="<?php echo e(route('careers.update', $item->id)); ?>" method="post">
                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

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
                    <label class="form-label"><?php echo e(__('messages.bottom_name_en')); ?></label>
                    <input class="form-control" type="text" name="bottom_name_en" value="<?php echo e($item->bottom_name_en); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label"><?php echo e(__('messages.bottom_name_ar')); ?></label>
                    <input class="form-control" type="text" name="bottom_name_ar" value="<?php echo e($item->bottom_name_ar); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label"><?php echo e(__('messages.bottom_description_en')); ?></label>
                    <textarea class="form-control rich-text" name="bottom_description_en"><?php echo e($item->bottom_description_en); ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label"><?php echo e(__('messages.bottom_description_ar')); ?></label>
                    <textarea class="form-control rich-text" name="bottom_description_ar"><?php echo e($item->bottom_description_ar); ?></textarea>
                </div>

                <button class="btn btn-success"><?php echo e(__('messages.update')); ?></button>
            </form>
        </div>
    </div>

    <!-- Available Positions Table -->
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <span><?php echo e(__('messages.available_positions')); ?></span>
            <button class="btn btn-sm btn-light" data-bs-toggle="collapse" data-bs-target="#addPositionForm">+
                <?php echo e(__('messages.add_new')); ?></button>
        </div>
        <div class="collapse" id="addPositionForm">
            <div class="card-body">
                <form action="<?php echo e(route('careers.positions.store', $item->id)); ?>" method="post"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="name_en" placeholder="<?php echo e(__('messages.name_en')); ?>">
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="name_ar" placeholder="<?php echo e(__('messages.name_ar')); ?>">
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="file" name="photo">
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-success"><?php echo e(__('messages.save')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th><?php echo e(__('messages.photo')); ?></th>
                        <th><?php echo e(__('messages.name_en')); ?></th>
                        <th><?php echo e(__('messages.name_ar')); ?></th>
                        <th width="120"><?php echo e(__('messages.actions')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $item->availablePositions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><img src="<?php echo e(asset('assets/admin/uploads/' . $position->photo)); ?>" width="60" class="rounded"></td>
                            <td><?php echo e($position->name_en); ?></td>
                            <td><?php echo e($position->name_ar); ?></td>
                            <td>
                                <form action="<?php echo e(route('positions.destroy', $position->id)); ?>" method="post"
                                    class="d-inline">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button onclick="return confirm('<?php echo e(__('messages.sure?')); ?>')"
                                        class="btn btn-sm btn-danger"><?php echo e(__('messages.delete')); ?></button>
                                </form>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="collapse"
                                    data-bs-target="#editPosition<?php echo e($position->id); ?>"><?php echo e(__('messages.edit')); ?></button>
                            </td>
                        </tr>
                        <tr class="collapse" id="editPosition<?php echo e($position->id); ?>">
                            <td colspan="4">
                                <form action="<?php echo e(route('positions.update', $position->id)); ?>" method="post"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <input class="form-control" type="text" name="name_en"
                                                value="<?php echo e($position->name_en); ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control" type="text" name="name_ar"
                                                value="<?php echo e($position->name_ar); ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control" type="file" name="photo">
                                            <img src="<?php echo e(asset('assets/admin/uploads/' . $position->photo)); ?>" width="50"
                                                class="rounded mt-1">
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn btn-success"><?php echo e(__('messages.update')); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/admin/careers/edit.blade.php ENDPATH**/ ?>