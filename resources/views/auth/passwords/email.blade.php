@extends('layouts.master')

@section('content')
    <!--hero section start-->

    <section class="position-relative">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row  text-center">
                <div class="col">
                    <h1>فراموشی رمز عبور</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                            <li class="breadcrumb-item"><a class="text-dark" href="#">خانه</a>
                            </li>
                            <li class="breadcrumb-item">صفحات</li>
                            <li class="breadcrumb-item">حساب کاربری</li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">فراموشی رمز عبور</li>
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
                            <div class="text-center mb-5">
                                <h2>فراموشی رمز عبور</h2>
                                <p>لطفا ایمیل خود را برای ریست رمز عبور بنویسید.</p>
                            </div>
                            <form method="post" action="{{route('password.email')}}">
                                @csrf
                                @if(session('status'))
                                    <div class="alert alert-success">{{session('status')}}</div>
                                @endif
                                <div class="form-group">
                                    <label>آدرس ایمیل</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required="required" placeholder="ایمیل" data-error="فیلد ایمیل ضروری است.">
                                    @error('email')<div class="help-block with-errors">{{$message}}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <div class="g-recaptcha @error('g-recaptcha-response') is-invalid @enderror" data-sitekey="{{env('GOOGLE_RECAPTCHA_SITE_KEY')}}"></div>
                                    @error('g-recaptcha-response')<div class="help-block with-errors">{{$message}}</div>@enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">ارسال</button>
                            </form>
                            {{--<div class="mt-4 text-center">
                                <a class="link-title" href="signup.html">برو لاگین 1</a>
                            </div>--}}
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
