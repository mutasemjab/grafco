<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3><?php echo e(__('messages.services')); ?></h3>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-create')): ?>
        <a href="<?php echo e(route('services.create')); ?>" class="btn btn-success"><?php echo e(__('messages.create')); ?></a>
        <?php endif; ?>
    </div>

    <div class="card shadow">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th><?php echo e(__('messages.icon')); ?></th>
                        <th><?php echo e(__('messages.name_en')); ?></th>
                        <th><?php echo e(__('messages.name_ar')); ?></th>
                        <th width="150"><?php echo e(__('messages.actions')); ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><img src="<?php echo e(asset('assets/admin/uploads/'.$service->icon)); ?>" width="60" class="rounded"></td>
                        <td><?php echo e($service->name_en); ?></td>
                        <td><?php echo e($service->name_ar); ?></td>
                        <td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-edit')): ?>
                            <a href="<?php echo e(route('services.edit',$service->id)); ?>" class="btn btn-sm btn-primary"><?php echo e(__('messages.edit')); ?></a>
                            <?php endif; ?>
                            
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-delete')): ?>
                            <form action="<?php echo e(route('services.destroy',$service->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
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
        <?php echo e($services->links()); ?>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u215380673/domains/glovana.net/public_html/grafco/resources/views/admin/services/index.blade.php ENDPATH**/ ?>