@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>{{ __('messages.brands') }}</h3>

        @can('brand-create')
        <a href="{{ route('brands.create') }}" class="btn btn-success">{{ __('messages.create') }}</a>
        @endcan
    </div>

    <div class="card shadow">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>{{ __('messages.photo') }}</th>
                        <th>{{ __('messages.name') }}</th>
                        <th width="150">{{ __('messages.actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($brands as $brand)
                    <tr>
                        <td><img src="{{ asset('storage/'.$brand->photo) }}" width="60" class="rounded"></td>
                        <td>{{ $brand->name }}</td>
                        <td>

                            @can('brand-edit')
                            <a href="{{ route('brands.edit',$brand->id) }}" class="btn btn-sm btn-primary">
                                {{ __('messages.edit') }}
                            </a>
                            @endcan

                            @can('brand-delete')
                            <form action="{{ route('brands.destroy',$brand->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">{{ __('messages.delete') }}</button>
                            </form>
                            @endcan

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $brands->links() }}
    </div>

</div>

@endsection
