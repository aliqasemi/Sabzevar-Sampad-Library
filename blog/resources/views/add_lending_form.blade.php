@extends('layouts.app')
@if(Auth::check())
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">قرض گرفتن کتاب</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="/add-lending" style="direction: rtl">
                            @csrf

                            <div class="form-group row">
                                <label for="book_id" class="col-md-4 col-form-label text-md-right"> نام کتاب</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="book_id" name="book_id" required>
                                            @if($book->lended == 1)
                                                <option value="{{$book->id}}">{{$book->name}} &nbsp;&nbsp;&nbsp;&nbsp; آزاد
                                                </option>
                                            @else
                                                 <option disabled value="{{$book->id}}">{{$book->name}} &nbsp;&nbsp;&nbsp;&nbsp; رزرو شده
                                                 </option>
                                            @endif
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
                                    <input id="lending_date" type="date" class="form-control" name="lending_date">
                                    <script type = "text/javascript">
                                        var today = new Date();
                                        var dd = today.getDate();
                                        var mm = today.getMonth() + 1; //January is 0!
                                        var yyyy = today.getFullYear();
                                        if(dd<10) {
                                            dd = '0'+dd
                                        }
                                        if(mm<10) {
                                            mm = '0'+mm
                                        }
                                        today = yyyy + '-' + mm + '-' + dd;
                                        document.getElementById("lending_date").value = today;
                                    </script>
                                </div>
                            </div>




                            <div class="form-group row">
                                <label for="return_date" class="col-md-4 col-form-label text-md-right">تاریخ بازگشت کتاب</label>

                                <div class="col-md-6">
                                    <input id="return_date" type="date" class="form-control" name="return_date">
                                    <script type = "text/javascript">
                                        var today = new Date();
                                        var dd = today.getDate();
                                        var mm = today.getMonth() + 1; //January is 0!
                                        var yyyy = today.getFullYear();
                                        if(dd<10) {
                                            dd = '0'+dd
                                        }
                                        if(mm<10) {
                                            mm = '0'+mm
                                        }
                                        today = yyyy + '-' + mm + '-' + dd;
                                        var endDate = new Date();
                                        endDate.setDate(today.getDate()+14);
                                        var day = endDate.getDate();
                                        var month = endDate.getMonth() + 1 ;
                                        var year = endDate.getFullYear();
                                        endDate = year + '-' + month + '-' + day ;
                                        document.getElementById("return_date").value = endDate;
                                    </script>
                                </div>
                            </div>


                            @if($book->lended == 1)
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit"  class="btn btn-primary">
                                        انجام عملیات
                                    </button>
                                </div>
                            </div>
                            @else
                                با عرض پوزش کتاب {{$book->name}} رزرو شده است.
                            @endif
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
                                                    <li>وارد کردن تاریخ بازگشت الزامیست</li>
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
