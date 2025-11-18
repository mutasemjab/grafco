<?php $__env->startSection('content'); ?>
<div class="container">
    <h3 class="mb-4"><?php echo e(__('messages.edit_section')); ?></h3>

    <form action="<?php echo e(route('service-page-sections.update', $item->id)); ?>" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label><?php echo e(__('messages.service_page')); ?></label>
            <select name="service_page_id" class="form-control <?php $__errorArgs = ['service_page_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                <option value=""><?php echo e(__('messages.select_service_page')); ?></option>
                <?php $__currentLoopData = $servicePages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($page->id); ?>" <?php echo e(old('service_page_id', $item->service_page_id) == $page->id ? 'selected' : ''); ?>>
                        <?php echo e($page->name_en); ?> (<?php echo e($page->slug); ?>)
                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['service_page_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo e(__('messages.title_en')); ?></label>
                    <input type="text" name="title_en" class="form-control <?php $__errorArgs = ['title_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title_en', $item->title_en)); ?>" required>
                    <?php $__errorArgs = ['title_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo e(__('messages.title_ar')); ?></label>
                    <input type="text" name="title_ar" class="form-control <?php $__errorArgs = ['title_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title_ar', $item->title_ar)); ?>" required>
                    <?php $__errorArgs = ['title_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo e(__('messages.description_en')); ?></label>
                    <textarea name="description_en" class="form-control <?php $__errorArgs = ['description_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="4" required><?php echo e(old('description_en', $item->description_en)); ?></textarea>
                    <?php $__errorArgs = ['description_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo e(__('messages.description_ar')); ?></label>
                    <textarea name="description_ar" class="form-control <?php $__errorArgs = ['description_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="4" required><?php echo e(old('description_ar', $item->description_ar)); ?></textarea>
                    <?php $__errorArgs = ['description_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo e(__('messages.features_en')); ?></label>
                    <div id="features-en-container">
                        <?php if($item->features_en): ?>
                            <?php $__currentLoopData = $item->features_en; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="input-group mb-2">
                                <input type="text" name="features_en[]" class="form-control" value="<?php echo e($feature); ?>">
                                <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">-</button>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <div class="input-group mb-2">
                            <input type="text" name="features_en[]" class="form-control" placeholder="<?php echo e(__('messages.feature')); ?>">
                            <button type="button" class="btn btn-success" onclick="addFeature('en')">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo e(__('messages.features_ar')); ?></label>
                    <div id="features-ar-container">
                        <?php if($item->features_ar): ?>
                            <?php $__currentLoopData = $item->features_ar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="input-group mb-2">
                                <input type="text" name="features_ar[]" class="form-control" value="<?php echo e($feature); ?>">
                                <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">-</button>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <div class="input-group mb-2">
                            <input type="text" name="features_ar[]" class="form-control" placeholder="<?php echo e(__('messages.feature')); ?>">
                            <button type="button" class="btn btn-success" onclick="addFeature('ar')">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo e(__('messages.photo')); ?></label><br>
                    <img src="<?php echo e(asset('assets/admin/uploads/'.$item->photo)); ?>" width="100" class="mb-2"><br>
                    <input type="file" name="photo" class="form-control <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label><?php echo e(__('messages.order')); ?></label>
                    <input type="number" name="order" class="form-control" value="<?php echo e(old('order', $item->order)); ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label><?php echo e(__('messages.image_position')); ?></label>
                    <div class="form-check mt-2">
                        <input type="checkbox" name="image_right" class="form-check-input" id="image_right" <?php echo e(old('image_right', $item->image_right) ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="image_right">
                            <?php echo e(__('messages.image_on_right')); ?>

                        </label>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary"><?php echo e(__('messages.save')); ?></button>
        <a href="<?php echo e(route('service-page-sections.index')); ?>" class="btn btn-secondary"><?php echo e(__('messages.cancel')); ?></a>
    </form>
</div>

<script>
function addFeature(lang) {
    const container = document.getElementById('features-' + lang + '-container');
    const div = document.createElement('div');
    div.className = 'input-group mb-2';
    div.innerHTML = `
        <input type="text" name="features_${lang}[]" class="form-control" placeholder="<?php echo e(__('messages.feature')); ?>">
        <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">-</button>
    `;
    container.appendChild(div);
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u215380673/domains/glovana.net/public_html/grafco/resources/views/admin/service-page-sections/edit.blade.php ENDPATH**/ ?>