@extends('layouts.auth')

@section('title', 'Sistem Tata Tertib')

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            
            @if (session('fail'))
                    <div class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
                @endif

            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="email" class="col-sm-12 col-form-label pl-0">{{ __('E-Mail Address') }}</label>
                        <br>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    

                    <div class="col-md-12">
                        <label for="password" class="col-md-4 col-form-label text-md-left pl-0">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn-block btn btn-primary">
                            {{ __('Login') }}
                        </button>
                        <br>

                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection