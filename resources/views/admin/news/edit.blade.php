@extends('layouts.admin')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">{{ __('messages.edit') }}</div>
        <div class="card-body">

            <form action="{{ route('news.update', $item->id) }}" method="post" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.date') }}</label>
                    <input class="form-control" type="date" name="date_of_news" value="{{ $item->date_of_news }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.name_en') }}</label>
                    <input class="form-control" type="text" name="name_en" value="{{ $item->name_en }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.name_ar') }}</label>
                    <input class="form-control" type="text" name="name_ar" value="{{ $item->name_ar }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.description_en') }}</label>
                    <textarea class="form-control rich-text" name="description_en">{{ $item->description_en }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.description_ar') }}</label>
                    <textarea class="form-control rich-text" name="description_ar">{{ $item->description_ar }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.photo') }}</label>
                    <input class="form-control" type="file" name="photo">
                    <img src="{{ asset('assets/admin/uploads/' . $item->photo) }}" width="100"
                        class="rounded mt-2 border">
                </div>

                <button class="btn btn-success">{{ __('messages.update') }}</button>
            </form>

        </div>
    </div>
@endsection
