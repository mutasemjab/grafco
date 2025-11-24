<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h3><?php echo e(__('messages.bottom_section_homes')); ?></h3>
        <a href="<?php echo e(route('bottomSectionHomes.create')); ?>" class="btn btn-primary">
            <?php echo e(__('messages.create_bottom_section_home')); ?>

        </a>
    </div>


    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th><?php echo e(__('messages.name_en')); ?></th>
                <th><?php echo e(__('messages.name_ar')); ?></th>
                <th><?php echo e(__('messages.photo')); ?></th>
                <th><?php echo e(__('messages.actions')); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->id); ?></td>
                <td><?php echo e($item->name_en); ?></td>
                <td><?php echo e($item->name_ar); ?></td>
                <td><img src="<?php echo e(asset('assets/admin/uploads/'.$item->photo)); ?>" style="width:60px;"></td>
                <td>
                    <a href="<?php echo e(route('bottomSectionHomes.edit',$item->id)); ?>" class="btn btn-sm btn-success">
                        <?php echo e(__('messages.edit')); ?>

                    </a>

                    <form action="<?php echo e(route('bottomSectionHomes.destroy',$item->id)); ?>" method="POST" style="display:inline">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm btn-danger"><?php echo e(__('messages.delete')); ?></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/admin/bottomSectionHomes/index.blade.php ENDPATH**/ ?>