@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Page A</div>

                <div class="card-body">
                    <p>Subscribe expired at {{ $subscribe->expired_at }}</p>
                    <p><a href="{{ asset('files/file.mp3') }}" download>Download file</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection