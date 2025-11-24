<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h3><?php echo e(__('messages.service_page_sections')); ?></h3>
        <a href="<?php echo e(route('service-page-sections.create')); ?>" class="btn btn-primary">
            <?php echo e(__('messages.create_section')); ?>

        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="card">
        <table class="table table-bordered table-hover mb-0">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('messages.photo')); ?></th>
                    <th><?php echo e(__('messages.service_page')); ?></th>
                    <th><?php echo e(__('messages.title_en')); ?></th>
                    <th><?php echo e(__('messages.title_ar')); ?></th>
                    <th><?php echo e(__('messages.order')); ?></th>
                    <th><?php echo e(__('messages.actions')); ?></th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->id); ?></td>
                    <td><img src="<?php echo e(asset('assets/admin/uploads/'.$item->photo)); ?>" width="60"></td>
                    <td><?php echo e($item->servicePage->name_en ?? ''); ?></td>
                    <td><?php echo e($item->title_en); ?></td>
                    <td><?php echo e($item->title_ar); ?></td>
                    <td><?php echo e($item->order); ?></td>
                    <td>
                        <a href="<?php echo e(route('service-page-sections.edit', $item->id)); ?>" class="btn btn-sm btn-success">
                            <?php echo e(__('messages.edit')); ?>

                        </a>

                        <form action="<?php echo e(route('service-page-sections.destroy', $item->id)); ?>" method="POST" style="display:inline">
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
    </div>

    <div class="mt-3">
        <?php echo e($items->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/admin/service-page-sections/index.blade.php ENDPATH**/ ?>