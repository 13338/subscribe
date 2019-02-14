@extends('layouts.app')

@section('content')
<div class="container">
    <h1>
        Subscribes List
        <div class="float-right mb-2">
            <a href="{{ route('admin.subscribe.create') }}" class="btn btn-success btn-lg">Create</a>
        </div>
    </h1>

    <div class="table-responsive-sm">
        <table class="table table-striped table-inverse">
            <thead class="thead-inverse">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Cancelled</th>
                    <th>Expired at</th>
                    <th>Link</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subscribes as $subscribe)
                    <tr>
                        <td>{{ $subscribe->name }}</td>
                        <td><a href="mailto:{{ $subscribe->email }}">{{ $subscribe->email }}</a></td>
                        <td>{{ $subscribe->is_cancelled ? 'Yes' : 'No' }}</td>
                        <td class="{{ $subscribe->expired_at > Carbon\Carbon::now() ? 'text-success' : 'text-danger' }}">{{ $subscribe->expired_at }}</td>
                        <td><a href="{{ route('subscribe.show', ['subscribe' => $subscribe]) }}" target="_blank">Link</a></td>
                        <td><a href="{{ route('admin.subscribe.edit', ['subscribe' => $subscribe]) }}">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
