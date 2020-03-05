@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ورود اعضا</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" style="direction: rtl">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">ایمیل</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">رمز عبور</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    &nbsp;&nbsp;&nbsp;&nbsp;مرا به خاطر بسپار<label class="form-check-label" for="remember">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    ورود
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        رمز عبور خود را فراموش کرده اید؟ کلیک کنید
                                    </a>
                                @endif
                            </div>
                        </div>
                        <br>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        @if($error == "The email field is required.")
                                            <li>ایمیل خود را وارد نمایید</li>
                                        @endif
                                        @if($error == "The password field is required.")
                                            <li>رمز عبور خود را وارد نمایید</li>
                                        @endif
                                        @if($error == "These credentials do not match our records.")
                                            <li>نام کاربری یا کلمه عبور اشتباه است</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
