<?php $__env->startSection('title', __('messages.Employees')); ?>


<?php $__env->startSection('css'); ?>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);"><?php echo e(env('APP_NAME')); ?></a>
                            </li>
                            <li class="breadcrumb-item active"><?php echo e(__('messages.Employees')); ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?php echo e(__('messages.Employees')); ?></h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <?php echo e($data->links()); ?>

                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-right">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee-add')): ?>
                                    <a type="button" href="<?php echo e(route('admin.employee.create')); ?>"
                                        class="btn btn-primary waves-effect waves-light mb-2 text-white">
                                        <?php echo e(__('messages.New Employee')); ?>

                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap table-hover mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th><?php echo e(__('messages.Name')); ?></th>
                                        <th><?php echo e(__('messages.Email')); ?></th>
                                        <th><?php echo e(__('messages.Username')); ?></th>
                                        <th><?php echo e(__('messages.Roles')); ?></th>
                                        <th><?php echo e(__('messages.Created')); ?></th>
                                        <th style="width: 82px;"><?php echo e(__('messages.Action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-2">
                                                        <div class="avatar-sm bg-primary rounded-circle d-flex align-items-center justify-content-center">
                                                            <i class="fas fa-user text-white"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <span class="font-weight-bold"><?php echo e($employee->name); ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo e($employee->email); ?>

                                            </td>
                                            <td>
                                                <?php echo e($employee->username ?: __('messages.Not set')); ?>

                                            </td>
                                            <td>
                                                <span class="badge badge-success"><?php echo e($employee->roles->count()); ?></span>
                                                <?php if($employee->roles->count() > 0): ?>
                                                <button class="btn btn-link btn-sm p-0 ml-1" 
                                                        type="button" 
                                                        data-toggle="collapse" 
                                                        data-target="#roles<?php echo e($employee->id); ?>" 
                                                        aria-expanded="false">
                                                    <small><?php echo e(__('messages.View')); ?></small>
                                                </button>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    <?php echo e($employee->created_at->format('M d, Y')); ?>

                                                    <br>
                                                    <?php echo e($employee->created_at->diffForHumans()); ?>

                                                </small>
                                            </td>
                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee-edit')): ?>
                                                <a class="btn btn-sm btn-outline-info"
                                                    href="<?php echo e(route('admin.employee.edit', $employee->id)); ?>">
                                                    <i class="mdi mdi-pencil-box"></i> <?php echo e(__('messages.Edit')); ?>

                                                </a>
                                                <?php endif; ?>
                                                
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee-delete')): ?>
                                                <a class="btn btn-sm btn-outline-danger" 
                                                   href="javascript:void(0)"
                                                   <?php if(env('Environment') == 'sendbox'): ?> 
                                                       onclick="myFunction()" 
                                                   <?php else: ?> 
                                                       onclick="confirmDelete(<?php echo e($employee->id); ?>, '<?php echo e($employee->name); ?>')"
                                                   <?php endif; ?>>
                                                    <i class="mdi mdi-trash-can"></i> <?php echo e(__('messages.Delete')); ?>

                                                </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php if($employee->roles->count() > 0): ?>
                                        <tr>
                                            <td colspan="6" class="p-0">
                                                <div class="collapse" id="roles<?php echo e($employee->id); ?>">
                                                    <div class="card card-body m-2 bg-light">
                                                        <small class="text-muted mb-2"><?php echo e(__('messages.Assigned Roles')); ?>:</small>
                                                        <?php $__currentLoopData = $employee->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <span class="badge badge-primary mr-1 mb-1"><?php echo e($role->name); ?></span>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.js"></script>
    
    <script>
        function confirmDelete(employeeId, employeeName) {
            Swal.fire({
                title: '<?php echo e(__("messages.Are you sure?")); ?>',
                text: '<?php echo e(__("messages.You want to delete the employee")); ?> "' + employeeName + '"',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: '<?php echo e(__("messages.Yes, delete it!")); ?>',
                cancelButtonText: '<?php echo e(__("messages.Cancel")); ?>'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Make AJAX request
                    $.ajax({
                        url: '<?php echo e(route("admin.employee.destroy", ":id")); ?>'.replace(':id', employeeId),
                        method: 'DELETE',
                        data: {
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: '<?php echo e(__("messages.Deleted!")); ?>',
                                text: '<?php echo e(__("messages.Employee has been deleted successfully")); ?>',
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: '<?php echo e(__("messages.Error!")); ?>',
                                text: '<?php echo e(__("messages.Something went wrong")); ?>'
                            });
                        }
                    });
                }
            });
        }

        function myFunction() {
            Swal.fire({
                icon: 'info',
                title: '<?php echo e(__("messages.Demo Mode")); ?>',
                text: '<?php echo e(__("messages.This action is disabled in demo environment")); ?>'
            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u215380673/domains/glovana.net/public_html/grafco/resources/views/admin/employee/index.blade.php ENDPATH**/ ?>