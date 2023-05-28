@extends('layouts.register')

@section('register')
<div class="register-box">
    <!-- /.login-logo -->
    <div class="register-box-body">
        <div class="register-logo">
            <a href="{{ url('/') }}">
                <img src="/img/logo-20230520031023.png" alt="logo.png" width="100">
            </a>
        </div>

        <form action="{{ url('/register') }}" method="post" class="form-register">
            @csrf
            <div class="form-group has-feedback @error('name') has-error @enderror">
                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required value="{{ old('name') }}" autofocus>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @error('name')
                    <span class="help-block">{{ $message }}</span>
                @else
                    <span class="help-block with-errors"></span>
                @enderror
            </div>
            <div class="form-group has-feedback @error('email') has-error @enderror">
                <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @error('email')
                    <span class="help-block">{{ $message }}</span>
                @else
                    <span class="help-block with-errors"></span>
                @enderror
            </div>
            <div class="form-group has-feedback @error('phone_number') has-error @enderror">
                <input type="text" name="phone_number" class="form-control" placeholder="Nomor Telepon" required value="{{ old('phone_number') }}">
                <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                @error('phone_number')
                    <span class="help-block">{{ $message }}</span>
                @else
                    <span class="help-block with-errors"></span>
                @enderror
            </div>
            <div class="form-group has-feedback @error('password') has-error @enderror">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('password')
                    <span class="help-block">{{ $message }}</span>
                @else
                    <span class="help-block with-errors"></span>
                @enderror
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
                </div>
                <!-- /.col -->
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <a href="{{ url('/login') }}">Sudah memiliki akun? Login di sini</a>
                </div>
            </div>            
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
