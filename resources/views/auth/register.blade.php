@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="card p-5 mx-auto shadow bg-white" style="border-radius:15px">
                <h1><strong class="row justify-content-center">REGISTER</strong></h1>   
                <div class="card-body">
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="primeiro_nome" class="col-md-4 col-form-label text-md-end">First name</label>

                            <div class="col-md-8">
                                <input id="primeiro_nome" type="text" class="form-control" name="primeiro_nome" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ultimo_nome" class="col-md-4 col-form-label text-md-end">Last name</label>

                            <div class="col-md-8">
                                <input id="ultimo_nome" type="text" class="form-control" name="ultimo_nome" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>
                            <div class="col-md-8">
                                <input id="phone_number" type="tel" class="form-control" name="phone_number" maxLength='9' pattern="[0-9]{9}" required>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="2fa-confirm" class="col-md-4 text-md-end">{{ __('2FA') }}</label>
                            <div class="col-md-4">
                                <div class="checkbox-wrapper-19">
                                    <input type="checkbox" id="cbtest-19" name= "2fa">
                                    <label for="cbtest-19" class="check-box"></label>
                                </div>
                            </div>
                        </div>




                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="button-1">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
