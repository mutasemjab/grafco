@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ __('messages.create_brand') }}</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>{{ __('messages.name') }}</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('messages.sort_order') }}</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('messages.photo') }}</label>
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <button class="btn btn-success btn-block">{{ __('messages.save') }}</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
