@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ __('messages.create_service') }}</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>{{ __('messages.name_en') }}</label>
                            <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('messages.name_ar') }}</label>
                            <input type="text" name="name_ar" value="{{ old('name_ar') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('messages.description_en') }}</label>
                            <textarea name="description_en" class="form-control rich-text">{{ old('description_en') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>{{ __('messages.description_ar') }}</label>
                            <textarea name="description_ar" class="form-control rich-text">{{ old('description_ar') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>{{ __('messages.icon') }}</label>
                            <input type="file" name="icon" class="form-control">
                        </div>

                        <button class="btn btn-success btn-block">{{ __('messages.save') }}</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
