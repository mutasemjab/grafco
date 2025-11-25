<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h3><?php echo e(__('messages.consumables')); ?></h3>
        <a href="<?php echo e(route('consumables.create')); ?>" class="btn btn-primary">
            <?php echo e(__('messages.create_consumable')); ?>

        </a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th><?php echo e(__('messages.photo')); ?></th>
                <th><?php echo e(__('messages.name_en')); ?></th>
                <th><?php echo e(__('messages.name_ar')); ?></th>
                <th><?php echo e(__('messages.type')); ?></th>
                <th><?php echo e(__('messages.actions')); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->id); ?></td>
                <td><img src="<?php echo e(asset('assets/admin/uploads/'.$item->photo)); ?>" width="60"></td>
                <td><?php echo e($item->name_en); ?></td>
                <td><?php echo e($item->name_ar); ?></td>
                <td><?php echo e($item->type); ?></td>
                <td>
                    <a href="<?php echo e(route('consumables.edit',$item->id)); ?>" class="btn btn-sm btn-success">
                        <?php echo e(__('messages.edit')); ?>

                    </a>

                    <form action="<?php echo e(route('consumables.destroy',$item->id)); ?>" method="POST" style="display:inline">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('<?php echo e(__('messages.are_you_sure')); ?>')">
                            <?php echo e(__('messages.delete')); ?>

                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="mt-3">
        <?php echo e($items->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/admin/consumables/index.blade.php ENDPATH**/ ?>