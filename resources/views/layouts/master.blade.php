<!DOCTYPE html>
<html lang="en">

<head>

    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="bootstrap 4, premium, multipurpose, sass, scss, saas" />
    <meta name="description" content="Bootstrap 4 Landing Page Template" />
    <meta name="author" content="www.themeht.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Title -->
    <title>بوتس لند - قالب خلاق صفحه لندینگ HTML</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico" />

    <!-- inject css start -->

    <link href="/assets/css/theme-plugin.css" rel="stylesheet" />
    <link href="/assets/css/theme.min.css" rel="stylesheet" />

    <!-- inject css end -->

</head>

<body>

<!-- page wrapper start -->

<div class="page-wrapper">

    <!-- preloader start -->

    <div id="ht-preloader">
        <div class="loader clear-loader">
            <span></span>
            <p>TcIdea.Ir</p>
        </div>
    </div>

    <!-- preloader end -->


    <!--header start-->

    <header class="site-header">
        <div id="header-wrap">
            <div class="container">
                <div class="row">
                    <!--menu start-->
                    <div class="col d-flex align-items-center justify-content-between"> <a class="navbar-brand logo text-dark h2 mb-0" href="{{route('index')}}">
                            TC <span class="text-primary font-weight-bold">Idea.</span>
                        </a>
                        <nav class="navbar navbar-expand-lg navbar-light mr-auto">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="تغییر ناوبری"> <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item"> <a class="nav-link {{is_Active('index','active')}}" href="{{route('index')}}">خانه</a>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link" href="#">صفحات</a>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link {{is_Active('product_index','active')}}" href="{{route('product_index')}}">فروشگاه</a>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link" href="#">ویژگی ها</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        @if(auth()->check())
                            <a class="btn btn-info mr-8 d-none d-lg-block" href="{{url('/contact')}}">خوش آمدید {{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
                            <a class="btn btn-info mr-2 d-none d-lg-block" href="{{route('profile')}}">پروفایل</a>
                            @if(auth()->user()->Is_Super_User() || auth()->user()->Is_Staff_User())
                                <a class="btn btn-info mr-2 d-none d-lg-block" href="{{route('admin.dashboard')}}">ادمین</a>
                            @endif
                            <form method="post" action="{{route('logout')}}">
                                @csrf
                                <button class="btn btn-danger mr-2 d-none d-lg-block">خروج</button>
                            </form>
                        @else
                            <a class="btn btn-dark mr-8 d-none d-lg-block" href="{{route('login')}}">ورود</a>
                        @endif
                    </div>
                    <!--menu end-->
                </div>
            </div>
        </div>
    </header>

    <!--header end-->


    <!--hero section start-->
    @yield('content')


    <footer class="py-11 bg-primary position-relative" data-bg-img="assets/images/bg/03.png">
        <div class="shape-1" style="height: 150px; overflow: hidden;">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 271.49,-50.00 500.00,49.98 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: #fff;"></path>
            </svg>
        </div>
        <div class="container mt-11">
            <div class="row">
                <div class="col-12 col-lg-5 col-xl-4 ml-auto mb-6 mb-lg-0">
                    <div class="subscribe-form bg-warning-soft p-5 rounded">
                        <h5 class="mb-4 text-white">خبرنامه</h5>
                        <h6 class="text-light">عضویت در خبرنامه ما</h6>
                        <form id="mc-form" class="group">
                            <input type="email" value="" name="EMAIL" class="email form-control" id="mc-email" placeholder="آدرس ایمیل" required="" style="height: 60px;">
                            <input class="btn btn-outline-light btn-block mt-3 mb-2" type="submit" name="subscribe" value="عضویت">
                        </form> <small class="text-light">با عضویت رایگان، یک ماه بروز باشید.</small>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="row">
                        <div class="col-12 col-sm-4 navbar-dark">
                            <h5 class="mb-4 text-white">صفحات</h5>
                            <ul class="navbar-nav list-unstyled mb-0">
                                <li class="mb-3 nav-item"><a class="nav-link" href="about-us-1.html">درباره</a>
                                </li>
                                <li class="mb-3 nav-item"><a class="nav-link" href="product-grid.html">فروشگاه</a>
                                </li>
                                <li class="mb-3 nav-item"><a class="nav-link" href="faq.html">سوالات متداول</a>
                                </li>
                                <li class="mb-3 nav-item"><a class="nav-link" href="blog-card.html">وبلاگ</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="contact-us.html">تماس با ما</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-4 mt-6 mt-sm-0 navbar-dark">
                            <h5 class="mb-4 text-white">خدمات</h5>
                            <ul class="navbar-nav list-unstyled mb-0">
                                <li class="mb-3 nav-item"><a class="nav-link" href="#">نویسنده محتوا</a>
                                </li>
                                <li class="mb-3 nav-item"><a class="nav-link" href="#">اسناد</a>
                                </li>
                                <li class="mb-3 nav-item"><a class="nav-link" href="login.html">حساب کاربری</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="career.html">شغل</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-4 mt-6 mt-sm-0 navbar-dark">
                            <h5 class="mb-4 text-white">قوانین</h5>
                            <ul class="navbar-nav list-unstyled mb-0">
                                <li class="mb-3 nav-item"><a class="nav-link" href="terms-and-conditions.html">شرایط سایت</a>
                                </li>
                                <li class="mb-3 nav-item"><a class="nav-link" href="privacy-policy.html">حریم خصوصی</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#">پشتیبانی</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 col-sm-6">
                            <a class="footer-logo text-white h2 mb-0" href="index.html">
                                tc<span class="font-weight-bold">idea.</span>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 mt-6 mt-sm-0">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a class="text-light ic-2x" href="#"><i class="la la-facebook"></i></a>
                                </li>
                                <li class="list-inline-item"><a class="text-light ic-2x" href="#"><i class="la la-dribbble"></i></a>
                                </li>
                                <li class="list-inline-item"><a class="text-light ic-2x" href="#"><i class="la la-instagram"></i></a>
                                </li>
                                <li class="list-inline-item"><a class="text-light ic-2x" href="#"><i class="la la-twitter"></i></a>
                                </li>
                                <li class="list-inline-item"><a class="text-light ic-2x" href="#"><i class="la la-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-white text-center mt-8">
                <div class="col">
                    <hr class="mb-8">کپی رایت - کلیه حقوق محفوظ است 1399 <u><a class="text-white" href="#">تی ان پلاگین</a></u> | همیشه در خدمت شماست</div>
            </div>
        </div>
    </footer>

    <!--footer end-->

</div>

<!-- page wrapper end -->


<!--back-to-top start-->

<div class="scroll-top"><a class="smoothscroll" href="#top"><i class="las la-angle-up"></i></a></div>

<!--back-to-top end-->

<!-- inject js start -->
<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('assets/js/theme-plugin.js')}}"></script>
<script src="{{asset('assets/js/theme-script.js')}}"></script>
@yield('script')
@include('sweet::alert')
<!-- inject js end -->

</body>


</html>
