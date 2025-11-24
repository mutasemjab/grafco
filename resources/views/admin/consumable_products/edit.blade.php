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

            <button class="btn btn-success">{{ __('messages.update') }}</button>
            <a href="{{ route('consumable_products.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
        </form>

    </div>
</div>

<script>
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
</script>
@endsection