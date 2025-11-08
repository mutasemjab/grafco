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

            <button class="btn btn-success">{{ __('messages.save') }}</button>
            <a href="{{ route('consumable_products.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
        </form>

    </div>
</div>
@endsection