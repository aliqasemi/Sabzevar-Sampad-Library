@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">داشبورد</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Auth::user()->first_name }}  جان خوش آمدید
                    <br>
                    چه کاری میخواهید انجام دهید؟
                        <div id="accordion">
                            @can('isAdmin')
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            اضافه کردن کتاب
                                                        </button>
                                                    </h5>
                                                </div>

                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                    <div class="card-body">
                                                        برای اضاه کردن کتاب دکمه زیر را بفشارید:
                                                        <br>
                                                        <br>
                                                        <a href="/add-book-form" class="btn btn-primary">اضافه کردن کتاب</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingThree">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            باز پس گیری کتاب
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                    <div class="card-body">
                                                        برای باز پس گیری کتاب دکمه زیر را بفشارید:
                                                        <br>
                                                        <br>
                                                        <a href="#" class="btn btn-primary">اضافه کردن کتاب</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            قرض کتاب

                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                    <div class="card-body">
                                                        برای قرض گرفتن(رزرو) کتاب دکمه زیر را بفشارید:
                                                        <br>
                                                        <br>
                                                        <a href="#" class="btn btn-primary">اضافه کردن کتاب</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapseOne">
                                                            لیست کتاب ها
                                                        </button>
                                                    </h5>
                                                </div>

                                                <div id="collapse4" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                    <div class="card-body">
                                                        برای دیدن لیست کتاب دکمه زیر را بفشارید:
                                                        <br>
                                                        <br>
                                                        <a href="/book_list" class="btn btn-primary">لیست کتاب</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingThree">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapseThree">
                                                            لیست امانت ها
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapse5" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                    <div class="card-body">
                                                        برای باز برای دیدن لیست امانت ها دکمه زیر را بفشارید:
                                                        <br>
                                                        <br>
                                                        <a href="#" class="btn btn-primary">لیست امانت کتاب</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @else
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                قرض کتاب

                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            برای قرض گرفتن(رزرو) کتاب دکمه زیر را بفشارید:
                                            <br>
                                            <br>
                                            <a href="#" class="btn btn-primary">اضافه کردن کتاب</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
