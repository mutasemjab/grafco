@extends('layouts.admin')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-dark">{{ __('messages.edit') }}</div>
    <div class="card-body">

        <form action="{{ route('consumable_products.update',$item->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.name_en') }}</label>
                        <input class="form-control @error('name_en') is-invalid @enderror" type="text" name="name_en" value="{{ old('name_en', $item->name_en) }}">
                        @error('name_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.name_ar') }}</label>
                        <input class="form-control @error('name_ar') is-invalid @enderror" type="text" name="name_ar" value="{{ old('name_ar', $item->name_ar) }}">
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
                        <textarea class="form-control @error('description_en') is-invalid @enderror" name="description_en" rows="4">{{ old('description_en', $item->description_en) }}</textarea>
                        @error('description_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.description_ar') }}</label>
                        <textarea class="form-control @error('description_ar') is-invalid @enderror" name="description_ar" rows="4">{{ old('description_ar', $item->description_ar) }}</textarea>
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
                            @php
                                $features_en = is_string($item->key_features_en) ? json_decode($item->key_features_en, true) : $item->key_features_en;
                                $features_en = $features_en ?: [''];
                            @endphp
                            @foreach($features_en as $feature)
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="key_features_en[]" value="{{ $feature }}" placeholder="{{ __('messages.feature') }}">
                                <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">-</button>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-success btn-sm" onclick="addFeature('en')">+ {{ __('messages.add_feature') }}</button>
                        @error('key_features_en')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.key_features_ar') }}</label>
                        <div id="key_features_ar_container">
                            @php
                                $features_ar = is_string($item->key_features_ar) ? json_decode($item->key_features_ar, true) : $item->key_features_ar;
                                $features_ar = $features_ar ?: [''];
                            @endphp
                            @foreach($features_ar as $feature)
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="key_features_ar[]" value="{{ $feature }}" placeholder="{{ __('messages.feature') }}">
                                <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">-</button>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-success btn-sm" onclick="addFeature('ar')">+ {{ __('messages.add_feature') }}</button>
                        @error('key_features_ar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.consumable') }}</label>
                <select class="form-control @error('consumable_id') is-invalid @enderror" name="consumable_id">
                    @foreach($consumables as $c)
                    <option value="{{ $c->id }}" @selected($c->id==$item->consumable_id)>
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
                <div class="mt-2">
                    <img src="{{ asset('assets/admin/uploads/'.$item->photo) }}" width="100" class="rounded border">
                </div>
                @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">{{ __('messages.is_active') }}</label>
                </div>
            </div>

            <!-- Downloads Section -->
            <div class="card mb-3">
                <div class="card-header bg-light">
                    <h5 class="mb-0">{{ __('messages.downloads') }}</h5>
                </div>
                <div class="card-body">
                    <input type="hidden" name="deleted_downloads" id="deleted_downloads" value="">
                    
                    <div id="downloads-container">
                        @foreach($item->downloads as $index => $download)
                        <div class="download-item border rounded p-3 mb-3" data-download-id="{{ $download->id }}">
                            <input type="hidden" name="downloads[{{ $index }}][id]" value="{{ $download->id }}">
                            
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-2">
                                        <label class="form-label">{{ __('messages.title_en') }}</label>
                                        <input type="text" class="form-control" name="downloads[{{ $index }}][title_en]" value="{{ old('downloads.'.$index.'.title_en', $download->title_en) }}" placeholder="{{ __('messages.title_en') }}">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-2">
                                        <label class="form-label">{{ __('messages.title_ar') }}</label>
                                        <input type="text" class="form-control" name="downloads[{{ $index }}][title_ar]" value="{{ old('downloads.'.$index.'.title_ar', $download->title_ar) }}" placeholder="{{ __('messages.title_ar') }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">{{ __('messages.sort_order') }}</label>
                                        <input type="number" class="form-control" name="downloads[{{ $index }}][sort_order]" value="{{ old('downloads.'.$index.'.sort_order', $download->sort_order) }}" min="0">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">{{ __('messages.file') }}</label>
                                        <input type="file" class="form-control" name="downloads[{{ $index }}][file]" accept=".pdf,.doc,.docx,.xls,.xlsx">
                                        <small class="text-muted">{{ __('messages.max_file_size_10mb') }}</small>
                                        @if($download->file_path)
                                        <div class="mt-1">
                                            <a href="{{ asset('assets/admin/uploads/downloads/'.$download->file_path) }}" target="_blank" class="text-primary">
                                                <i class="fas fa-file-{{ strtolower($download->file_type) }}"></i> 
                                                {{ __('messages.current_file') }}: {{ $download->file_type }}
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label class="form-label">{{ __('messages.updated_at') }}</label>
                                        <input type="date" class="form-control" name="downloads[{{ $index }}][updated_date]" value="{{ old('downloads.'.$index.'.updated_date', $download->updated_date ? $download->updated_date->format('Y-m-d') : date('Y-m-d')) }}">
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger btn-sm mb-2" onclick="removeDownload(this, {{ $download->id }})">
                                        <i class="fas fa-trash"></i> {{ __('messages.Delete') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <button type="button" class="btn btn-sm btn-primary" onclick="addDownload()">
                        <i class="fas fa-plus"></i> {{ __('messages.add_download') }}
                    </button>
                </div>
            </div>

            <button class="btn btn-success">{{ __('messages.update') }}</button>
            <a href="{{ route('consumable_products.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
        </form>

    </div>
</div>

<script>
let downloadIndex = {{ count($item->downloads) }};
let deletedDownloads = [];

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

function removeDownload(button, downloadId) {
    if (downloadId) {
        // Add to deleted downloads list
        deletedDownloads.push(downloadId);
        document.getElementById('deleted_downloads').value = deletedDownloads.join(',');
    }
    // Remove the download item from DOM
    button.closest('.download-item').remove();
}
</script>

<style>
.download-item {
    background-color: #f8f9fa;
    position: relative;
}
</style>
@endsection