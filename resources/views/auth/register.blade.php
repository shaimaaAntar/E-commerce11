@extends('auth.master')

@section('content')

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

    <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">

        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">
            Ecommerce <span class="tx-info tx-normal">Store</span>
        </div>

        <div class="tx-center mg-b-60">
            Create your account
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Name --}}
            <div class="form-group">
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Enter your name"
                    required
                    autofocus
                >

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Email --}}
            <div class="form-group">
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="Enter your email"
                    required
                >

                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="form-group">
                <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Enter your password"
                    required
                >

                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="form-group">
                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    placeholder="Confirm your password"
                    required
                >
            </div>

            <div class="form-group tx-12">
                By clicking the Sign Up button below, you agree to our
                privacy policy and terms of use of our website.
            </div>

            <button type="submit" class="btn btn-info btn-block">
                Sign Up
            </button>

        </form>

        <div class="mg-t-40 tx-center">
            Already have an account?
            <a href="{{ route('login') }}" class="tx-info">
                Sign In
            </a>
        </div>

    </div>

</div>

@endsection