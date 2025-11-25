@extends('layouts.admin')

@section('content')
<div class="container">
    <h3 class="mb-4">{{ __('messages.create_consumable') }}</h3>

    <form action="{{ route('consumables.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.name_en') }}</label>
                    <input type="text" name="name_en" class="form-control @error('name_en') is-invalid @enderror" value="{{ old('name_en') }}">
                    @error('name_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.name_ar') }}</label>
                    <input type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror" value="{{ old('name_ar') }}">
                    @error('name_ar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.description_en') }}</label>
                    <textarea name="description_en" class="form-control rich-text @error('description_en') is-invalid @enderror" rows="5">{{ old('description_en') }}</textarea>
                    @error('description_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.description_ar') }}</label>
                    <textarea name="description_ar" class="form-control rich-text @error('description_ar') is-invalid @enderror" rows="5">{{ old('description_ar') }}</textarea>
                    @error('description_ar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.type') }}</label>
                    <select name="type" class="form-control @error('type') is-invalid @enderror">
                        <option value="">{{ __('messages.select_type') }}</option>
                        <option value="offset" {{ old('type') == 'offset' ? 'selected' : '' }}>{{ __('messages.offset') }}</option>
                        <option value="digital" {{ old('type') == 'digital' ? 'selected' : '' }}>{{ __('messages.digital') }}</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.order') }}</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.key_features_en') }}</label>
                    <div id="features-en-container">
                        <div class="input-group mb-2">
                            <input type="text" name="key_features_en[]" class="form-control" placeholder="{{ __('messages.feature') }}">
                            <button type="button" class="btn btn-success" onclick="addFeature('en')">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.key_features_ar') }}</label>
                    <div id="features-ar-container">
                        <div class="input-group mb-2">
                            <input type="text" name="key_features_ar[]" class="form-control" placeholder="{{ __('messages.feature') }}">
                            <button type="button" class="btn btn-success" onclick="addFeature('ar')">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.photo') }}</label>
                    <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                    @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
        <a href="{{ route('consumables.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
    </form>
</div>

<script>
function addFeature(lang) {
    const container = document.getElementById('features-' + lang + '-container');
    const div = document.createElement('div');
    div.className = 'input-group mb-2';
    div.innerHTML = `
        <input type="text" name="key_features_${lang}[]" class="form-control" placeholder="{{ __('messages.feature') }}">
        <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">-</button>
    `;
    container.appendChild(div);
}
</script>
@endsection