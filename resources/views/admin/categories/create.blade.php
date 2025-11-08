@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">{{ __('messages.add_category') }}</h1>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> {{ __('messages.back') }}
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name_en" class="form-label">{{ __('messages.name_en') }} <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('name_en') is-invalid @enderror" 
                                   id="name_en" 
                                   name="name_en" 
                                   value="{{ old('name_en') }}" 
                                   required>
                            @error('name_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name_ar" class="form-label">{{ __('messages.name_ar') }} <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('name_ar') is-invalid @enderror" 
                                   id="name_ar" 
                                   name="name_ar" 
                                   value="{{ old('name_ar') }}" 
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
                            <label for="slug" class="form-label">{{ __('messages.slug') }}</label>
                            <input type="text" 
                                   class="form-control @error('slug') is-invalid @enderror" 
                                   id="slug" 
                                   name="slug" 
                                   value="{{ old('slug') }}"
                                   placeholder="{{ __('messages.auto_generated') }}">
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">{{ __('messages.leave_empty_auto_generate') }}</small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="parent_id" class="form-label">{{ __('messages.parent_category') }}</label>
                            <select class="form-control @error('parent_id') is-invalid @enderror" 
                                    id="parent_id" 
                                    name="parent_id">
                                <option value="">{{ __('messages.none_main_category') }}</option>
                                @foreach($parentCategories as $parent)
                                    <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                                        {{ $parent->name_en }} / {{ $parent->name_ar }}
                                    </option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="sort_order" class="form-label">{{ __('messages.sort_order') }}</label>
                            <input type="number" 
                                   class="form-control @error('sort_order') is-invalid @enderror" 
                                   id="sort_order" 
                                   name="sort_order" 
                                   value="{{ old('sort_order', 0) }}" 
                                   min="0">
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('messages.status') }}</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="is_active" 
                                       name="is_active" 
                                       value="1" 
                                       {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    {{ __('messages.active') }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.associated_brands') }}</label>
                    <div class="row">
                        @forelse($brands as $brand)
                        <div class="col-md-3 col-sm-6 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       name="brands[]" 
                                       value="{{ $brand->id }}" 
                                       id="brand_{{ $brand->id }}"
                                       {{ in_array($brand->id, old('brands', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="brand_{{ $brand->id }}">
                                    {{ $brand->name }}
                                </label>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <p class="text-muted">{{ __('messages.no_brands_available') }}</p>
                        </div>
                        @endforelse
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> {{ __('messages.save') }}
                    </button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                        {{ __('messages.cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('name_en').addEventListener('input', function() {
    const slug = this.value.toLowerCase()
        .trim()
        .replace(/[^a-z0-9\s-]/g, '')
        .replace(/[\s]+/g, '-')
        .replace(/^-+|-+$/g, '');
    document.getElementById('slug').value = slug;
});
</script>
@endpush
@endsection