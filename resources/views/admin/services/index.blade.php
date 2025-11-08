@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>{{ __('messages.services') }}</h3>

        @can('service-create')
        <a href="{{ route('services.create') }}" class="btn btn-success">{{ __('messages.create') }}</a>
        @endcan
    </div>

    <div class="card shadow">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>{{ __('messages.icon') }}</th>
                        <th>{{ __('messages.name_en') }}</th>
                        <th>{{ __('messages.name_ar') }}</th>
                        <th width="150">{{ __('messages.actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($services as $service)
                    <tr>
                        <td><img src="{{ asset('assets/admin/uploads/'.$service->icon) }}" width="60" class="rounded"></td>
                        <td>{{ $service->name_en }}</td>
                        <td>{{ $service->name_ar }}</td>
                        <td>
                            @can('service-edit')
                            <a href="{{ route('services.edit',$service->id) }}" class="btn btn-sm btn-primary">{{ __('messages.edit') }}</a>
                            @endcan
                            
                            @can('service-delete')
                            <form action="{{ route('services.destroy',$service->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
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
        {{ $services->links() }}
    </div>

</div>

@endsection
