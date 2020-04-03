@extends('layouts.app')
@if(Auth::check())
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">جزییات کتاب </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="list-group">
                            <a href="#" class="bg-dark text-white list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4 text-primary">نام کتاب</span>
                                        <span class="col-lg-4 text-primary">نام نویسنده</span>
                                        <span class="col-lg-4 text-primary">موضوع کتاب</span>
                                    </span>
                            </a>
                            <a href="#" class="bg-primary list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4 text-white">{{$book->name}}</span>
                                        <span class="col-lg-4 text-white">{{$book->author}}</span>
                                        <span class="col-lg-4 text-white">{{$book->subject}}</span>
                                    </span>
                            </a>
                            <!-- -->
                            <a href="#" class="bg-dark text-white list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4 text-primary">شماره شابک</span>
                                        <span class="col-lg-4 text-primary">تاریخ ایجاد کتاب</span>
                                        <span class="col-lg-4 text-primary">آخرین تاریخ بروز رسانی</span>
                                    </span>
                            </a>
                            <a href="#" class="bg-primary list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4 text-white">{{$book->shabak}}</span>
                                        <span class="col-lg-4 text-white">{{$book->created_at}}</span>
                                        <span class="col-lg-4 text-white">{{$book->updated_at}}</span>
                                    </span>
                            </a>
                            <!-- -->
                            <a href="#" class="bg-dark text-white list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4 text-primary">وضعیت کتاب</span>
                                        <span class="col-lg-4 text-primary">---</span>
                                        <span class="col-lg-4 text-primaryg">---</span>
                                    </span>
                            </a>
                            <a href="#" class="bg-primary list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4 text-white">
                                            @if($book->lended == 1)
                                                آزاد
                                            @else
                                                رزرو شده
                                            @endif
                                        </span>
                                        <span class="col-lg-4"></span>
                                        <span class="col-lg-4"></span>
                                    </span>
                            </a>

                            <a class="btn btn-black bg-info text-white" style="margin-top: 20px ;" href="/book_update_form/{{$book->id}}">ویرایش</a>

                            <a class="btn btn-black bg-info text-white" style="margin-top: 20px ;"  data-toggle="modal" data-target="#deleteModal">حذف</a>

                            <!--modal for delete-->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="direction: rtl">
                                            <h5 class="modal-title" id="exampleModalLabel">حذف کتاب</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="direction: ltr">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="direction: rtl">
                                            آیا از حذف کتاب {{$book->name}} مطمين هستید؟
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
                                            <a type="button" class="btn btn-primary" href="/book_delete/{{$book->id}}" >بله حذف کن</a>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
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
                        <div class="card-header">جزییات کتاب</div>
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
