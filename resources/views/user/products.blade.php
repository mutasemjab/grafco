@extends('layouts.app')
@section('title', __('front.title') . ' | graphco')

@section('content')
    <section class="page-hero about-banner" style="background-image:url('{{ asset('assets_front/img/about-banner.jpg') }}')">
        <div class="about-banner__overlay"></div>
        <div class="container about-banner__inner">
            <h1 class="about-banner__title">{{ __('front.Graphic Supplies') }}</h1>
        </div>
    </section>

    <section class="products-shell">
        <div class="container products-shell__inner">
            <aside class="prod-sidebar">
                <div class="prod-side-top">
                    <div class="prod-side-main">
                        <span class="prod-side-caret">
                            <svg width="14" height="14" viewBox="0 0 24 24">
                                <path d="M7 10l5 5 5-5" fill="none" stroke="#fff" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="prod-side-label">
                            @if ($selectedBrand)
                                {{ $selectedBrand->name }}
                            @elseif($selectedSubcategory)
                                {{ $selectedSubcategory->name }}
                            @elseif($selectedCategory)
                                {{ $selectedCategory->name }}
                            @else
                                {{ __('front.all_categories') }}
                            @endif
                        </span>
                    </div>
                </div>

                <div class="prod-nav" data-prod-nav>
                    @foreach ($categories as $category)
                        <div class="prod-nav-group">
                            {{-- Main Category Button --}}
                            <button
                                class="prod-nav-item {{ $selectedCategory && $selectedCategory->id == $category->id ? 'is-active' : '' }}"
                                data-prod-category data-category-id="{{ $category->id }}"
                                data-panel="category-{{ $category->id }}" data-title="{{ $category->name }}" type="button">
                                <span class="prod-nav-arrow">
                                    <svg width="10" height="10" viewBox="0 0 24 24">
                                        <path d="M9 6l6 6-6 6" fill="none" stroke="#9b51e0" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span>{{ $category->name }}</span>
                            </button>

                            {{-- Subcategories under this category --}}
                            @if ($category->children->count() > 0)
                                <div class="prod-subcategories-list" data-subcategories-for="category-{{ $category->id }}"
                                    style="display: {{ $selectedCategory && $selectedCategory->id == $category->id ? 'block' : 'none' }}">

                                    @foreach ($category->children as $subcategory)
                                        <div class="prod-subcategory-group">
                                            {{-- Subcategory Button --}}
                                            <button
                                                class="prod-subcategory-item {{ $selectedSubcategory && $selectedSubcategory->id == $subcategory->id ? 'is-active' : '' }}"
                                                data-prod-subcategory data-subcategory-id="{{ $subcategory->id }}"
                                                data-category-id="{{ $category->id }}"
                                                data-panel="subcategory-{{ $subcategory->id }}"
                                                data-title="{{ $subcategory->name }}" type="button">
                                                <span class="prod-nav-arrow">
                                                    <svg width="8" height="8" viewBox="0 0 24 24">
                                                        <path d="M9 6l6 6-6 6" fill="none" stroke="#9b51e0"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                                <span>{{ $subcategory->name }}</span>
                                            </button>

                                            {{-- Brands under this subcategory --}}
                                            @if ($subcategory->brands->count() > 0)
                                                <div class="prod-brands-list"
                                                    data-brands-for="subcategory-{{ $subcategory->id }}"
                                                    style="display: {{ $selectedSubcategory && $selectedSubcategory->id == $subcategory->id ? 'block' : 'none' }}">
                                                    @foreach ($subcategory->brands as $brand)
                                                        <a href="{{ route('products.index', ['category' => $category->slug, 'subcategory' => $subcategory->slug, 'brand' => $brand->id]) }}"
                                                            class="prod-brand-item {{ $selectedBrand && $selectedBrand->id == $brand->id ? 'is-active' : '' }}">
                                                            <img src="{{ asset('assets/admin/uploads/' . $brand->photo) }}"
                                                                alt="{{ $brand->name }}" title="{{ $brand->name }}">

                                                        </a>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </aside>

            <div class="prod-main">
                <div class="prod-headbar">
                    <div class="prod-breadcrumb">
                        <span>{{ __('front.home') }}</span>
                        <span class="prod-sep">›</span>
                        <span>{{ __('front.products') }}</span>
                        @if ($selectedCategory)
                            <span class="prod-sep">›</span>
                            <span>{{ $selectedCategory->name }}</span>
                        @endif
                        @if ($selectedSubcategory)
                            <span class="prod-sep">›</span>
                            <span>{{ $selectedSubcategory->name }}</span>
                        @endif
                        @if ($selectedBrand)
                            <span class="prod-sep">›</span>
                            <span class="prod-current">{{ $selectedBrand->name }}</span>
                        @endif
                    </div>
                </div>

                <div class="prod-body">
                 

                    <div class="prod-panels">
                        @if ($showAllBrandProducts)
                            {{-- Show all brand products across all categories --}}
                            @foreach ($categories as $category)
                                @if ($category->children->count() > 0)
                                    @foreach ($category->children as $subcategory)
                                        @if ($subcategory->filteredProducts->count() > 0)
                                            <div class="prod-section is-visible">
                                                <div class="prod-grid">
                                                    @foreach ($subcategory->filteredProducts as $product)
                                                        <article class="prod-card">
                                                            <a href="{{ route('product.details', $product->slug) }}">
                                                                <div class="prod-card-img">
                                                                    <img src="{{ asset('assets/admin/uploads/' . $product->thumbnail) }}"
                                                                        alt="{{ $product->name }}">
                                                                </div>
                                                                <div class="prod-card-foot">{{ $product->name }}</div>
                                                            </a>
                                                        </article>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    @if ($category->filteredProducts->count() > 0)
                                        <div class="prod-section is-visible">
                                           
                                            <div class="prod-grid">
                                                @foreach ($category->filteredProducts as $product)
                                                    <article class="prod-card">
                                                        <a href="{{ route('product.details', $product->slug) }}">
                                                            <div class="prod-card-img">
                                                                <img src="{{ asset('assets/admin/uploads/' . $product->thumbnail) }}"
                                                                    alt="{{ $product->name }}">
                                                            </div>
                                                            <div class="prod-card-foot">{{ $product->name }}</div>
                                                        </a>
                                                    </article>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        @else
                            {{-- Original category-based display --}}
                            @foreach ($categories as $category)
                                <div class="prod-panel {{ $selectedCategory && $selectedCategory->id == $category->id ? 'is-active' : '' }}"
                                    data-panel="category-{{ $category->id }}">

                                    @if ($category->children->count() > 0)
                                        @if (!$selectedSubcategory || $selectedSubcategory->parent_id == $category->id)
                                            @foreach ($category->children as $subcategory)
                                                <div class="prod-section {{ $selectedSubcategory && $selectedSubcategory->id == $subcategory->id ? 'is-visible' : ($selectedSubcategory ? 'is-hidden' : '') }}"
                                                    data-subcategory-section="{{ $subcategory->id }}">
                                                  
                                                    <div class="prod-grid">
                                                        @forelse($subcategory->filteredProducts ?? [] as $product)
                                                            <article class="prod-card">
                                                                <a href="{{ route('product.details', $product->slug) }}">
                                                                    <div class="prod-card-img">
                                                                        <img src="{{ asset('assets/admin/uploads/' . $product->thumbnail) }}"
                                                                            alt="{{ $product->name }}">
                                                                    </div>
                                                                    <div class="prod-card-foot">{{ $product->name }}</div>
                                                                </a>
                                                            </article>
                                                        @empty
                                                            <p class="no-products">{{ __('front.no_products_found') }}</p>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    @else
                                        <div class="prod-grid">
                                            @forelse($category->filteredProducts ?? [] as $product)
                                                <article class="prod-card">
                                                    <a href="{{ route('product.details', $product->slug) }}">
                                                        <div class="prod-card-img">
                                                            <img src="{{ asset('assets/admin/uploads/' . $product->thumbnail) }}"
                                                                alt="{{ $product->name }}">
                                                        </div>
                                                        <div class="prod-card-foot">{{ $product->name }}</div>
                                                    </a>
                                                </article>
                                            @empty
                                                <p class="no-products">{{ __('front.no_products_found') }}</p>
                                            @endforelse
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .prod-section.is-hidden {
            display: none;
        }

        .prod-section.is-visible {
            display: block;
        }

        .prod-panel {
            display: none;
        }

        .prod-panel.is-active {
            display: block;
        }

        .prod-subcategories-list {
            padding-left: 15px;
            background-color: rgba(102, 93, 153, 0.02);
        }

        .prod-subcategory-group {
            border-bottom: 1px solid rgba(102, 93, 153, 0.05);
        }

        .prod-subcategory-group:last-child {
            border-bottom: none;
        }

        .prod-subcategory-item {
            width: 100%;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            background: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .prod-subcategory-item:hover {
            background-color: rgba(102, 93, 153, 0.08);
        }

        .prod-subcategory-item.is-active {
            background-color: rgba(102, 93, 153, 0.15);
            font-weight: 600;
        }

        .prod-subcategory-item .prod-nav-arrow {
            display: inline-flex;
            margin-right: 6px;
            transition: transform 0.3s ease;
        }

        .prod-subcategory-item.is-active .prod-nav-arrow {
            transform: rotate(90deg);
        }

        .prod-subcategory-group .prod-brands-list {
            padding-left: 35px;
        }

        .prod-nav-group {
            border-bottom: 1px solid rgba(102, 93, 153, 0.1);
        }

        .prod-nav-item {
            width: 100%;
            display: flex;
            align-items: center;
            padding: 12px 15px;
            background: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .prod-nav-item:hover {
            background-color: rgba(102, 93, 153, 0.05);
        }

        .prod-nav-item.is-active {
            background-color: rgba(102, 93, 153, 0.1);
            font-weight: 600;
        }

        .prod-nav-arrow {
            display: inline-flex;
            margin-right: 8px;
            transition: transform 0.3s ease;
        }

        .prod-nav-item.is-active .prod-nav-arrow {
            transform: rotate(90deg);
        }

        .prod-brands-list {
            padding-left: 25px;
            padding-bottom: 10px;
            background-color: rgba(102, 93, 153, 0.02);
        }

        .prod-brand-item {
            display: flex;
            align-items: center;
            padding: 8px 15px;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .prod-brand-item:hover {
            background-color: rgba(102, 93, 153, 0.05);
            border-left-color: #9b51e0;
        }

        .prod-brand-item.is-active {
            background-color: rgba(0, 0, 0, 0.1);
            border-left-color: #9b51e0;
            font-weight: 600;
        }

        .prod-brand-item img {
            width: 50px;
            height: 30px;
            object-fit: contain;
            margin-right: 10px;
        }

        .prod-brand-item span {
            font-size: 14px;
        }
    </style>
@endsection

@section('script')
    <script>
        (function() {
            'use strict';

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', init);
            } else {
                init();
            }

            function init() {
                const categoryButtons = document.querySelectorAll('[data-prod-category]');
                const subcategoryButtons = document.querySelectorAll('[data-prod-subcategory]');

                categoryButtons.forEach(function(button) {
                    button.addEventListener('click', handleCategoryClick);
                });

                subcategoryButtons.forEach(function(button) {
                    button.addEventListener('click', handleSubcategoryClick);
                });

                // Handle brand clicks
                const brandLinks = document.querySelectorAll('.prod-brand-item');
                brandLinks.forEach(function(link) {
                    link.addEventListener('click', function(e) {
                        sessionStorage.setItem('brandClicked', 'true');
                        const brandsListDiv = this.closest('.prod-brands-list');
                        if (brandsListDiv) {
                            const subcategoryId = brandsListDiv.getAttribute('data-brands-for').replace(
                                'subcategory-', '');
                            sessionStorage.setItem('activeSubcategoryId', subcategoryId);
                        }
                        const categoryButton = this.closest('.prod-nav-group').querySelector(
                            '[data-category-id]');
                        if (categoryButton) {
                            const categoryId = categoryButton.getAttribute('data-category-id');
                            sessionStorage.setItem('activeCategoryId', categoryId);
                        }
                    });
                });

                // Restore state on page load
                restoreNavigationState();
            }

            function handleCategoryClick(event) {
                event.preventDefault();

                const button = this;
                const categoryId = button.getAttribute('data-category-id');
                const subcategoriesSelector = '[data-subcategories-for="category-' + categoryId + '"]';
                const subcategoriesSection = document.querySelector(subcategoriesSelector);

                const isActive = button.classList.contains('is-active');

                // Close all categories and panels
                closeAllCategories();

                // Open clicked category if it wasn't active
                if (!isActive) {
                    button.classList.add('is-active');

                    // Show subcategories if they exist
                    if (subcategoriesSection) {
                        subcategoriesSection.style.display = 'block';
                    }

                    // Show corresponding panel
                    const panel = document.querySelector('[data-panel="category-' + categoryId + '"]');
                    if (panel) {
                        panel.classList.add('is-active');

                        // Show all subcategory sections within this panel
                        const subcategorySections = panel.querySelectorAll('[data-subcategory-section]');
                        subcategorySections.forEach(function(section) {
                            section.classList.remove('is-hidden');
                            section.classList.add('is-visible');
                        });
                    }

                    updateBreadcrumb(button.getAttribute('data-title'));
                    sessionStorage.setItem('activeCategoryId', categoryId);
                } else {
                    // If clicking active category, close everything
                    sessionStorage.removeItem('activeCategoryId');
                    sessionStorage.removeItem('activeSubcategoryId');
                }
            }

            function handleSubcategoryClick(event) {
                event.preventDefault();

                const button = this;
                const subcategoryId = button.getAttribute('data-subcategory-id');
                const categoryId = button.getAttribute('data-category-id');
                const brandsSelector = '[data-brands-for="subcategory-' + subcategoryId + '"]';
                const brandsSection = document.querySelector(brandsSelector);

                const isActive = button.classList.contains('is-active');

                // Close all subcategories and brands within this category
                const parentGroup = button.closest('.prod-subcategories-list');
                if (parentGroup) {
                    parentGroup.querySelectorAll('[data-prod-subcategory]').forEach(function(btn) {
                        btn.classList.remove('is-active');
                    });
                    parentGroup.querySelectorAll('.prod-brands-list').forEach(function(section) {
                        section.style.display = 'none';
                    });
                }

                // Hide all subcategory sections in the panel
                const panel = document.querySelector('[data-panel="category-' + categoryId + '"]');
                if (panel) {
                    const allSubcategorySections = panel.querySelectorAll('[data-subcategory-section]');
                    allSubcategorySections.forEach(function(section) {
                        section.classList.add('is-hidden');
                        section.classList.remove('is-visible');
                    });
                }

                // Open clicked subcategory if it wasn't active
                if (!isActive) {
                    button.classList.add('is-active');

                    // Show brands if they exist
                    if (brandsSection) {
                        brandsSection.style.display = 'block';
                    }

                    // Show only the selected subcategory section
                    const selectedSection = document.querySelector('[data-subcategory-section="' + subcategoryId +
                    '"]');
                    if (selectedSection) {
                        selectedSection.classList.remove('is-hidden');
                        selectedSection.classList.add('is-visible');
                    }

                    updateBreadcrumb(button.getAttribute('data-title'));
                    sessionStorage.setItem('activeSubcategoryId', subcategoryId);
                    sessionStorage.setItem('activeCategoryId', categoryId);
                } else {
                    // If clicking active subcategory, show all subcategories again
                    if (panel) {
                        const allSubcategorySections = panel.querySelectorAll('[data-subcategory-section]');
                        allSubcategorySections.forEach(function(section) {
                            section.classList.remove('is-hidden');
                            section.classList.add('is-visible');
                        });
                    }

                    sessionStorage.removeItem('activeSubcategoryId');

                    // Update breadcrumb to category name
                    const categoryButton = document.querySelector('[data-category-id="' + categoryId + '"]');
                    if (categoryButton) {
                        updateBreadcrumb(categoryButton.getAttribute('data-title'));
                    }
                }
            }

            function closeAllCategories() {
                // Remove all active states from categories
                document.querySelectorAll('[data-prod-category]').forEach(function(btn) {
                    btn.classList.remove('is-active');
                });

                // Hide all subcategories lists
                document.querySelectorAll('.prod-subcategories-list').forEach(function(section) {
                    section.style.display = 'none';
                });

                // Close all subcategories and brands
                closeAllSubcategories();

                // Hide all panels
                document.querySelectorAll('.prod-panel').forEach(function(panel) {
                    panel.classList.remove('is-active');
                });
            }

            function closeAllSubcategories() {
                document.querySelectorAll('[data-prod-subcategory]').forEach(function(btn) {
                    btn.classList.remove('is-active');
                });

                document.querySelectorAll('.prod-brands-list').forEach(function(section) {
                    section.style.display = 'none';
                });
            }

            function restoreNavigationState() {
                const brandClicked = sessionStorage.getItem('brandClicked');
                const activeCategoryId = sessionStorage.getItem('activeCategoryId');
                const activeSubcategoryId = sessionStorage.getItem('activeSubcategoryId');

                if (brandClicked === 'true' && activeCategoryId) {
                    const categoryButton = document.querySelector('[data-category-id="' + activeCategoryId + '"]');
                    const subcategoriesSection = document.querySelector('[data-subcategories-for="category-' +
                        activeCategoryId + '"]');

                    if (categoryButton) {
                        categoryButton.classList.add('is-active');
                    }
                    if (subcategoriesSection) {
                        subcategoriesSection.style.display = 'block';
                    }

                    // Show the category panel
                    const panel = document.querySelector('[data-panel="category-' + activeCategoryId + '"]');
                    if (panel) {
                        panel.classList.add('is-active');
                    }

                    if (activeSubcategoryId) {
                        const subcategoryButton = document.querySelector('[data-subcategory-id="' +
                            activeSubcategoryId + '"]');
                        const brandsSection = document.querySelector('[data-brands-for="subcategory-' +
                            activeSubcategoryId + '"]');

                        if (subcategoryButton) {
                            subcategoryButton.classList.add('is-active');
                        }
                        if (brandsSection) {
                            brandsSection.style.display = 'block';
                        }

                        // Hide all subcategory sections except the active one
                        if (panel) {
                            const allSubcategorySections = panel.querySelectorAll('[data-subcategory-section]');
                            allSubcategorySections.forEach(function(section) {
                                const sectionId = section.getAttribute('data-subcategory-section');
                                if (sectionId === activeSubcategoryId) {
                                    section.classList.remove('is-hidden');
                                    section.classList.add('is-visible');
                                } else {
                                    section.classList.add('is-hidden');
                                    section.classList.remove('is-visible');
                                }
                            });
                        }
                    }

                    sessionStorage.removeItem('brandClicked');
                }
            }

            function updateBreadcrumb(title) {
                const heading = document.querySelector('[data-prod-heading]');
                if (heading) {
                    heading.textContent = title;
                }
            }
        })();
    </script>

@endsection
