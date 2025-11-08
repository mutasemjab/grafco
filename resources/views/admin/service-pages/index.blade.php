@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h3>{{ __('messages.service_pages') }}</h3>
        <a href="{{ route('service-pages.create') }}" class="btn btn-primary">
            {{ __('messages.create_service_page') }}
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <table class="table table-bordered table-hover mb-0">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>{{ __('messages.slug') }}</th>
                    <th>{{ __('messages.name_en') }}</th>
                    <th>{{ __('messages.name_ar') }}</th>
                    <th>{{ __('messages.sections') }}</th>
                    <th>{{ __('messages.order') }}</th>
                    <th>{{ __('messages.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><code>{{ $item->slug }}</code></td>
                    <td>{{ $item->name_en }}</td>
                    <td>{{ $item->name_ar }}</td>
                    <td>
                        <a href="{{ route('service-pages.show', $item->id) }}" class="btn btn-sm btn-info">
                            {{ $item->sections_count }} {{ __('messages.sections') }}
                        </a>
                    </td>
                    <td>{{ $item->order }}</td>
                    <td>
                        <a href="{{ route('service-pages.edit', $item->id) }}" class="btn btn-sm btn-success">
                            {{ __('messages.edit') }}
                        </a>

                        <form action="{{ route('service-pages.destroy', $item->id) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('messages.are_you_sure') }}')">
                                {{ __('messages.delete') }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $items->links() }}
    </div>
</div>
@endsection