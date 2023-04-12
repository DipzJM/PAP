@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-5 mx-auto shadow bg-white" style="border-radius: 15px;">
            <h1><strong class="row justify-content-center">LOGIN</strong></h1>   
            </br>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="row mb-3">
                        <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                        <div class="col-md-8">
                            <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="current-username" autofocus>   
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="button-1">
                                {{ __('Login') }}
                    </button>
                    <div class="text-center">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div> 
                </form>
            </div>
        </div>
    </div>
@endsection
