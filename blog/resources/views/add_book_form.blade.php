@extends('layouts.app')
@if(Auth::check())
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">اضافه کردن کتاب</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                                <form method="POST" action="/add-book" style="direction: rtl">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right"> نام کتاب</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="author" class="col-md-4 col-form-label text-md-right"> نویسنده کتاب</label>

                                        <div class="col-md-6">
                                            <input id="author" type="text" class="form-control" name="author" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="subject" class="col-md-4 col-form-label text-md-right"> موضوع کتاب</label>

                                        <div class="col-md-6">
                                            <input id="subject" type="text" class="form-control" name="subject" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="shabak" class="col-md-4 col-form-label text-md-right"> شماره شابک کتاب</label>

                                        <div class="col-md-6">
                                            <input id="shabak" type="text" class="form-control" name="shabak">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                اضافه کردن کتاب
                                            </button>
                                        </div>
                                    </div>

                                    <br>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    @if($error == "The name field is required.")
                                                        <li>نوشتن نام کتاب الزامی است</li>
                                                    @endif
                                                    @if($error == "The author field is required.")
                                                        <li>نوشتن نام نویسنده الزامی است</li>
                                                    @endif
                                                    @if($error == "The shabak has already been taken.")
                                                        <li>این شماره شابک قبلا اختیار شده است</li>
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
@else
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(Auth::check())
                    <div class="card-header">اضافه کردن کتاب</div>
                    @else
                        <div class="card-header">خطا</div>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/login">ابتدا باید وارد سایت شوید...</a>
                            <script type="text/javascript">
                                var count = 5;
                                var redirect = "/login";

                                function countDown(){
                                    var timer = document.getElementById("timer");
                                    if(count > 0){
                                        count--;
                                        timer.innerHTML ="<p>" + count + "</p>";
                                        //delay for 1000ms
                                        setTimeout("countDown()", 1000);
                                    }else{
                                        window.location.href = redirect;
                                    }
                                }

                            </script>
                        <br>
                            <span id="timer">
                            <script type="text/javascript">countDown();</script>
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif
