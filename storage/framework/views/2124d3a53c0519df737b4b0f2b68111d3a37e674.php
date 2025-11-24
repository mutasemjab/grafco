<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3"><?php echo e(__('messages.products')); ?></h1>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-create')): ?>
        <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> <?php echo e(__('messages.add_product')); ?>

        </a>
        <?php endif; ?>
    </div>

    <?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 60px;"><?php echo e(__('messages.image')); ?></th>
                            <th><?php echo e(__('messages.name_en')); ?></th>
                            <th><?php echo e(__('messages.name_ar')); ?></th>
                            <th><?php echo e(__('messages.category')); ?></th>
                            <th><?php echo e(__('messages.brand')); ?></th>
                            <th><?php echo e(__('messages.price')); ?></th>
                            <th><?php echo e(__('messages.featured')); ?></th>
                            <th><?php echo e(__('messages.status')); ?></th>
                            <th><?php echo e(__('messages.actions')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <?php if($product->thumbnail): ?>
                                    <img src="<?php echo e(asset('assets/admin/uploads/'.$product->thumbnail)); ?>" 
                                         alt="<?php echo e($product->name_en); ?>" 
                                         class="img-thumbnail" 
                                         style="width: 50px; height: 50px; object-fit: cover;">
                                <?php else: ?>
                                    <div class="bg-light d-flex align-items-center justify-content-center" 
                                         style="width: 50px; height: 50px;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($product->name_en); ?></td>
                            <td dir="rtl"><?php echo e($product->name_ar); ?></td>
                            <td>
                                <span class="badge bg-secondary"><?php echo e($product->category->name_en); ?></span>
                            </td>
                            <td><?php echo e($product->brand->name); ?></td>
                            <td>
                                <?php if($product->show_price): ?>
                                    <strong><?php echo e(number_format($product->price, 2)); ?></strong>
                                <?php else: ?>
                                    <span class="text-muted"><?php echo e(__('messages.poa')); ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($product->is_featured): ?>
                                    <i class="fas fa-star text-warning"></i>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($product->is_active): ?>
                                    <span class="badge bg-success"><?php echo e(__('messages.active')); ?></span>
                                <?php else: ?>
                                    <span class="badge bg-danger"><?php echo e(__('messages.inactive')); ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-edit')): ?>
                                    <a href="<?php echo e(route('admin.products.edit', $product)); ?>" 
                                       class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php endif; ?>
                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-delete')): ?>
                                    <form action="<?php echo e(route('admin.products.destroy', $product)); ?>" 
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
                            <td colspan="9" class="text-center text-muted py-4">
                                <?php echo e(__('messages.no_products_found')); ?>

                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <?php echo e($products->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/admin/products/index.blade.php ENDPATH**/ ?>