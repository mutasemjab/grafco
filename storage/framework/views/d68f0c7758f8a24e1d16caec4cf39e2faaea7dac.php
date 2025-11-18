<?php $__env->startSection('title', __('messages.pages_management')); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title"><?php echo e(__('messages.pages_management')); ?></h3>
                    <a href="<?php echo e(route('pages.create')); ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i> <?php echo e(__('messages.add_new_page')); ?>

                    </a>
                </div>


                <div class="card-body">
                    <?php if($pages->count() > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th><?php echo e(__('messages.id')); ?></th>
                                        <th><?php echo e(__('messages.type')); ?></th>
                                        <th><?php echo e(__('messages.title_en')); ?></th>
                                        <th><?php echo e(__('messages.title_ar')); ?></th>
                                        <th><?php echo e(__('messages.created_at')); ?></th>
                                        <th><?php echo e(__('messages.actions')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($page->id); ?></td>
                                            <td>
                                                <span class="badge bg-<?php echo e($page->type == 1 ? 'primary' : 'success'); ?>">
                                                    <?php echo e($page->type_name); ?>

                                                </span>
                                            </td>
                                            <td>
                                                <strong><?php echo e(Str::limit($page->title_en, 30)); ?></strong>
                                            </td>
                                            <td>
                                                <strong><?php echo e(Str::limit($page->title_ar, 30)); ?></strong>
                                            </td>
                                            <td><?php echo e($page->created_at->format('Y-m-d H:i')); ?></td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('pages.show', $page)); ?>" 
                                                       class="btn btn-sm btn-info" 
                                                       title="<?php echo e(__('messages.view')); ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo e(route('pages.edit', $page)); ?>" 
                                                       class="btn btn-sm btn-warning" 
                                                       title="<?php echo e(__('messages.edit')); ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="button" 
                                                            class="btn btn-sm btn-danger" 
                                                            title="<?php echo e(__('messages.delete')); ?>"
                                                            onclick="confirmDelete(<?php echo e($page->id); ?>, '<?php echo e(addslashes($page->title_en)); ?>')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>

                                                <!-- Hidden delete form -->
                                                <form id="delete-form-<?php echo e($page->id); ?>" 
                                                      action="<?php echo e(route('pages.destroy', $page)); ?>" 
                                                      method="POST" 
                                                      style="display: none;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-5">
                            <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted"><?php echo e(__('messages.no_pages_found')); ?></h4>
                            <p class="text-muted"><?php echo e(__('messages.create_first_page')); ?></p>
                            <a href="<?php echo e(route('pages.create')); ?>" class="btn btn-primary">
                                <i class="fas fa-plus"></i> <?php echo e(__('messages.add_new_page')); ?>

                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if($pages->count() > 0): ?>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info">
                                    <?php echo e(__('messages.showing_entries', [
                                        'start' => 1,
                                        'end' => $pages->count(),
                                        'total' => $pages->count()
                                    ])); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('messages.confirm_deletion')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><?php echo e(__('messages.are_you_sure_delete_page')); ?></p>
                <p><strong id="page-title"></strong></p>
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                    <?php echo e(__('messages.this_action_cannot_be_undone')); ?>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <?php echo e(__('messages.cancel')); ?>

                </button>
                <button type="button" class="btn btn-danger" onclick="deleteConfirmed()">
                    <i class="fas fa-trash"></i> <?php echo e(__('messages.delete')); ?>

                </button>
            </div>
        </div>
    </div>
</div>

<script>
let currentDeleteId = null;

function confirmDelete(id, title) {
    currentDeleteId = id;
    document.getElementById('page-title').textContent = title;
    
    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

function deleteConfirmed() {
    if (currentDeleteId) {
        document.getElementById('delete-form-' + currentDeleteId).submit();
    }
}
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u215380673/domains/glovana.net/public_html/grafco/resources/views/admin/pages/index.blade.php ENDPATH**/ ?>