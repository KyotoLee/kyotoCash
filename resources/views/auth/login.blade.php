@extends('layouts.kyoto')
@section('title',  'Kyoto Cash - Login')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section class="vh-100">
                <div class="container py-5 h-100">
                    <div class="row d-flex align-items-center justify-content-center h-100">
                        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form1Example13">Email address</label>
                                    <input type="email" id="email"  class="form-control form-control-lg @error('email') is-invalid @enderror " required autocomplete="email"/>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form1Example23">Password</label>
                                    <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror " required autocomplete="current-password"/>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-around align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                                        <label class="form-check-label" for="form1Example3"> Remember me </label>
                                    </div>
                                    <a href="#!">Forgot password?</a>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                                <p>Don't have an account? <a href="#!" class="link-info">Register here</a></p>
                            </form>
                        </div>
                        <div class="col-md-8 col-lg-7 col-xl-6">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                                 class="img-fluid" alt="Phone image">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
