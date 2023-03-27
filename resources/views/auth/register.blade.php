@extends('layouts.kyotoAuth')
@section('title',  'Kyoto Cash - Register')
@section('content')
<div class="row justify-content-center" id="register">
    <section class="h-100 h-custom register-container">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3">
                        <div class="d-flex justify-content-center">
                            <div class="box_image">
                                <img src="{{asset('images/logo.png')}}" alt="Kyoto Logo">
                            </div>
                        </div>
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2 fs-24 fw-700 text-center">Đăng kí</h3>
                            <form class="px-md-2" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="name">Họ và tên (*)</label>
                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập họ và tên của bạn"  autocomplete="name" name="name"/>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email (*)</label>
                                    <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Nhập email của bạn" name="email"/>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Mật khẩu (*)</label>
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Nhập mật khẩu của bạn ít nhất 6 kí tự bao gồm chữ và số" name="password"/>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password_confirmation">Xác nhận mật khẩu (*)</label>
                                    <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Nhập lại mật khẩu của bạn để xác nhận" name="password_confirmation"/>
                                    @error('confirm-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="store">Của hàng (*)</label>
                                    <input type="text" id="store" class="form-control @error('store_name') is-invalid @enderror" placeholder="Nhập tên cửa hàng của bạn" name="store_name"/>
                                    @error('store_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="phone">Số điện thoại</label>
                                    <input type="text" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Nhập số điện thoại của bạn" name="phone"/>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>store_name
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="address">Địa chỉ</label>
                                    <input type="text" id="address" class="form-control" placeholder="Nhập địa chỉ của bạn" name="address"/>
                                </div>

                                <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
<script src="{{asset('/js/validate/validate-register.js')}}"></script>
