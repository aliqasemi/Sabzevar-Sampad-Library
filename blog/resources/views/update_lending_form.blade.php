@extends('layouts.app')
@if(Auth::check())
@section('content')
@can('isAdmin')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">تاییدیه سفارش</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="/lending_update/{{$lending->id}}" style="direction: rtl">
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="form-group row">
                                <label for="book_id" class="col-md-4 col-form-label text-md-right"> نام کتاب</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="book_id" name="book_id" required>
                                        <option value="{{\App\book::find($lending->book_id)->id}}" >{{\App\book::find($lending->book_id)->name}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row" style="display: none">
                                <label for="user_id" class="col-md-4 col-form-label text-md-right"></label>
                                <div class="col-md-6">
                                    <input id="user_id" value="{{ Auth::user()->id }}" type="text" class="form-control" name="user_id" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="lending_date" class="col-md-4 col-form-label text-md-right"> تاریخ قرض گرفتن کتاب</label>
                                <div class="col-md-6">
                                    <input id="lending_date" value="{{$lending->lending_date}}" name="lending_date"  type="date" class="form-control">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="return_date" class="col-md-4 col-form-label text-md-right">تاریخ بازگشت کتاب</label>
                                <div class="col-md-6">
                                    <input id="return_date" type="date" value="{{$lending->return_date}}" class="form-control" name="return_date">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit"  class="btn btn-primary">
                                        ثبت سفارش
                                    </button>
                                </div>
                            </div>

                            <br>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <!-- //The lending date must be a date after today. The return date must be a date before !-->
                                            @if((strpos($error , "before") !== false))
                                                <li>مهلت ارسال کتاب نهایتا تا 14 روز پس از تحویل کتاب است</li>
                                            @endif
                                            @if(@$error == "The lending date must be a date after yesterday.")
                                                <li>تاریخ قرض گرفن کتاب قبل از امروز نمیتواند باشد</li>
                                            @endif
                                            @if(@$error == "The return date field is required.")
                                                <li>وارد کردن تاریخ بازگشت الزامیست</li>
                                            @endif
                                            @if(@$error == "The lending date field is required.")
                                                <li>وارد کردن تاریخ ارسال الزامیست</li>
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
@elsecan('isSuperAdmin')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">تاییدیه سفارش</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="/lending_update/{{$lending->id}}" style="direction: rtl">
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="form-group row">
                                <label for="book_id" class="col-md-4 col-form-label text-md-right"> نام کتاب</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="book_id" name="book_id" required>
                                        <option value="{{\App\book::find($lending->book_id)->id}}" >{{\App\book::find($lending->book_id)->name}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row" style="display: none">
                                <label for="user_id" class="col-md-4 col-form-label text-md-right"></label>
                                <div class="col-md-6">
                                    <input id="user_id" value="{{ Auth::user()->id }}" type="text" class="form-control" name="user_id" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="lending_date" class="col-md-4 col-form-label text-md-right"> تاریخ قرض گرفتن کتاب</label>
                                <div class="col-md-6">
                                    <input id="lending_date" value="{{$lending->lending_date}}" name="lending_date"  type="date" class="form-control">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="return_date" class="col-md-4 col-form-label text-md-right">تاریخ بازگشت کتاب</label>
                                <div class="col-md-6">
                                    <input id="return_date" type="date" value="{{$lending->return_date}}" class="form-control" name="return_date">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit"  class="btn btn-primary">
                                        ثبت سفارش
                                    </button>
                                </div>
                            </div>

                            <br>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <!-- //The lending date must be a date after today. The return date must be a date before !-->
                                            @if((strpos($error , "before") !== false))
                                                <li>مهلت ارسال کتاب نهایتا تا 14 روز پس از تحویل کتاب است</li>
                                            @endif
                                            @if(@$error == "The lending date must be a date after yesterday.")
                                                <li>تاریخ قرض گرفن کتاب قبل از امروز نمیتواند باشد</li>
                                            @endif
                                            @if(@$error == "The return date field is required.")
                                                <li>وارد کردن تاریخ بازگشت الزامیست</li>
                                            @endif
                                            @if(@$error == "The lending date field is required.")
                                                <li>وارد کردن تاریخ ارسال الزامیست</li>
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
@endcan
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
