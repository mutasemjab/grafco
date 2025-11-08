@extends('layouts.admin')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">{{ __('messages.add_new') }}</div>
        <div class="card-body">

            <form action="{{ route('careers.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.name_en') }}</label>
                    <input class="form-control" type="text" name="name_en">
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('messages.name_ar') }}</label>
                    <input class="form-control" type="text" name="name_ar">
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('messages.description_en') }}</label>
                    <textarea class="form-control rich-text" name="description_en"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('messages.description_ar') }}</label>
                    <textarea class="form-control rich-text" name="description_ar"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('messages.bottom_name_en') }}</label>
                    <input class="form-control" type="text" name="bottom_name_en">
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('messages.bottom_name_ar') }}</label>
                    <input class="form-control" type="text" name="bottom_name_ar">
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('messages.bottom_description_en') }}</label>
                    <textarea class="form-control rich-text" name="bottom_description_en"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('messages.bottom_description_ar') }}</label>
                    <textarea class="form-control rich-text" name="bottom_description_ar"></textarea>
                </div>

                <button class="btn btn-success">{{ __('messages.save') }}</button>
            </form>

        </div>
    </div>
@endsection
