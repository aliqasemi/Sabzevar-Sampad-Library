@extends('layouts.app')
@if(Auth::check())
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">جزییات کاربر </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="list-group">
                            <a href="#" class="bg-dark text-white list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4 text-primary">نام خانوادگی</span>
                                         <span class="col-lg-4 text-primary">نام کاربر</span>
                                        <span class="col-lg-4 text-primary">سطح کاربر</span>
                                    </span>
                            </a>
                            <a href="#" class="bg-primary list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4 text-white">{{$user->last_name}}</span>
                                        <span class="col-lg-4 text-white">{{$user->first_name}}</span>
                                        <span class="col-lg-4 text-white">{{$user->user_type}}</span>
                                    </span>
                            </a>
                            <!-- -->
                            <a href="#" class="bg-dark text-white list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4 text-primary">نام کاربری</span>
                                        <span class="col-lg-4 text-primary">ایمیل</span>
                                        <span class="col-lg-4 text-primary">نام پدر</span>
                                    </span>
                            </a>
                            <a href="#" class="bg-primary list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4 text-white">{{$user->name}}</span>
                                        <span class="col-lg-4 text-white">{{$user->email}}</span>
                                        <span class="col-lg-4 text-white">{{$user->father_name}}</span>
                                    </span>
                            </a>
                            <!-- -->
                            <a href="#" class="bg-dark text-white list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4 text-primary"> تلفن همراه</span>
                                        <span class="col-lg-4 text-primary">شماره همراه پدر</span>
                                        <span class="col-lg-4 text-primaryg">شغل پدر</span>
                                    </span>
                            </a>
                            <a href="#" class="bg-primary list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4 text-white">{{$user->father_name}}</span>
                                        <span class="col-lg-4 text-white">{{$user->father_mobile_number}}</span>
                                        <span class="col-lg-4">{{$user->father_job}}</span>
                                    </span>
                            </a>

                            <a href="#" class="bg-dark text-white list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4 text-primary"> تاریخ ایجاد رکورد</span>
                                        <span class="col-lg-4 text-primary">تاریخ آخرین اپدیت</span>
                                        <span class="col-lg-4 text-primaryg">تاریخ ایجاد کاربر</span>
                                    </span>
                            </a>
                            <a href="#" class="bg-primary list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4 text-white">{{$user->created_at}}</span>
                                        <span class="col-lg-4 text-white">{{$user->updated_at}}</span>
                                        <span class="col-lg-4">{{$user->registery_date}}</span>
                                    </span>
                            </a>
                        @can('isSuperAdmin')

                            <!--
                            <a class="btn btn-black bg-info text-white" style="margin-top: 20px ;" href="/user_update_form/{{$user->id}}">ویرایش</a>
                            !-->
                            <a class="btn btn-black bg-info text-white" href="/order_customer/{{$user->id}}" style="margin-top: 20px ;">لیست سفارشات ثبت نشده</a>
                            <a class="btn btn-black bg-info text-white" href="/lending_customer/{{$user->id}}" style="margin-top: 20px ;">لیست امانت ها</a>
                            <a class="btn btn-black bg-info text-white" href="/return_customer/{{$user->id}}" style="margin-top: 20px ;">لیست امانت های تمام شده</a>
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
                                                آیا از حذف کاربر {{$user->name}} مطمين هستید؟
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
                                                <a type="button" class="btn btn-primary" href="/user_delete/{{$user->id}}" >بله حذف کن</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @elsecan('isAdmin')
                                <a class="btn btn-black bg-info text-white" href="/order_customer/{{$user->id}}" style="margin-top: 20px ;">لیست سفارشات ثبت نشده</a>
                                <a class="btn btn-black bg-info text-white" href="/lending_customer/{{$user->id}}" style="margin-top: 20px ;">لیست امانت ها</a>
                                <a class="btn btn-black bg-info text-white" href="/return_customer/{{$user->id}}" style="margin-top: 20px ;">لیست امانت های تمام شده</a>
                        @endcan



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
