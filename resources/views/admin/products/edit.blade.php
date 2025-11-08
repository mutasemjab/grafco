@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">{{ __('messages.edit_product') }}</h1>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> {{ __('messages.back') }}
        </a>
    </div>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Basic Information -->
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">{{ __('messages.basic_information') }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name_en" class="form-label">{{ __('messages.name_en') }} *</label>
                            <input type="text" 
                                   class="form-control @error('name_en') is-invalid @enderror" 
                                   id="name_en" 
                                   name="name_en" 
                                   value="{{ old('name_en', $product->name_en) }}" 
                                   required>
                            @error('name_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name_ar" class="form-label">{{ __('messages.name_ar') }} *</label>
                            <input type="text" 
                                   class="form-control @error('name_ar') is-invalid @enderror" 
                                   id="name_ar" 
                                   name="name_ar" 
                                   value="{{ old('name_ar', $product->name_ar) }}" 
                                   required 
                                   dir="rtl">
                            @error('name_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="subtitle_en" class="form-label">{{ __('messages.subtitle_en') }}</label>
                            <input type="text" 
                                   class="form-control @error('subtitle_en') is-invalid @enderror" 
                                   id="subtitle_en" 
                                   name="subtitle_en" 
                                   value="{{ old('subtitle_en', $product->subtitle_en) }}">
                            @error('subtitle_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="subtitle_ar" class="form-label">{{ __('messages.subtitle_ar') }}</label>
                            <input type="text" 
                                   class="form-control @error('subtitle_ar') is-invalid @enderror" 
                                   id="subtitle_ar" 
                                   name="subtitle_ar" 
                                   value="{{ old('subtitle_ar', $product->subtitle_ar) }}" 
                                   dir="rtl">
                            @error('subtitle_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="description_en" class="form-label">{{ __('messages.description_en') }}</label>
                            <textarea class="form-control @error('description_en') is-invalid @enderror" 
                                      id="description_en" 
                                      name="description_en" 
                                      rows="4">{{ old('description_en', $product->description_en) }}</textarea>
                            @error('description_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="description_ar" class="form-label">{{ __('messages.description_ar') }}</label>
                            <textarea class="form-control @error('description_ar') is-invalid @enderror" 
                                      id="description_ar" 
                                      name="description_ar" 
                                      rows="4" 
                                      dir="rtl">{{ old('description_ar', $product->description_ar) }}</textarea>
                            @error('description_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">{{ __('messages.category') }} *</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" 
                                    id="category_id" 
                                    name="category_id" 
                                    required>
                                <option value="">{{ __('messages.select_category') }}</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->parent_id ? '-- ' : '' }}{{ $category->name_en }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="brand_id" class="form-label">{{ __('messages.brand') }} *</label>
                            <select class="form-control @error('brand_id') is-invalid @enderror" 
                                    id="brand_id" 
                                    name="brand_id" 
                                    required>
                                <option value="">{{ __('messages.select_brand') }}</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" 
                                        {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="model" class="form-label">{{ __('messages.model') }}</label>
                            <input type="text" 
                                   class="form-control @error('model') is-invalid @enderror" 
                                   id="model" 
                                   name="model" 
                                   value="{{ old('model', $product->model) }}">
                            @error('model')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="slug" class="form-label">{{ __('messages.slug') }}</label>
                            <input type="text" 
                                   class="form-control @error('slug') is-invalid @enderror" 
                                   id="slug" 
                                   name="slug" 
                                   value="{{ old('slug', $product->slug) }}">
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Images -->
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">{{ __('messages.images') }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="main_image" class="form-label">{{ __('messages.main_image') }}</label>
                            @if($product->main_image)
                                <div class="mb-2">
                                    <img src="{{ asset('assets/admin/uploads/'.$product->main_image)}}" 
                                         alt="{{ $product->name_en }}" 
                                         class="img-thumbnail" 
                                         style="max-width: 200px;">
                                </div>
                            @endif
                            <input type="file" 
                                   class="form-control @error('main_image') is-invalid @enderror" 
                                   id="main_image" 
                                   name="main_image" 
                                   accept="image/*">
                            @error('main_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">{{ __('messages.leave_empty_keep_current') }}</small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">{{ __('messages.thumbnail') }}</label>
                            @if($product->thumbnail)
                                <div class="mb-2">
                                    <img src="{{ asset('assets/admin/uploads/'.$product->thumbnail) }}" 
                                         alt="{{ $product->name_en }}" 
                                         class="img-thumbnail" 
                                         style="max-width: 150px;">
                                </div>
                            @endif
                            <input type="file" 
                                   class="form-control @error('thumbnail') is-invalid @enderror" 
                                   id="thumbnail" 
                                   name="thumbnail" 
                                   accept="image/*">
                            @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">{{ __('messages.leave_empty_keep_current') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pricing -->
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">{{ __('messages.pricing') }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="price" class="form-label">{{ __('messages.price') }}</label>
                            <input type="number" 
                                   class="form-control @error('price') is-invalid @enderror" 
                                   id="price" 
                                   name="price" 
                                   value="{{ old('price', $product->price) }}" 
                                   step="0.01" 
                                   min="0">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label d-block">{{ __('messages.show_price') }}</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="show_price" 
                                       name="show_price" 
                                       value="1" 
                                       {{ old('show_price', $product->show_price) ? 'checked' : '' }}>
                                <label class="form-check-label" for="show_price">
                                    {{ __('messages.display_price_or_poa') }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings -->
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">{{ __('messages.settings') }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="sort_order" class="form-label">{{ __('messages.sort_order') }}</label>
                            <input type="number" 
                                   class="form-control" 
                                   id="sort_order" 
                                   name="sort_order" 
                                   value="{{ old('sort_order', $product->sort_order) }}" 
                                   min="0">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-block">{{ __('messages.featured') }}</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="is_featured" 
                                       name="is_featured" 
                                       value="1" 
                                       {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">
                                    {{ __('messages.mark_as_featured') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-block">{{ __('messages.status') }}</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="is_active" 
                                       name="is_active" 
                                       value="1" 
                                       {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    {{ __('messages.active') }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> 
            {{ __('messages.manage_features_specs_separately') }}
        </div>

        <div class="d-flex gap-2 mb-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> {{ __('messages.update') }}
            </button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                {{ __('messages.cancel') }}
            </a>
        </div>
    </form>
</div>
@endsection