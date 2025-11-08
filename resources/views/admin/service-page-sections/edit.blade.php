@extends('layouts.admin')

@section('content')
<div class="container">
    <h3 class="mb-4">{{ __('messages.edit_section') }}</h3>

    <form action="{{ route('service-page-sections.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf @method('PUT')

        <div class="form-group">
            <label>{{ __('messages.service_page') }}</label>
            <select name="service_page_id" class="form-control @error('service_page_id') is-invalid @enderror" required>
                <option value="">{{ __('messages.select_service_page') }}</option>
                @foreach($servicePages as $page)
                    <option value="{{ $page->id }}" {{ old('service_page_id', $item->service_page_id) == $page->id ? 'selected' : '' }}>
                        {{ $page->name_en }} ({{ $page->slug }})
                    </option>
                @endforeach
            </select>
            @error('service_page_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.title_en') }}</label>
                    <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en', $item->title_en) }}" required>
                    @error('title_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.title_ar') }}</label>
                    <input type="text" name="title_ar" class="form-control @error('title_ar') is-invalid @enderror" value="{{ old('title_ar', $item->title_ar) }}" required>
                    @error('title_ar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.description_en') }}</label>
                    <textarea name="description_en" class="form-control @error('description_en') is-invalid @enderror" rows="4" required>{{ old('description_en', $item->description_en) }}</textarea>
                    @error('description_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.description_ar') }}</label>
                    <textarea name="description_ar" class="form-control @error('description_ar') is-invalid @enderror" rows="4" required>{{ old('description_ar', $item->description_ar) }}</textarea>
                    @error('description_ar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.features_en') }}</label>
                    <div id="features-en-container">
                        @if($item->features_en)
                            @foreach($item->features_en as $feature)
                            <div class="input-group mb-2">
                                <input type="text" name="features_en[]" class="form-control" value="{{ $feature }}">
                                <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">-</button>
                            </div>
                            @endforeach
                        @endif
                        <div class="input-group mb-2">
                            <input type="text" name="features_en[]" class="form-control" placeholder="{{ __('messages.feature') }}">
                            <button type="button" class="btn btn-success" onclick="addFeature('en')">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.features_ar') }}</label>
                    <div id="features-ar-container">
                        @if($item->features_ar)
                            @foreach($item->features_ar as $feature)
                            <div class="input-group mb-2">
                                <input type="text" name="features_ar[]" class="form-control" value="{{ $feature }}">
                                <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">-</button>
                            </div>
                            @endforeach
                        @endif
                        <div class="input-group mb-2">
                            <input type="text" name="features_ar[]" class="form-control" placeholder="{{ __('messages.feature') }}">
                            <button type="button" class="btn btn-success" onclick="addFeature('ar')">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.photo') }}</label><br>
                    <img src="{{ asset('assets/admin/uploads/'.$item->photo) }}" width="100" class="mb-2"><br>
                    <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                    @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>{{ __('messages.order') }}</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $item->order) }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>{{ __('messages.image_position') }}</label>
                    <div class="form-check mt-2">
                        <input type="checkbox" name="image_right" class="form-check-input" id="image_right" {{ old('image_right', $item->image_right) ? 'checked' : '' }}>
                        <label class="form-check-label" for="image_right">
                            {{ __('messages.image_on_right') }}
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
        <a href="{{ route('service-page-sections.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
    </form>
</div>

<script>
function addFeature(lang) {
    const container = document.getElementById('features-' + lang + '-container');
    const div = document.createElement('div');
    div.className = 'input-group mb-2';
    div.innerHTML = `
        <input type="text" name="features_${lang}[]" class="form-control" placeholder="{{ __('messages.feature') }}">
        <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">-</button>
    `;
    container.appendChild(div);
}
</script>
@endsection