@extends('layouts.admin')

@section('content')
<div class="container">
    <h3 class="mb-4">{{ __('messages.create_service_page') }}</h3>

    <form action="{{ route('service-pages.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="form-group">
            <label>{{ __('messages.slug') }} <small class="text-muted">(e.g., software, appointment, parts)</small></label>
            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" required>
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.name_en') }}</label>
                    <input type="text" name="name_en" class="form-control @error('name_en') is-invalid @enderror" value="{{ old('name_en') }}" required>
                    @error('name_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.name_ar') }}</label>
                    <input type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror" value="{{ old('name_ar') }}" required>
                    @error('name_ar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.title_en') }}</label>
                    <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en') }}" required>
                    @error('title_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.title_ar') }}</label>
                    <input type="text" name="title_ar" class="form-control @error('title_ar') is-invalid @enderror" value="{{ old('title_ar') }}" required>
                    @error('title_ar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.subtitle_en') }}</label>
                    <textarea name="subtitle_en" class="form-control @error('subtitle_en') is-invalid @enderror" rows="2">{{ old('subtitle_en') }}</textarea>
                    @error('subtitle_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('messages.subtitle_ar') }}</label>
                    <textarea name="subtitle_ar" class="form-control @error('subtitle_ar') is-invalid @enderror" rows="2">{{ old('subtitle_ar') }}</textarea>
                    @error('subtitle_ar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{ __('messages.order') }}</label>
            <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}">
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
        <a href="{{ route('service-pages.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
    </form>
</div>
@endsection