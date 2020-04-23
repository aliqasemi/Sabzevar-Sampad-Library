@extends('layouts.app')
@if(Auth::check())
@section('content')
    <style>

    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">لیست اعضا</div>
                    <div class="card-body">
                        <div class="list-group">
                            <table class="table table-hover" id="table">
                                <thead class="bg-dark">
                                <tr>
                                    <th class="text-info">نام کاربری کاربر</th>
                                    <th class="text-info">نوع کاربر در سیستم</th>
                                    <th class="text-warning">نام خانوادگی</th>
                                    <th class="text-primary">نام</th>
                                    <th class="text-info">مشاهده جزییات</th>

                                </tr>
                                </thead>
                            </table>
                            <script>
                                $(function() {
                                    $('#table').DataTable({
                                        processing: true,
                                        serverSide: true,
                                        ajax: '{{ url('user_data') }}',
                                        columns: [
                                            { data: 'name', name: 'name' },
                                            { data: 'user_type', name: 'user_type' },
                                            { data: 'last_name', name: 'last_name' },
                                            { data: 'first_name', name: 'first_name' },
                                            { data: 'id', render: function(data){
                                                    data = '<a href="/user-detail/' + data + '">     جزییات            </a>';
                                                    return data;
                                                } },
                                        ] ,
                                        language:{
                                            "sEmptyTable":     "هیچ داده‌ای در جدول وجود ندارد",
                                            "sInfo":           "نمایش _START_ تا _END_ از _TOTAL_ ردیف",
                                            "sInfoEmpty":      "نمایش 0 تا 0 از 0 ردیف",
                                            "sInfoFiltered":   "(فیلتر شده از _MAX_ ردیف)",
                                            "sInfoPostFix":    "",
                                            "sInfoThousands":  ",",
                                            "sLengthMenu":     "     _MENU_ ",
                                            "sLoadingRecords": "در حال بارگزاری...",
                                            "sProcessing":     "در حال پردازش...",
                                            "sSearch":         "",
                                            "sZeroRecords":    "رکوردی با این مشخصات پیدا نشد",
                                            "oPaginate": {
                                                "sFirst":    "برگه‌ی نخست",
                                                "sLast":     "برگه‌ی آخر",
                                                "sNext":     "بعدی",
                                                "sPrevious": "قبلی"
                                            },
                                            "oAria": {
                                                "sSortAscending":  ": فعال سازی نمایش به صورت صعودی",
                                                "sSortDescending": ": فعال سازی نمایش به صورت نزولی"
                                            }
                                        }
                                    });
                                });
                                $(document).ready(function(){
                                    $('input').addClass('form-control') ;
                                    $('input').attr("placeholder" , "عبارت خود را جستو جو کنید") ;
                                    $('input').css("text-align" , "center") ;
                                    $('select').addClass('form-control') ;
                                });
                            </script>
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
                        <div class="card-header">لیست کاربران</div>
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
