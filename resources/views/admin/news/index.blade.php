@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">{{ __('messages.news') }}</h3>
        <a href="{{ route('news.create') }}" class="btn btn-primary">+ {{ __('messages.add_new') }}</a>
    </div>



    <div class="card shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>{{ __('messages.photo') }}</th>
                    <th>{{ __('messages.name_en') }}</th>
                    <th>{{ __('messages.name_ar') }}</th>
                    <th>{{ __('messages.date') }}</th>
                    <th width="120">{{ __('messages.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td><img src="{{ asset('assets/admin/uploads/' . $item->photo) }}" width="60" class="rounded"></td>
                        <td>{{ $item->name_en }}</td>
                        <td>{{ $item->name_ar }}</td>
                        <td>{{ $item->date_of_news }}</td>
                        <td>
                            <a href="{{ route('news.edit', $item->id) }}"
                                class="btn btn-sm btn-warning">{{ __('messages.edit') }}</a>
                            <form action="{{ route('news.destroy', $item->id) }}" method="post" class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('{{ __('sure?') }}')"
                                    class="btn btn-sm btn-danger">{{ __('messages.delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $items->links() }}</div>
@endsection
