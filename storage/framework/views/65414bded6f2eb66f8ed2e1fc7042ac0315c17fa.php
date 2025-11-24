<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3"><?php echo e(__('messages.categories')); ?></h1>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-create')): ?>
        <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> <?php echo e(__('messages.add_category')); ?>

        </a>
        <?php endif; ?>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><?php echo e(__('messages.id')); ?></th>
                            <th><?php echo e(__('messages.name_en')); ?></th>
                            <th><?php echo e(__('messages.name_ar')); ?></th>
                            <th><?php echo e(__('messages.parent_category')); ?></th>
                            <th><?php echo e(__('messages.brands')); ?></th>
                            <th><?php echo e(__('messages.sort_order')); ?></th>
                            <th><?php echo e(__('messages.status')); ?></th>
                            <th><?php echo e(__('messages.actions')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($category->id); ?></td>
                            <td><?php echo e($category->name_en); ?></td>
                            <td><?php echo e($category->name_ar); ?></td>
                            <td>
                                <?php if($category->parent): ?>
                                    <span class="badge bg-secondary"><?php echo e($category->parent->name_en); ?></span>
                                <?php else: ?>
                                    <span class="text-muted"><?php echo e(__('messages.main_category')); ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge bg-info"><?php echo e($category->brands->count()); ?></span>
                            </td>
                            <td><?php echo e($category->sort_order); ?></td>
                            <td>
                                <?php if($category->is_active): ?>
                                    <span class="badge bg-success"><?php echo e(__('messages.active')); ?></span>
                                <?php else: ?>
                                    <span class="badge bg-danger"><?php echo e(__('messages.inactive')); ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-edit')): ?>
                                    <a href="<?php echo e(route('admin.categories.edit', $category)); ?>" 
                                       class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php endif; ?>
                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-delete')): ?>
                                    <form action="<?php echo e(route('admin.categories.destroy', $category)); ?>" 
                                          method="POST" 
                                          onsubmit="return confirm('<?php echo e(__('messages.confirm_delete')); ?>');"
                                          class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                <?php echo e(__('messages.no_categories_found')); ?>

                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>