@extends('layouts.admin')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">{{ __('messages.add_new') }}</div>
    <div class="card-body">

        <form action="{{ route('consumable_products.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.name_en') }}</label>
                        <input class="form-control @error('name_en') is-invalid @enderror" type="text" name="name_en" value="{{ old('name_en') }}">
                        @error('name_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.name_ar') }}</label>
                        <input class="form-control @error('name_ar') is-invalid @enderror" type="text" name="name_ar" value="{{ old('name_ar') }}">
                        @error('name_ar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.description_en') }}</label>
                        <textarea class="form-control @error('description_en') is-invalid @enderror" name="description_en" rows="4">{{ old('description_en') }}</textarea>
                        @error('description_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.description_ar') }}</label>
                        <textarea class="form-control @error('description_ar') is-invalid @enderror" name="description_ar" rows="4">{{ old('description_ar') }}</textarea>
                        @error('description_ar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.key_features_en') }}</label>
                        <div id="key_features_en_container">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="key_features_en[]" placeholder="{{ __('messages.feature') }}">
                                <button type="button" class="btn btn-success" onclick="addFeature('en')">+</button>
                            </div>
                        </div>
                        @error('key_features_en')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.key_features_ar') }}</label>
                        <div id="key_features_ar_container">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="key_features_ar[]" placeholder="{{ __('messages.feature') }}">
                                <button type="button" class="btn btn-success" onclick="addFeature('ar')">+</button>
                            </div>
                        </div>
                        @error('key_features_ar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.consumable') }}</label>
                <select class="form-control @error('consumable_id') is-invalid @enderror" name="consumable_id">
                    <option value="">{{ __('messages.select_consumable') }}</option>
                    @foreach($consumables as $c)
                    <option value="{{ $c->id }}" {{ old('consumable_id') == $c->id ? 'selected' : '' }}>
                        {{ $c->name_en }} - {{ $c->name_ar }}
                    </option>
                    @endforeach
                </select>
                @error('consumable_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.photo') }}</label>
                <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo">
                @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">{{ __('messages.is_active') }}</label>
                </div>
            </div>

            <!-- Downloads Section -->
            <div class="card mb-3">
                <div class="card-header bg-light">
                    <h5 class="mb-0">{{ __('messages.downloads') }}</h5>
                </div>
                <div class="card-body">
                    <div id="downloads-container">
                        <!-- Downloads will be added here -->
                    </div>
                    <button type="button" class="btn btn-sm btn-primary" onclick="addDownload()">
                        <i class="fas fa-plus"></i> {{ __('messages.add_download') }}
                    </button>
                </div>
            </div>

            <button class="btn btn-success">{{ __('messages.save') }}</button>
            <a href="{{ route('consumable_products.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
        </form>

    </div>
</div>

<script>
let downloadIndex = 0;

function addFeature(lang) {
    const container = document.getElementById(`key_features_${lang}_container`);
    const div = document.createElement('div');
    div.className = 'input-group mb-2';
    div.innerHTML = `
        <input type="text" class="form-control" name="key_features_${lang}[]" placeholder="{{ __('messages.feature') }}">
        <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">-</button>
    `;
    container.appendChild(div);
}

function addDownload() {
    const container = document.getElementById('downloads-container');
    const downloadDiv = document.createElement('div');
    downloadDiv.className = 'download-item border rounded p-3 mb-3';
    downloadDiv.innerHTML = `
        <div class="row">
            <div class="col-md-5">
                <div class="mb-2">
                    <label class="form-label">{{ __('messages.title_en') }}</label>
                    <input type="text" class="form-control" name="downloads[${downloadIndex}][title_en]" placeholder="{{ __('messages.title_en') }}">
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-2">
                    <label class="form-label">{{ __('messages.title_ar') }}</label>
                    <input type="text" class="form-control" name="downloads[${downloadIndex}][title_ar]" placeholder="{{ __('messages.title_ar') }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-2">
                    <label class="form-label">{{ __('messages.sort_order') }}</label>
                    <input type="number" class="form-control" name="downloads[${downloadIndex}][sort_order]" value="${downloadIndex}" min="0">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-2">
                    <label class="form-label">{{ __('messages.file') }}</label>
                    <input type="file" class="form-control" name="downloads[${downloadIndex}][file]" accept=".pdf,.doc,.docx,.xls,.xlsx">
                    <small class="text-muted">{{ __('messages.max_file_size_10mb') }}</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-2">
                    <label class="form-label">{{ __('messages.updated_at') }}</label>
                    <input type="date" class="form-control" name="downloads[${downloadIndex}][updated_date]" value="{{ date('Y-m-d') }}">
                </div>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm mb-2" onclick="this.closest('.download-item').remove()">
                    <i class="fas fa-trash"></i> {{ __('messages.Delete') }}
                </button>
            </div>
        </div>
    `;
    container.appendChild(downloadDiv);
    downloadIndex++;
}
</script>

<style>
.download-item {
    background-color: #f8f9fa;
    position: relative;
}
</style>
@endsection