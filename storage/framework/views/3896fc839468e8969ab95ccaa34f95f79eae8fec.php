<?php $__env->startSection('title', $product->name . ' | graphco'); ?>

<?php $__env->startSection('content'); ?>
<section class="page-hero about-banner" style="background-image:url('<?php echo e(asset('assets_front/img/about-banner.jpg')); ?>')">
    <div class="about-banner__overlay"></div>
    <div class="container about-banner__inner">
        <h1 class="about-banner__title">Graphic Supplies Co.</h1>
    </div>
</section>

<section class="pdetail-shell">
    <div class="container pdetail-shell__inner">
        <aside class="prod-sidebar">
            <div class="prod-side-top">
                <div class="prod-side-main">
                    <span class="prod-side-caret">
                        <svg width="14" height="14" viewBox="0 0 24 24">
                            <path d="M7 10l5 5 5-5" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="prod-side-label"><?php echo e($product->mainCategory->name); ?></span>
                </div>
            </div>

            <div class="prod-partner">
                <div class="prod-partner-main">
                    <img src="<?php echo e(asset('assets/admin/uploads/' . $product->brand->photo)); ?>" alt="<?php echo e($product->brand->name); ?>">
                </div>
            </div>

            <div class="prod-nav">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button class="prod-nav-item <?php echo e($product->category->id == $category->id ? 'is-active' : ''); ?>" 
                        onclick="window.location.href='<?php echo e(route('products.category', $category->slug)); ?>'">
                    <span class="prod-nav-arrow">
                        <svg width="10" height="10" viewBox="0 0 24 24">
                            <path d="M9 6l6 6-6 6" fill="none" stroke="<?php echo e($product->category->id == $category->id ? '#fff' : '#665D99'); ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span><?php echo e($category->name); ?></span>
                </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </aside>

        <div class="pdetail-main">
            <div class="pdetail-headbar">
                <div class="prod-breadcrumb">
                    <span><?php echo e(__('front.home')); ?></span>
                    <span class="prod-sep">›</span>
                    <span><?php echo e(__('front.products')); ?></span>
                    <span class="prod-sep">›</span>
                    <span><?php echo e($product->mainCategory->name); ?></span>
                    <?php if($product->subcategory): ?>
                    <span class="prod-sep">›</span>
                    <span><?php echo e($product->subcategory->name); ?></span>
                    <?php endif; ?>
                    <span class="prod-sep">›</span>
                    <span><?php echo e($product->brand->name); ?></span>
                    <span class="prod-sep">›</span>
                    <span class="prod-current"><?php echo e($product->name); ?></span>
                </div>
            </div>

            <div class="pdetail-top">
                <div class="pdetail-top-img">
                    <img src="<?php echo e(asset('assets/admin/uploads/' . $product->main_image)); ?>" alt="<?php echo e($product->name); ?>">
                </div>
                <div class="pdetail-top-info">
                    <div class="pdetail-brand"><?php echo e($product->brand->name); ?></div>
                    <h1 class="pdetail-title"><?php echo e($product->name); ?></h1>
                    <div class="pdetail-subtitle"><?php echo e($product->subtitle); ?></div>

                    <?php if($product->features->count() > 0): ?>
                    <div class="pdetail-small-title"><?php echo e(__('front.key_features')); ?></div>
                    <ul class="pdetail-features">
                        <?php $__currentLoopData = $product->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($feature->feature); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php endif; ?>

                    <div class="pdetail-price-card">
                        <div class="pdetail-price-label"><?php echo e(__('front.price')); ?></div>
                        <div class="pdetail-price-value"><?php echo e($product->price_display); ?></div>
                        <p class="pdetail-price-text"><?php echo e(__('front.contact_for_quote')); ?></p>
                    </div>

                    <div class="pdetail-specialist">
                        <div class="pdetail-specialist-title"><?php echo e(__('front.talk_to_specialist')); ?></div>
                        <div class="pdetail-specialist-text"><?php echo e(__('front.experts_available')); ?></div>
                        <div class="pdetail-specialist-contacts">
                            <a href="mailto:info@graphicsupplies.com" class="pdetail-specialist-link">
                                <svg width="14" height="14" viewBox="0 0 24 24">
                                    <path d="M4 6h16v12H4V6Zm8 6L4 6h16l-8 6Z" fill="#fff"/>
                                </svg>
                                <span><?php echo e($setting->email); ?></span>
                            </a>
                            <a href="tel:+08505447514" class="pdetail-specialist-link">
                                <svg width="14" height="14" viewBox="0 0 24 24">
                                    <path d="M6.6 10.8c1.3 2.5 3.3 4.5 5.8 5.8l2-2c.3-.3.8-.4 1.1-.2 1.2.4 2.5.6 3.9.6.5 0 .9.4.9.9v3.4c0 .5-.4.9-.9.9C10.6 21.9 2.1 13.4 2.1 2.9c0-.5.4-.9.9-.9H7c.5 0 .9.4.9.9 0 1.3.2 2.6.6 3.9.1.4 0 .8-.3 1.1l-1.6 1.6Z" fill="#fff"/>
                                </svg>
                                <span><?php echo e($setting->phone); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pdetail-tabs" data-pdetail-tabs>
                <button class="pdetail-tab is-active" data-tab="spec"><?php echo e(__('front.specifications')); ?></button>
                <button class="pdetail-tab" data-tab="features"><?php echo e(__('front.features')); ?></button>
                <button class="pdetail-tab" data-tab="download"><?php echo e(__('front.downloads')); ?></button>
                <button class="pdetail-tab" data-tab="request"><?php echo e(__('front.request_product')); ?></button>
            </div>

            <div class="pdetail-panels">
                <div class="pdetail-panel is-active" data-panel="spec">
                    <?php if($product->specifications->count() > 0): ?>
                    <div class="pdetail-spec-table">
                        <?php $__currentLoopData = $product->specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="pdetail-spec-row">
                            <div class="pdetail-spec-label"><?php echo e($spec->label); ?></div>
                            <div class="pdetail-spec-value"><?php echo e($spec->value); ?></div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php else: ?>
                    <p><?php echo e(__('front.no_specifications')); ?></p>
                    <?php endif; ?>
                </div>

                <div class="pdetail-panel" data-panel="features">
                    <div class="pdetail-features-block">
                        <h2 class="pdetail-block-title"><?php echo e(__('front.detailed_features')); ?></h2>
                        <?php if($product->features->count() > 0): ?>
                        <ul class="pdetail-feature-list">
                            <?php $__currentLoopData = $product->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($feature->feature); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php else: ?>
                        <p><?php echo e(__('front.no_features')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="pdetail-panel" data-panel="download">
                    <?php if($product->downloads->count() > 0): ?>
                    <div class="pdetail-downloads-grid">
                        <?php $__currentLoopData = $product->downloads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $download): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="pdetail-download-card">
                            <div class="pdetail-download-main">
                                <div class="pdetail-download-ico">
                                    <svg width="20" height="20" viewBox="0 0 24 24">
                                        <path d="M12 3v12m0 0 4-4m-4 4-4-4M5 19h14" fill="none" stroke="#01AD5E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="pdetail-download-text">
                                    <div class="pdetail-download-title"><?php echo e($download->title); ?></div>
                                    <div class="pdetail-download-meta">
                                        <?php echo e($download->file_type); ?> · <?php echo e($download->file_size); ?> 
                                        <?php if($download->updated_date): ?>
                                        · <?php echo e(__('front.updated')); ?> <?php echo e($download->formatted_date); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo e(asset('assets/admin/uploads/downloads/' . $download->file_path)); ?>" download class="pdetail-download-btn">
                                <svg width="16" height="16" viewBox="0 0 24 24">
                                    <path d="M12 3v12m0 0 4-4m-4 4-4-4M5 19h14" fill="none" stroke="#665D99" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>

                    <?php if($product->description): ?>
                    <div class="pdetail-download-bottom">
                        <div class="pdetail-download-textblock">
                            <div class="pdetail-block-kicker"><?php echo e(__('front.your_trusted_partner')); ?></div>
                            <h2 class="pdetail-block-title"><?php echo e($product->name); ?></h2>
                            <div class="pdetail-download-paragraph">
                                <?php echo $product->description; ?>

                            </div>
                            <p class="pdetail-download-paragraph">
                                <?php echo e(__('front.visit_for_info')); ?>: <a href="#" class="pdetail-link">www.graphicsuppliesco.com</a>
                            </p>
                        </div>
                        <div class="pdetail-download-image">
                            <img src="<?php echo e(asset('assets/admin/uploads/' . $product->main_image)); ?>" alt="<?php echo e($product->name); ?>">
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="pdetail-panel" data-panel="request">
                    <div class="pdetail-request-head">
                        <h2 class="pdetail-block-title"><?php echo e(__('front.order_contact_24h')); ?></h2>
                    </div>

                    <div class="pdetail-request-form" data-contact>
                        <div class="contact-body">
                            <form class="contact-form" method="POST" action="<?php echo e(route('product.request', $product->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                
                                <div class="contact-row">
                                    <div class="contact-col">
                                        <label class="contact-label"><?php echo e(__('front.first_name')); ?> *</label>
                                        <input class="contact-input" type="text" name="first_name" required>
                                    </div>
                                    <div class="contact-col">
                                        <label class="contact-label"><?php echo e(__('front.last_name')); ?> *</label>
                                        <input class="contact-input" type="text" name="last_name" required>
                                    </div>
                                </div>

                                <div class="contact-row">
                                    <div class="contact-col">
                                        <label class="contact-label"><?php echo e(__('front.email')); ?> *</label>
                                        <input class="contact-input" type="email" name="email" required>
                                    </div>
                                    <div class="contact-col">
                                        <label class="contact-label"><?php echo e(__('front.phone')); ?> *</label>
                                        <input class="contact-input" type="text" name="phone" required>
                                    </div>
                                </div>

                                <div class="contact-row">
                                    <div class="contact-col">
                                        <label class="contact-label"><?php echo e(__('front.company_name')); ?> *</label>
                                        <input class="contact-input" type="text" name="company_name">
                                    </div>
                                    <div class="contact-col">
                                        <label class="contact-label"><?php echo e(__('front.quantity')); ?> *</label>
                                        <input class="contact-input" type="number" name="quantity" value="1" min="1" required>
                                    </div>
                                </div>

                                <div class="contact-row">
                                    <div class="contact-col">
                                        <label class="contact-label"><?php echo e(__('front.country')); ?> *</label>
                                        <select class="contact-input" name="country" required>
                                            <option value=""><?php echo e(__('front.select_country')); ?></option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Palestine">Palestine</option>
                                            <option value="UAE">United Arab Emirates</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Egypt">Egypt</option>
                                        </select>
                                    </div>
                                    <div class="contact-col"></div>
                                </div>

                                <div class="contact-row">
                                    <div class="contact-col full">
                                        <label class="contact-label"><?php echo e(__('front.message')); ?></label>
                                        <textarea class="contact-input contact-textarea" name="message" placeholder="<?php echo e(__('front.leave_message')); ?>"></textarea>
                                    </div>
                                </div>

                                <div class="contact-row contact-row-check">
                                    <label class="contact-check">
                                        <input type="checkbox" name="agree_to_policy" value="1" required>
                                        <span class="contact-check-box"></span>
                                        <span class="contact-check-text">
                                            <?php echo e(__('front.agree_privacy')); ?> *
                                        </span>
                                    </label>
                                </div>

                                <div class="contact-row contact-row-submit">
                                    <button type="submit" class="pdetail-request-submit">
                                        <span><?php echo e(__('front.submit')); ?></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\grafco\resources\views/user/product-details.blade.php ENDPATH**/ ?>