<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3"><?php echo e(__('messages.add_product')); ?></h1>
        <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> <?php echo e(__('messages.back')); ?>

        </a>
    </div>

    <form action="<?php echo e(route('admin.products.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <!-- Basic Information -->
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0"><?php echo e(__('messages.basic_information')); ?></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name_en" class="form-label"><?php echo e(__('messages.name_en')); ?> *</label>
                            <input type="text" 
                                   class="form-control <?php $__errorArgs = ['name_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="name_en" 
                                   name="name_en" 
                                   value="<?php echo e(old('name_en')); ?>" 
                                   required>
                            <?php $__errorArgs = ['name_en'];
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
                        <div class="mb-3">
                            <label for="name_ar" class="form-label"><?php echo e(__('messages.name_ar')); ?> *</label>
                            <input type="text" 
                                   class="form-control <?php $__errorArgs = ['name_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="name_ar" 
                                   name="name_ar" 
                                   value="<?php echo e(old('name_ar')); ?>" 
                                   required 
                                   dir="rtl">
                            <?php $__errorArgs = ['name_ar'];
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
                        <div class="mb-3">
                            <label for="subtitle_en" class="form-label"><?php echo e(__('messages.subtitle_en')); ?></label>
                            <input type="text" 
                                   class="form-control <?php $__errorArgs = ['subtitle_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="subtitle_en" 
                                   name="subtitle_en" 
                                   value="<?php echo e(old('subtitle_en')); ?>">
                            <?php $__errorArgs = ['subtitle_en'];
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
                        <div class="mb-3">
                            <label for="subtitle_ar" class="form-label"><?php echo e(__('messages.subtitle_ar')); ?></label>
                            <input type="text" 
                                   class="form-control <?php $__errorArgs = ['subtitle_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="subtitle_ar" 
                                   name="subtitle_ar" 
                                   value="<?php echo e(old('subtitle_ar')); ?>" 
                                   dir="rtl">
                            <?php $__errorArgs = ['subtitle_ar'];
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
                        <div class="mb-3">
                            <label for="description_en" class="form-label"><?php echo e(__('messages.description_en')); ?></label>
                            <textarea class="form-control <?php $__errorArgs = ['description_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                      id="description_en" 
                                      name="description_en" 
                                      rows="4"><?php echo e(old('description_en')); ?></textarea>
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
                        <div class="mb-3">
                            <label for="description_ar" class="form-label"><?php echo e(__('messages.description_ar')); ?></label>
                            <textarea class="form-control <?php $__errorArgs = ['description_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                      id="description_ar" 
                                      name="description_ar" 
                                      rows="4" 
                                      dir="rtl"><?php echo e(old('description_ar')); ?></textarea>
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
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="category_id" class="form-label"><?php echo e(__('messages.category')); ?> *</label>
                            <select class="form-control <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    id="category_id" 
                                    name="category_id" 
                                    required>
                                <option value=""><?php echo e(__('messages.select_category')); ?></option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
                                        <?php echo e($category->parent_id ? '-- ' : ''); ?><?php echo e($category->name_en); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['category_id'];
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
                        <div class="mb-3">
                            <label for="brand_id" class="form-label"><?php echo e(__('messages.brand')); ?> *</label>
                            <select class="form-control <?php $__errorArgs = ['brand_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    id="brand_id" 
                                    name="brand_id" 
                                    required>
                                <option value=""><?php echo e(__('messages.select_brand')); ?></option>
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($brand->id); ?>" <?php echo e(old('brand_id') == $brand->id ? 'selected' : ''); ?>>
                                        <?php echo e($brand->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['brand_id'];
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
                        <div class="mb-3">
                            <label for="model" class="form-label"><?php echo e(__('messages.model')); ?></label>
                            <input type="text" 
                                   class="form-control <?php $__errorArgs = ['model'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="model" 
                                   name="model" 
                                   value="<?php echo e(old('model')); ?>">
                            <?php $__errorArgs = ['model'];
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
                        <div class="mb-3">
                            <label for="slug" class="form-label"><?php echo e(__('messages.slug')); ?></label>
                            <input type="text" 
                                   class="form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="slug" 
                                   name="slug" 
                                   value="<?php echo e(old('slug')); ?>"
                                   placeholder="<?php echo e(__('messages.auto_generated')); ?>">
                            <?php $__errorArgs = ['slug'];
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
            </div>
        </div>

        <!-- Images -->
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0"><?php echo e(__('messages.images')); ?></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="main_image" class="form-label"><?php echo e(__('messages.main_image')); ?> *</label>
                            <input type="file" 
                                   class="form-control <?php $__errorArgs = ['main_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="main_image" 
                                   name="main_image" 
                                   accept="image/*" 
                                   required>
                            <?php $__errorArgs = ['main_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <small class="text-muted"><?php echo e(__('messages.max_file_size')); ?>: 2MB</small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label"><?php echo e(__('messages.thumbnail')); ?></label>
                            <input type="file" 
                                   class="form-control <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="thumbnail" 
                                   name="thumbnail" 
                                   accept="image/*">
                            <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <small class="text-muted"><?php echo e(__('messages.max_file_size')); ?>: 1MB</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pricing -->
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0"><?php echo e(__('messages.pricing')); ?></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="price" class="form-label"><?php echo e(__('messages.price')); ?></label>
                            <input type="number" 
                                   class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="price" 
                                   name="price" 
                                   value="<?php echo e(old('price')); ?>" 
                                   step="0.01" 
                                   min="0">
                            <?php $__errorArgs = ['price'];
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
                        <div class="mb-3">
                            <label class="form-label d-block"><?php echo e(__('messages.show_price')); ?></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="show_price" 
                                       name="show_price" 
                                       value="1" 
                                       <?php echo e(old('show_price') ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="show_price">
                                    <?php echo e(__('messages.display_price_or_poa')); ?>

                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features -->
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><?php echo e(__('messages.features')); ?></h5>
                <button type="button" class="btn btn-sm btn-success" onclick="addFeature()">
                    <i class="fas fa-plus"></i> <?php echo e(__('messages.add_feature')); ?>

                </button>
            </div>
            <div class="card-body">
                <div id="features-container"></div>
            </div>
        </div>

        <!-- Specifications -->
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><?php echo e(__('messages.specifications')); ?></h5>
                <button type="button" class="btn btn-sm btn-success" onclick="addSpecification()">
                    <i class="fas fa-plus"></i> <?php echo e(__('messages.add_specification')); ?>

                </button>
            </div>
            <div class="card-body">
                <div id="specifications-container"></div>
            </div>
        </div>

        <!-- Downloads -->
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><?php echo e(__('messages.downloads')); ?></h5>
                <button type="button" class="btn btn-sm btn-success" onclick="addDownload()">
                    <i class="fas fa-plus"></i> <?php echo e(__('messages.add_download')); ?>

                </button>
            </div>
            <div class="card-body">
                <div id="downloads-container"></div>
            </div>
        </div>

        <!-- Settings -->
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0"><?php echo e(__('messages.settings')); ?></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="sort_order" class="form-label"><?php echo e(__('messages.sort_order')); ?></label>
                            <input type="number" 
                                   class="form-control" 
                                   id="sort_order" 
                                   name="sort_order" 
                                   value="<?php echo e(old('sort_order', 0)); ?>" 
                                   min="0">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-block"><?php echo e(__('messages.featured')); ?></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="is_featured" 
                                       name="is_featured" 
                                       value="1" 
                                       <?php echo e(old('is_featured') ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="is_featured">
                                    <?php echo e(__('messages.mark_as_featured')); ?>

                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-block"><?php echo e(__('messages.status')); ?></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="is_active" 
                                       name="is_active" 
                                       value="1" 
                                       <?php echo e(old('is_active', true) ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="is_active">
                                    <?php echo e(__('messages.active')); ?>

                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex gap-2 mb-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> <?php echo e(__('messages.save')); ?>

            </button>
            <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-secondary">
                <?php echo e(__('messages.cancel')); ?>

            </a>
        </div>
    </form>
</div>

<script>
let featureIndex = 0;
let specificationIndex = 0;
let downloadIndex = 0;

// Auto-generate slug
document.getElementById('name_en').addEventListener('input', function() {
    const slug = this.value.toLowerCase()
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-+|-+$/g, '');
    document.getElementById('slug').value = slug;
});

function addFeature() {
    const container = document.getElementById('features-container');
    const html = `
        <div class="feature-item border rounded p-3 mb-3">
            <div class="row align-items-end">
                <div class="col-md-5">
                    <label class="form-label"><?php echo e(__('messages.feature_en')); ?></label>
                    <input type="text" class="form-control" name="features[${featureIndex}][feature_en]">
                </div>
                <div class="col-md-5">
                    <label class="form-label"><?php echo e(__('messages.feature_ar')); ?></label>
                    <input type="text" class="form-control" name="features[${featureIndex}][feature_ar]" dir="rtl">
                </div>
                <div class="col-md-1">
                    <label class="form-label"><?php echo e(__('messages.order')); ?></label>
                    <input type="number" class="form-control" name="features[${featureIndex}][sort_order]" value="${featureIndex}">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger w-100" onclick="this.closest('.feature-item').remove()">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
    featureIndex++;
}

function addSpecification() {
    const container = document.getElementById('specifications-container');
    const html = `
        <div class="specification-item border rounded p-3 mb-3">
            <div class="row align-items-end">
                <div class="col-md-2">
                    <label class="form-label"><?php echo e(__('messages.label_en')); ?></label>
                    <input type="text" class="form-control" name="specifications[${specificationIndex}][label_en]">
                </div>
                <div class="col-md-2">
                    <label class="form-label"><?php echo e(__('messages.label_ar')); ?></label>
                    <input type="text" class="form-control" name="specifications[${specificationIndex}][label_ar]" dir="rtl">
                </div>
                <div class="col-md-3">
                    <label class="form-label"><?php echo e(__('messages.value_en')); ?></label>
                    <input type="text" class="form-control" name="specifications[${specificationIndex}][value_en]">
                </div>
                <div class="col-md-3">
                    <label class="form-label"><?php echo e(__('messages.value_ar')); ?></label>
                    <input type="text" class="form-control" name="specifications[${specificationIndex}][value_ar]" dir="rtl">
                </div>
                <div class="col-md-1">
                    <label class="form-label"><?php echo e(__('messages.order')); ?></label>
                    <input type="number" class="form-control" name="specifications[${specificationIndex}][sort_order]" value="${specificationIndex}">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger w-100" onclick="this.closest('.specification-item').remove()">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
    specificationIndex++;
}

function addDownload() {
    const container = document.getElementById('downloads-container');
    const html = `
        <div class="download-item border rounded p-3 mb-3">
            <div class="row align-items-end">
                <div class="col-md-3">
                    <label class="form-label"><?php echo e(__('messages.title_en')); ?></label>
                    <input type="text" class="form-control" name="downloads[${downloadIndex}][title_en]">
                </div>
                <div class="col-md-3">
                    <label class="form-label"><?php echo e(__('messages.title_ar')); ?></label>
                    <input type="text" class="form-control" name="downloads[${downloadIndex}][title_ar]" dir="rtl">
                </div>
                <div class="col-md-3">
                    <label class="form-label"><?php echo e(__('messages.file')); ?></label>
                    <input type="file" class="form-control" name="downloads[${downloadIndex}][file]" accept=".pdf,.doc,.docx,.xls,.xlsx">
                </div>
                <div class="col-md-2">
                    <label class="form-label"><?php echo e(__('messages.date')); ?></label>
                    <input type="date" class="form-control" name="downloads[${downloadIndex}][updated_date]">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger w-100" onclick="this.closest('.download-item').remove()">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
    downloadIndex++;
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/admin/products/create.blade.php ENDPATH**/ ?>