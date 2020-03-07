@extends('layouts.app')

@section('content')
    <style>
        .login-register-card{
            transition: all .7s;
        }
        .login-register-card:hover{
            background: #0d0d0d;
            color: white;
            border: white;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card text-center">
                    <div class="card-header">
                        کتابخانه سمپادآموزش و پرورش سبزوار
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">سیستم مدیریت کتابخانه سمپاد سبزوار</h5>
                        <p class="card-text">به سیستم مدیریت کتابخانه سمپاد سبزوار خوش امدید</p>
                    </div>
                    <div class="card-footer text-muted">
                        توسعه گر سایت
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if(Auth::check())
                <div class="col-sm-12">
                    <div class="card login-register-card">
                        <div class="card-body">
                            <h5 class="card-title">ثبت نام</h5>
                            <p class="card-text">برای ثبت نام، دکمه ثبت نام را انتخاب کنید</p>
                            <a href="/register" class="btn btn-primary">ثبت نام</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-sm-12">
                    <div class="card login-register-card">
                        <div class="card-body">
                            <h5 class="card-title">ورود</h5>
                            <p class="card-text">برای ورود به سیستم ورود را انتخاب کنید</p>
                            <a href="/login" class="btn btn-primary">ورود</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
