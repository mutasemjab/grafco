@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h3>{{ __('messages.consumables') }}</h3>
        <a href="{{ route('consumables.create') }}" class="btn btn-primary">
            {{ __('messages.create_consumable') }}
        </a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>{{ __('messages.photo') }}</th>
                <th>{{ __('messages.name_en') }}</th>
                <th>{{ __('messages.name_ar') }}</th>
                <th>{{ __('messages.order') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td><img src="{{ asset('assets/admin/uploads/'.$item->photo) }}" width="60"></td>
                <td>{{ $item->name_en }}</td>
                <td>{{ $item->name_ar }}</td>
                <td>{{ $item->order }}</td>
                <td>
                    <a href="{{ route('consumables.edit',$item->id) }}" class="btn btn-sm btn-success">
                        {{ __('messages.edit') }}
                    </a>

                    <form action="{{ route('consumables.destroy',$item->id) }}" method="POST" style="display:inline">
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

    <div class="mt-3">
        {{ $items->links() }}
    </div>
</div>
@endsection