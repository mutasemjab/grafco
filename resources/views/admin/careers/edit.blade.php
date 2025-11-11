@extends('layouts.admin')
@section('content')
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-warning text-dark">{{ __('messages.edit') }}</div>
        <div class="card-body">

            <form action="{{ route('careers.update', $item->id) }}" method="post">
                @csrf @method('PUT')

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
                    <label class="form-label">{{ __('messages.bottom_name_en') }}</label>
                    <input class="form-control" type="text" name="bottom_name_en" value="{{ $item->bottom_name_en }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('messages.bottom_name_ar') }}</label>
                    <input class="form-control" type="text" name="bottom_name_ar" value="{{ $item->bottom_name_ar }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('messages.bottom_description_en') }}</label>
                    <textarea class="form-control rich-text" name="bottom_description_en">{{ $item->bottom_description_en }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('messages.bottom_description_ar') }}</label>
                    <textarea class="form-control rich-text" name="bottom_description_ar">{{ $item->bottom_description_ar }}</textarea>
                </div>

                <button class="btn btn-success">{{ __('messages.update') }}</button>
            </form>
        </div>
    </div>

    <!-- Available Positions Table -->
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <span>{{ __('messages.available_positions') }}</span>
            <button class="btn btn-sm btn-light" data-bs-toggle="collapse" data-bs-target="#addPositionForm">+
                {{ __('messages.add_new') }}</button>
        </div>
        <div class="collapse" id="addPositionForm">
            <div class="card-body">
                <form action="{{ route('careers.positions.store', $item->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="name_en" placeholder="{{ __('messages.name_en') }}">
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="name_ar" placeholder="{{ __('messages.name_ar') }}">
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="file" name="photo">
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-success">{{ __('messages.save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>{{ __('messages.photo') }}</th>
                        <th>{{ __('messages.name_en') }}</th>
                        <th>{{ __('messages.name_ar') }}</th>
                        <th width="120">{{ __('messages.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($item->availablePositions as $position)
                        <tr>
                            <td><img src="{{ asset('assets/admin/uploads/' . $position->photo) }}" width="60" class="rounded"></td>
                            <td>{{ $position->name_en }}</td>
                            <td>{{ $position->name_ar }}</td>
                            <td>
                                <form action="{{ route('positions.destroy', $position->id) }}" method="post"
                                    class="d-inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('{{ __('messages.sure?') }}')"
                                        class="btn btn-sm btn-danger">{{ __('messages.delete') }}</button>
                                </form>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="collapse"
                                    data-bs-target="#editPosition{{ $position->id }}">{{ __('messages.edit') }}</button>
                            </td>
                        </tr>
                        <tr class="collapse" id="editPosition{{ $position->id }}">
                            <td colspan="4">
                                <form action="{{ route('positions.update', $position->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf @method('PUT')
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <input class="form-control" type="text" name="name_en"
                                                value="{{ $position->name_en }}">
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control" type="text" name="name_ar"
                                                value="{{ $position->name_ar }}">
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control" type="file" name="photo">
                                            <img src="{{ asset('assets/admin/uploads/' . $position->photo) }}" width="50"
                                                class="rounded mt-1">
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn btn-success">{{ __('messages.update') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
