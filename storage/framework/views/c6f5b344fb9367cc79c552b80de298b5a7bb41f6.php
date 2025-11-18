<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold"><?php echo e(__('messages.news')); ?></h3>
        <a href="<?php echo e(route('news.create')); ?>" class="btn btn-primary">+ <?php echo e(__('messages.add_new')); ?></a>
    </div>



    <div class="card shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th><?php echo e(__('messages.photo')); ?></th>
                    <th><?php echo e(__('messages.name_en')); ?></th>
                    <th><?php echo e(__('messages.name_ar')); ?></th>
                    <th><?php echo e(__('messages.date')); ?></th>
                    <th width="120"><?php echo e(__('messages.actions')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><img src="<?php echo e(asset('assets/admin/uploads/' . $item->photo)); ?>" width="60" class="rounded"></td>
                        <td><?php echo e($item->name_en); ?></td>
                        <td><?php echo e($item->name_ar); ?></td>
                        <td><?php echo e($item->date_of_news); ?></td>
                        <td>
                            <a href="<?php echo e(route('news.edit', $item->id)); ?>"
                                class="btn btn-sm btn-warning"><?php echo e(__('messages.edit')); ?></a>
                            <form action="<?php echo e(route('news.destroy', $item->id)); ?>" method="post" class="d-inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button onclick="return confirm('<?php echo e(__('sure?')); ?>')"
                                    class="btn btn-sm btn-danger"><?php echo e(__('messages.delete')); ?></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="mt-3"><?php echo e($items->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u215380673/domains/glovana.net/public_html/grafco/resources/views/admin/news/index.blade.php ENDPATH**/ ?>