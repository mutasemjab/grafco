@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">{{ __('messages.edit_brand') }}</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('brands.update',$brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>{{ __('messages.name') }}</label>
                            <input type="text" name="name" value="{{ old('name',$brand->name) }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('messages.photo') }}</label><br>
                            <img src="{{ asset('assets/admin/uploads/'.$brand->photo) }}" width="80" class="mb-2 rounded">
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <button class="btn btn-primary btn-block">{{ __('messages.save') }}</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
