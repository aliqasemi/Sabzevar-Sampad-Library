@extends('layouts.app')
@if(Auth::check())
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">لیست امامت ها</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="list-group">
                            <a href="#" class="bg-dark text-white list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4 text-primary">تاریخ ثبت شفارش کتاب</span>
                                        <span class="col-lg-4 text-warning">تاریخ تحویل</span>
                                        <span class="col-lg-4 text-info">نام کتاب</span>
                                    </span>
                            </a>
                            @if($lending->ban_status == 0)
                                <a href="#" class="bg-primary list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4">{{$lending->lending_date}}</span>
                                        <span class="col-lg-4">{{$lending->return_date}}</span>
                                        <span class="col-lg-4">{{\App\book::find($lending->book_id)->name}}</span>
                                    </span>
                                </a>
                            @endif

                            <a href="#" class="bg-dark text-white list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4 text-primary">وضعیت سفارش</span>
                                        <span class="col-lg-4 text-warning">تاریخ ایجاد عملیات</span>
                                        <span class="col-lg-4 text-info">نام درخواست کننده سفارش</span>
                                    </span>
                            </a>

                            @if($lending->ban_status == 0)
                                <a href="#" class="bg-primary list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4">
                                            @if($lending->ban_status == 0)
                                                تایید نشده
                                            @elseif($lending->ban_status == 1)
                                                تایید سفارش
                                            @elseif($lending->ban_status == 1)
                                                تحویل داده شده
                                            @endif
                                        </span>
                                        <span class="col-lg-4">{{$lending->created_at}}</span>
                                        <span class="col-lg-4">{{\App\user::find($lending->user_id)->first_name}}&nbsp;{{\App\user::find($lending->user_id)->last_name}}</span>
                                    </span>
                                </a>
                            @endif

                            <a href="#" class="bg-dark text-white list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4 text-primary">تاریخ آخرین بروز رسانی</span>
                                        <span class="col-lg-4 text-primary">---</span>
                                        <span class="col-lg-4 text-primaryg">---</span>
                                    </span>
                            </a>
                            <a href="#" class="bg-primary list-group-item list-group-item-action">
                                    <span class="row">
                                        <span class="col-lg-4 text-white">
                                           {{$lending->updated_at}}
                                        </span>
                                        <span class="col-lg-4"></span>
                                        <span class="col-lg-4"></span>
                                    </span>
                            </a>
                            @can('isAdmin')
                            <a class="btn btn-black bg-info text-white" style="margin-top: 20px ;" href="/lending_update_form/{{$lending->id}}">تایید سفارش</a>
                            @elsecan('isSuperAdmin')
                             <a class="btn btn-black bg-info text-white" style="margin-top: 20px ;" href="/lending_update_form/{{$lending->id}}">تایید سفارش</a>
                            @endcan
                             <a class="btn btn-black bg-info text-white" style="margin-top: 20px ;" href="/lending_update/{{$lending->id}}" data-toggle="modal" data-target="#deleteModal">رد درخواست</a>

                            <!--modal for delete-->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="direction: rtl">
                                            <h5 class="modal-title" id="exampleModalLabel">حذف سفارش</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="direction: ltr">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="direction: rtl">
                                            آیا از حذف سفارش با شماره {{$lending->id}} به نام {{\App\user::find($lending->user_id)->first_name}}  {{\App\user::find($lending->user_id)->last_name}} به نام کتاب {{\App\book::find($lending->book_id)->name}} مطمين هستید؟
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
                                            <a type="button" class="btn btn-primary" href="/order_delete/{{$lending->id}}" >بله حذف کن</a>
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
                        <div class="card-header">لیست کتاب</div>
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
