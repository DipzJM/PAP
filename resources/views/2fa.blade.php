@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-5 mx-auto shadow bg-white" style="border-radius: 15px;">
            <h1><strong class="row justify-content-center">2FA</strong></h1>   
            </br>
            <div class="card-body">
                <form method="POST" action="{{ route('2fa') }}">
                    @csrf
                    
                    <div class="row mb-3">
                            <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="number" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <button type="submit" class="button-1">
                                {{ __('Verify') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
