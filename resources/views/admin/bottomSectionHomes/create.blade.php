@extends('layouts.admin')

@section('content')
<div class="container">
    <h3 class="mb-4">{{ __('messages.create_bottom_section_home') }}</h3>

    <form action="{{ route('bottomSectionHomes.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf

        <div class="form-group">
            <label>{{ __('messages.name_en') }}</label>
            <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }}">
        </div>

        <div class="form-group">
            <label>{{ __('messages.name_ar') }}</label>
            <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar') }}">
        </div>

        <div class="form-group">
            <label>{{ __('messages.short_description_en') }}</label>
            <textarea name="short_description_en" class="form-control" rows="2">{{ old('short_description_en') }}</textarea>
        </div>

        <div class="form-group">
            <label>{{ __('messages.short_description_ar') }}</label>
            <textarea name="short_description_ar" class="form-control" rows="2">{{ old('short_description_ar') }}</textarea>
        </div>

        <div class="form-group">
            <label>{{ __('messages.tall_description_en') }}</label>
            <textarea name="tall_description_en" class="form-control rich-text" rows="3">{{ old('tall_description_en') }}</textarea>
        </div>

        <div class="form-group">
            <label>{{ __('messages.tall_description_ar') }}</label>
            <textarea name="tall_description_ar" class="form-control rich-text" rows="3">{{ old('tall_description_ar') }}</textarea>
        </div>

        <div class="form-group">
            <label>{{ __('messages.photo') }}</label>
            <input type="file" name="photo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
    </form>
</div>
@endsection
