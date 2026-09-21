@extends('auth.master')

@section('content')

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">

            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">
                starlight
                <span class="tx-info tx-normal">admin</span>
            </div>

            <div class="tx-center mg-b-60">
                Sign in to your account
            </div>

            <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
                <div class="form-group">
                    <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="Enter your email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                    >

                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Enter your password"
                            required
                    >

                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <a href="{{ route('password.request') }}"
                       class="tx-info tx-12 d-block mg-t-10">
                        Forgot password?
                    </a>
                </div>

                <!-- Remember me -->
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="remember">
                        Remember me
                    </label>
                </div>

                <button type="submit" class="btn btn-info btn-block">
                    Sign In
                </button>

            </form>

            <div class="mg-t-60 tx-center">
                Not yet a member?
                <a href="{{ route('register') }}" class="tx-info">
                    Sign Up
                </a>
            </div>

        </div>

    </div>

@endsection