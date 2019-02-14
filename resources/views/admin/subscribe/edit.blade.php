@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
                <h1 class="col-md-8 offset-md-4">Edit Subscribe {{ $subscribe->name }}</h1>
            </div>
            <form method="POST" action="{{ route('admin.subscribe.update', $subscribe) }}">
                @csrf
                {{ method_field('PATCH') }}
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $subscribe->name }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $subscribe->email }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{ __('Cancelled') }}</label>

                    <div class="col-md-6">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" name="is_cancelled" value="0" autocomplete="off"{{ $subscribe->is_cancelled == '0' ? ' checked' : '' }}> No
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="is_cancelled" value="1" autocomplete="off"{{ $subscribe->is_cancelled == '1' ? ' checked' : '' }}> Yes
                            </label>
                        </div>

                        @if ($errors->has('is_cancelled'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('is_cancelled') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="expired_at" class="col-md-4 col-form-label text-md-right">{{ __('Expired at') }}</label>

                    <div class="col-md-6">
                        <input id="expired_at" type="datetime-local" class="form-control{{ $errors->has('expired_at') ? ' is-invalid' : '' }}" name="expired_at" value="{{ \Carbon\Carbon::parse($subscribe->expired_at)->format('Y-m-d\TH:i') }}" required>

                        @if ($errors->has('expired_at'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('expired_at') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            {{ __('Update') }}
                        </button>
                        <button type="submit" class="btn btn-danger" form="delete_form" onclick="return confirm('Are you sure?')">
                            {{ __('Delete') }}
                        </button>
                    </div>
                </div>
            </form>
            <form method="POST" action="{{ route('admin.subscribe.update', $subscribe) }}" id="delete_form">
                @csrf
                {{ method_field('DELETE') }}
            </form>
        </div>
    </div>
</div>
@endsection
