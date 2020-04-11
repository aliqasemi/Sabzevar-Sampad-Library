<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>sabzevar sampad library</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{URL::asset('CJ/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::asset('CJ/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('CJ/css/aos.css')}}" rel="stylesheet">
    <link href="{{URL::asset('CJ/css/dataTables.min.css')}}" rel="stylesheet">
    <script src="{{URL::asset('CJ/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('CJ/js/bootstrap.js')}}"></script>
    <script src={{URL::asset('CJ/js/dataTables.min.js')}}></script>

</head>
<body style="font-family: iransans ;  background: rgba(78,76,68,0.87) ;">
<div class="container-fluid" style=" background: rgba(78,76,68,0.87) ;">
    <div class="row " style="text-align: center ;  background: rgba(78,76,68,0.87) ;">



    </div>
</div>
<header class="bg-dark text-white" style="direction: rtl ; margin: 0 ; padding: 0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-9 col-xs-9">
                <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                    <a class="navbar-brand" href="/" style="color: rgba(237,237,237,0.49)">سیستم مدیریت کتابخانه سمپاد سبزوار</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav" style="text-align: center">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/">صفحه اصلی</a>
                            </li>
                            @if(Auth::check())
                                <li class="nav-item">
                                    <a  class="nav-link text-white" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        خروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-white" data-target="#register" href="/home">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>
                                </li>
                                @can('isAdmin')
                                    <li class="nav-item">
                                        <a class="nav-link text-white" data-target="#register" href="/register">ثبت نام</a>
                                    </li>
                                @endcan
                            @else
                                <li class="nav-item">
                                    <a class="nav-link text-white" data-target="#login" href="/home">ورود</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>


</header>
<main class="bg-light">
    <div style=" background: rgba(78,76,68,0.87) ; width: 100% ; height: auto; background-attachment: fixed ; background-repeat: no-repeat ; background-size: cover; text-align: center ;">
        @yield('content')
    </div>

</main>


<!--
<footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-4 col-sm-5 col-xs-12 ">
                    <h3> بیان نظرات </h3>
                    <ul>
                        <li> <a href="#"> 021-91027127 </a> </li>
                        <li> <a href="#"> info@sampad.ir </a> </li>
                        <li>
                            <div class="input-append newsletter-box text-center">
                                <input type="text" class="full text-center" placeholder="Email ">
                                <button class="btn  bg-gray btn-footer" type="button" style="margin-top: 10px ; color: black"> ثبت</button>
                            </div>
                        </li>
                    </ul>
                    <ul class="social">
                        <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li>
                        <li> <a href="#"> <i class="fab fa-twitter"> </i> </a> </li>
                        <li> <a href="#"> <i class="fab fa-google-plus">   </i> </a> </li>
                        <li> <a href="#"> <i class="fab fa-pinterest">   </i> </a> </li>
                        <li> <a href="#"> <i class="fab fa-youtube">   </i> </a> </li>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="container" style="text-align: center">
                        <p class="pull-left">استفاده غیر تجاری از اطلاعات خبری این وبسایت تنها با ذکر نام منبع بلامانع است، تمامی حقوق مادی و معنوی برای سمپاد محفوظ است  </p>
                    </div>
                </div>
            </div>

</div>

</div>



</footer>
-->
</body>
<script>
    //Shrink header on scroll
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            document.getElementById("header").style.fontSize = "30px";
        } else {
            document.getElementById("header").style.fontSize = "90px";
        }
    }
</script>
<script src="{{URL::asset('CJ/js/aos.js')}}"></script>
<script>
    AOS.init() ;
</script>
<link href="{{URL::asset('CJ/css/style.css')}}" rel="stylesheet">
<script src={{URL::asset('CJ/js/bootstrap-datepicker.js')}}></script>
<script src={{URL::asset('CJ/js/bootstrap-datepicker.fa.js')}}></script>
<script src={{URL::asset('CJ/js/script.js')}}></script>

<script>
    $("#datepicker").datepicker({
        changeMonth: true,
        changeYear: true
    });
</script>
<script>

    $("#datepicker1").datepicker({
        changeMonth: true,
        changeYear: true ,
    });


</script>
</html>

