@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Page A</div>

                <div class="card-body">
                    <p>Subscribe expired at {{ $subscribe->expired_at }}</p>
                    <p><a href="{{ route('file.download', ['file' => $subscribe->file]) }}">Download file</a></p>
                    <form method="POST" action="{{ route('subscribe.destroy', ['subscribe' => $subscribe]) }}">
                        @csrf
                        {{ method_field('DELETE') }}
                        <div class="form-group row mb-0">
                            <div class="col">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Unsubscribe') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
