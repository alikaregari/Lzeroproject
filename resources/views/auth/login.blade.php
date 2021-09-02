@extends('layouts.master')
@section('content')
    <!--hero section start-->

    <section class="position-relative">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row  text-center">
                <div class="col">
                    <h1>لاگین</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                            <li class="breadcrumb-item"><a class="text-dark" href="#">خانه</a>
                            </li>
                            <li class="breadcrumb-item">صفحات</li>
                            <li class="breadcrumb-item">حساب کاربری</li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">لاگین</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- / .row -->
        </div>
        <!-- / .container -->
    </section>

    <!--hero section end-->


    <!--body content start-->

    <div class="page-content">

        <!--login start-->

        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-5">
                        <div>
                            <h2 class="text-center mb-3">لاگین</h2>
                            <a style="width: 100%" class="btn btn-danger mb-3" href="{{route('auth.google')}}">ورود با گوگل</a>
                            <form method="post" action="{{route('login')}}">
                                @csrf
                                <div class="messages"></div>
                                <div class="form-group">
                                    <label>نام کاربری</label>
                                    <input type="email" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="نام کاربری" required="required" data-error="فیلد نام کاربری ضروری است.">
                                    @error('email')<div class="help-block with-errors">{{$message}}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label>رمز عبور</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="رمز عبور" required="required" data-error="فیلد رمز عبور ضروری است.">
                                    @error('password')<div class="help-block with-errors">{{$message}}</div>@enderror
                                </div>
                                <div class="form-group mt-4 mb-5">
                                    <div class="remember-checkbox d-flex align-items-center justify-content-between">
                                        <div class="checkbox">
                                            <input type="checkbox" id="check2" name='remember'>
                                            <label for="check2">مرا به خاطر بسپار</label>
                                        </div>
                                        <a href="{{route('password.request')}}">فراموشی رمز عبور؟</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{--Recaotcha Component--}}
                                    <x-Recapcha></x-Recapcha>
                                    {{--Recaotcha Component--}}
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">لاگین کن</button>
                            </form>
                            <div class="d-flex align-items-center text-center justify-content-center mt-4">
                                <span class="text-muted mr-1">حساب کاربری ندارید؟</span>
                                <a href="{{route('register')}}">ثبت نام</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--login end-->

    </div>

    <!--body content end-->
@endsection
@section('script')
    <script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
@endsection
