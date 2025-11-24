<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3><?php echo e(__('messages.brands')); ?></h3>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brand-create')): ?>
        <a href="<?php echo e(route('brands.create')); ?>" class="btn btn-success"><?php echo e(__('messages.create')); ?></a>
        <?php endif; ?>
    </div>

    <div class="card shadow">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th><?php echo e(__('messages.photo')); ?></th>
                        <th><?php echo e(__('messages.name')); ?></th>
                        <th width="150"><?php echo e(__('messages.actions')); ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><img src="<?php echo e(asset('assets/admin/uploads/'.$brand->photo)); ?>" width="60" class="rounded"></td>
                        <td><?php echo e($brand->name); ?></td>
                        <td>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brand-edit')): ?>
                            <a href="<?php echo e(route('brands.edit',$brand->id)); ?>" class="btn btn-sm btn-primary">
                                <?php echo e(__('messages.edit')); ?>

                            </a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brand-delete')): ?>
                            <form action="<?php echo e(route('brands.destroy',$brand->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger"><?php echo e(__('messages.delete')); ?></button>
                            </form>
                            <?php endif; ?>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        <?php echo e($brands->links()); ?>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/admin/brands/index.blade.php ENDPATH**/ ?>