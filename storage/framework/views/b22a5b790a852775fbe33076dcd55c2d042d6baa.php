<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?php echo e(asset('assets/admin/dist/img/AdminLTELogo.png')); ?>" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Grafco</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo e(asset('assets/admin/dist/img/user2-160x160.jpg')); ?>" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo e(auth()->user()->name); ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->


                 
                <li class="nav-header"><?php echo e(__('messages.content_management')); ?></li>

                <?php if($user->can('banner-table') || $user->can('banner-add') || $user->can('banner-edit') || $user->can('banner-delete')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('banners.index')); ?>" class="nav-link">
                            <i class="fas fa-images nav-icon"></i>
                            <p> <?php echo e(__('messages.Banners')); ?> </p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if($user->can('about-index') || $user->can('about-create') || $user->can('about-edit') || $user->can('about-delete')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('abouts.index')); ?>" class="nav-link">
                            <i class="fas fa-info-circle nav-icon"></i>
                            <p> <?php echo e(__('messages.About')); ?> </p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if($user->can('service-index') || $user->can('service-create') || $user->can('service-edit') || $user->can('service-delete')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('services.index')); ?>" class="nav-link">
                            <i class="fas fa-cogs nav-icon"></i>
                            <p> <?php echo e(__('messages.Services')); ?> </p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if($user->can('brand-index') || $user->can('brand-create') || $user->can('brand-edit') || $user->can('brand-delete')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('brands.index')); ?>" class="nav-link">
                            <i class="fas fa-tags nav-icon"></i>
                            <p> <?php echo e(__('messages.Brands')); ?> </p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($user->can('category-index') || $user->can('category-create') || $user->can('category-edit') || $user->can('category-delete')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.categories.index')); ?>" class="nav-link">
                            <i class="fas fa-tags nav-icon"></i>
                            <p> <?php echo e(__('messages.categories')); ?> </p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($user->can('product-index') || $user->can('product-create') || $user->can('product-edit') || $user->can('product-delete')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.products.index')); ?>" class="nav-link">
                            <i class="fas fa-tags nav-icon"></i>
                            <p> <?php echo e(__('messages.products')); ?> </p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if($user->can('bottomSectionHome-index') || $user->can('bottomSectionHome-create') || $user->can('bottomSectionHome-edit') || $user->can('bottomSectionHome-delete')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('bottomSectionHomes.index')); ?>" class="nav-link">
                            <i class="fas fa-th-large nav-icon"></i>
                            <p> <?php echo e(__('messages.Bottom_Section_Home')); ?> </p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if($user->can('ourService-index') || $user->can('ourService-create') || $user->can('ourService-edit') || $user->can('ourService-delete')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('service-pages.index')); ?>" class="nav-link">
                            <i class="fas fa-concierge-bell nav-icon"></i>
                            <p> <?php echo e(__('messages.service_pages')); ?> </p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($user->can('ourService-index') || $user->can('ourService-create') || $user->can('ourService-edit') || $user->can('ourService-delete')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('service-page-sections.index')); ?>" class="nav-link">
                            <i class="fas fa-concierge-bell nav-icon"></i>
                            <p> <?php echo e(__('messages.service_page_section')); ?> </p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if($user->can('consumable-index') || $user->can('consumable-create') || $user->can('consumable-edit') || $user->can('consumable-delete')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('consumables.index')); ?>" class="nav-link">
                            <i class="fas fa-box-open nav-icon"></i>
                            <p> <?php echo e(__('messages.Consumables')); ?> </p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if($user->can('consumableProduct-index') || $user->can('consumableProduct-create') || $user->can('consumableProduct-edit') || $user->can('consumableProduct-delete')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('consumable_products.index')); ?>" class="nav-link">
                            <i class="fas fa-boxes nav-icon"></i>
                            <p> <?php echo e(__('messages.Consumable_Products')); ?> </p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if($user->can('news-index') || $user->can('news-create') || $user->can('news-edit') || $user->can('news-delete')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('news.index')); ?>" class="nav-link">
                            <i class="fas fa-newspaper nav-icon"></i>
                            <p> <?php echo e(__('messages.News')); ?> </p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if($user->can('career-index') || $user->can('career-create') || $user->can('career-edit') || $user->can('career-delete')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('careers.index')); ?>" class="nav-link">
                            <i class="fas fa-briefcase nav-icon"></i>
                            <p> <?php echo e(__('messages.Careers')); ?> </p>
                        </a>
                    </li>
                <?php endif; ?>



                <li class="nav-item">
                    <a href="<?php echo e(route('pages.index')); ?>" class="nav-link">
                        <i class="fas fa-bullhorn nav-icon"></i>
                        <p> <?php echo e(__('messages.pages_management')); ?> </p>
                    </a>
                </li>


                
                <li class="nav-header"><?php echo e(__('messages.system_configuration')); ?></li>

                <li class="nav-item">
                    <a href="<?php echo e(route('settings.index')); ?>" class="nav-link">
                        <i class="fas fa-cog nav-icon"></i>
                        <p><?php echo e(__('messages.Settings')); ?> </p>
                    </a>
                </li>



                
                <li class="nav-header"><?php echo e(__('messages.user_management')); ?></li>

                <li class="nav-item">
                    <a href="<?php echo e(route('admin.login.edit', auth()->user()->id)); ?>" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                        <p><?php echo e(__('messages.Admin_account')); ?> </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.role.index')); ?>" class="nav-link">
                        <i class="fas fa-shield-alt nav-icon"></i>
                        <p><?php echo e(__('messages.roles')); ?> </p>
                    </a>
                </li>


                <?php if(
                    $user->can('employee-table') ||
                        $user->can('employee-add') ||
                        $user->can('employee-edit') ||
                        $user->can('employee-delete')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.employee.index')); ?>"
                            class="nav-link <?php echo e(request()->routeIs('admin.employee.*') ? 'active' : ''); ?>">
                            <i class="far fa-id-badge nav-icon"></i>
                            <p><?php echo e(__('messages.Employee')); ?></p>
                        </a>
                    </li>
                <?php endif; ?>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH C:\xampp\htdocs\grafco\resources\views/admin/includes/sidebar.blade.php ENDPATH**/ ?>