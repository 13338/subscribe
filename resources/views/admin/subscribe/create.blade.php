@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
                <h1 class="col-md-8 offset-md-4">Create Subscribe</h1>
            </div>
            <form method="POST" action="{{ route('admin.subscribe.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                                <input type="radio" name="is_cancelled" value="0" autocomplete="off" checked> No
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="is_cancelled" value="1" autocomplete="off"> Yes
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
                        <input id="expired_at" type="datetime-local" class="form-control{{ $errors->has('expired_at') ? ' is-invalid' : '' }}" name="expired_at" value="{{ date('Y-m-d\TH:i', strtotime(date('Y-m-d\TH:i') . " +3 month")) }}" required>

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
                            {{ __('Create') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
