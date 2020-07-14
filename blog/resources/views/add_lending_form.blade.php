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
                                    <input id="lending_date" class="form-control" name="lending_date">
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            var today = new Date();
                                            var startDate = new Date();
                                            var endDate = new Date();
                                            startDate.setDate(today.getDate()) ;
                                            endDate.setDate(today.getDate()+14);
                                            $("#lending_date").pDatepicker(
                                                {
                                                    altField: '#mydate',
                                                    observer: true,
                                                    responsive : true ,
                                                    altFormat: "YYYY-MM-DD",
                                                    format: 'YYYY-MM-DD',
                                                    initialValueType: 'georgian',
                                                    autoClose: true,
                                                    minDate : startDate ,
                                                    maxDate : endDate ,
                                                    showButtonPanel: true ,
                                                    calendar:{
                                                        persian: {
                                                            locale: 'en'
                                                        }
                                                    } ,
                                                }
                                            );
                                        });


                                    </script>
                                </div>
                            </div>




                            <div class="form-group row">
                                <label for="return_date" class="col-md-4 col-form-label text-md-right">تاریخ بازگشت کتاب</label>

                                <div class="col-md-6">
                                    <input id="return_date" class="form-control" name="return_date">
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            var today = new Date();
                                            var startDate = new Date();
                                            var endDate = new Date();
                                            startDate.setDate(today.getDate()) ;
                                            endDate.setDate(today.getDate()+14);
                                            $("#return_date").pDatepicker(
                                                {
                                                    altField: '#mydate',
                                                    observer: true,
                                                    responsive : true ,
                                                    altFormat: "YYYY-MM-DD",
                                                    format: 'YYYY-MM-DD',
                                                    initialValueType: 'georgian',
                                                    autoClose: true,
                                                    minDate : startDate ,
                                                    maxDate : endDate ,
                                                    showButtonPanel: true ,
                                                    calendar:{
                                                        persian: {
                                                            locale: 'en'
                                                        }
                                                    } ,
                                                }
                                            );
                                        });
                                        $(document).ready(function () {
                                            $(".header-row > .header-row-cell:nth-child(1)").text("ش");
                                            $(".header-row > .header-row-cell:nth-child(2)").text("ی");
                                            $(".header-row > .header-row-cell:nth-child(3)").text("د");
                                            $(".header-row > .header-row-cell:nth-child(4)").text("س");
                                            $(".header-row > .header-row-cell:nth-child(5)").text("چ");
                                            $(".header-row > .header-row-cell:nth-child(6)").text("پ");
                                            $(".header-row > .header-row-cell:nth-child(7)").text("ج");
                                            if ($(".pwt-btn-switch").text().includes("Ordibehesht"))
                                                $(".pwt-btn-switch").text($(".pwt-btn-switch").text().replace("Ordibehesht" , "اردیبهشت").replace("Ordibehesht" , " ").replace("1399" , " ").replace("۱۳۹۹ اردیبهشت  اردیبهشت" , "۱۳۹۹ اردیبهشت")) ;
                                            else if($(".pwt-btn-switch").text().includes("Khordad"))
                                                $(".pwt-btn-switch").text($(".pwt-btn-switch").text().replace("Khordad" , "خرداد").replace("Khordad" , " ").replace("1399" , " ").replace("۱۳۹۹ خرداد  خرداد" , "۱۳۹۹ خرداد")) ;
                                            else if($(".pwt-btn-switch").text().includes("Farvardin"))
                                                $(".pwt-btn-switch").text($(".pwt-btn-switch").text().replace("ّFarvardin" , "قروردین").replace("Farvardin" , " ").replace("1399" , " ").replace("۱۳۹۹ فروردین  فروردین" , "۱۳۹۹ فروردین")) ;
                                            else if($(".pwt-btn-switch").text().includes("Tir"))
                                                $(".pwt-btn-switch").text($(".pwt-btn-switch").text().replace("Tir" , "تیر").replace("Tir" , " ").replace("1399" , " ").replace("۱۳۹۹ تیر  تیر" , "۱۳۹۹ تیر")) ;
                                            else if($(".pwt-btn-switch").text().includes("Mordad"))
                                                $(".pwt-btn-switch").text($(".pwt-btn-switch").text().replace("Mordad" , "مرداد").replace("Mordad" , " ").replace("1399" , " ").replace("۱۳۹۹ مرداد  مرداد" , "۱۳۹۹ مرداد")) ;
                                            else if($(".pwt-btn-switch").text().includes("Shahrivar"))
                                                $(".pwt-btn-switch").text($(".pwt-btn-switch").text().replace("Shahrivar" , "شهریور").replace("Shahrivar" , " ").replace("1399" , " ").replace("۱۳۹۹ شهریور  شهریور" , "۱۳۹۹ شهریور")) ;
                                            else if($(".pwt-btn-switch").text().includes("Mehr"))
                                                $(".pwt-btn-switch").text($(".pwt-btn-switch").text().replace("Mehr" , "مهر").replace("Mehr" , " ").replace("1399" , " ").replace("۱۳۹۹ مهر  مهر" , "۱۳۹۹ مهر")) ;
                                            else if($(".pwt-btn-switch").text().includes("Aban"))
                                                $(".pwt-btn-switch").text($(".pwt-btn-switch").text().replace("Aban" , "آبان").replace("Aban" , " ").replace("1399" , " ").replace("۱۳۹۹ آبان  آبان" , "۱۳۹۹ آبان")) ;
                                            else if($(".pwt-btn-switch").text().includes("Azar"))
                                                $(".pwt-btn-switch").text($(".pwt-btn-switch").text().replace("Azar" , "آذر").replace("Azar" , " ").replace("1399" , " ").replace("۱۳۹۹ آذر  آذر" , "۱۳۹۹ آذر")) ;
                                            else if($(".pwt-btn-switch").text().includes("Dey"))
                                                $(".pwt-btn-switch").text($(".pwt-btn-switch").text().replace("Dey" , "دی").replace("Dey" , " ").replace("1399" , " ").replace("۱۳۹۹ دی  دی" , "۱۳۹۹ دی")) ;
                                            else if($(".pwt-btn-switch").text().includes("Bahman"))
                                                $(".pwt-btn-switch").text($(".pwt-btn-switch").text().replace("Bahman" , "بهمن").replace("Bahman" , " ").replace("1399" , " ").replace("۱۳۹۹ بهمن  بهمن" , "۱۳۹۹ بهمن")) ;
                                            else if($(".pwt-btn-switch").text().includes("Esfand"))
                                                $(".pwt-btn-switch").text($(".pwt-btn-switch").text().replace("Esfand" , "اسفند").replace("Esfand" , " ").replace("1399" , " ").replace("۱۳۹۹ اسفند  اسفند" , "۱۳۹۹ اسفند")) ;
                                            else {
                                                //nothing to do
                                            }
                                        });
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
                <div class="container">
                    <div class="row" style="text-align: center ; margin: 0 auto">
                        <div class="col-6" style="text-align: center ; margin: 0 auto">
                            کتاب های پیشنهادی به شما
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row" style="text-align: center ; margin: 0 auto">

                        @foreach($result as $res)
                            <div class="col-6" style="text-align: center ; margin: 0 auto">
                                <a href="{{$res->id}}">{{$res->name}} , {{$res->author}}</a>
                            </div>
                        @endforeach
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
