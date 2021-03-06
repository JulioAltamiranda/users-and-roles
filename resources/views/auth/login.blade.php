@extends('layouts.app')
@section('content')
    <div class="card m-3 m-md-0 custom-auth">
        <div class="card-header">{{ __('Login') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Login') }}
                    </button>
                </div>
                <div class="d-flex justify-content-between flex-wrap">            
                    <a class="btn btn-link pl-0 pb-0 pt-0" href="{{ route('register') }}">
                        <small> {{ __('Not registered yet? Sign up') }}</small>
                    </a>
                    @if (Route::has('password.request'))
                    <a class="btn btn-link pl-0 pb-0 pt-0" href="{{ route('password.request') }}">
                        <small>{{ __('Forgot Your Password?') }}</small>
                    </a>
                    @endif                                
                </div>                
            </form>
        </div>
    </div>
@endsection
