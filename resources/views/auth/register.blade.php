@extends('layouts.app')

@section('content')
<section class="vh-30">
    <div class="container py-3 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <h1 class="card-header mb-4">{{ __('Register') }}</h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name input -->
                    <div class="form-outline mb-2">
                        <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                        <label class="form-label" for="name">{{ __('Name') }}</label>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-2">
                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                        <label class="form-label" for="email">{{ __('Email Address') }}</label>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-2">
                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <label class="form-label" for="password">Password</label>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <input id="confirmpassword" type="password" class="form-control form-control-lg @error('confirmpassword') is-invalid @enderror" name="confirmpassword" required autocomplete="current-confirmpassword">
                        <label class="form-label" for="confirmpassword">Confirm Password</label>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Submit button -->
                    <div class="d-grid gap-2">
                        <button class="btn btn-lg btn-danger"  type="submit">{{ __('Register Now') }}</button>
                    </div>

                </form>
            </div>
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="{{ URL::to('/assets/img/register.jpg') }}"
                    class="img-fluid" alt="Phone image">
            </div>
        </div>
    </div>
</section>
@endsection
