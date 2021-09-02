@extends('layouts.master')
@section('content')
    <!--hero section start-->

    <section class="position-relative">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row  text-center">
                <div class="col">
                    <h1>ثبت نام</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                            <li class="breadcrumb-item"><a class="text-dark" href="#">خانه</a>
                            </li>
                            <li class="breadcrumb-item">صفحات</li>
                            <li class="breadcrumb-item">حساب کاربری</li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">ثبت نام</li>
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

        <section class="register">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8 col-md-12">
                        <div class="mb-6"> <span class="badge badge-primary-soft p-2">
                  <i class="la la-exclamation ic-3x rotation"></i>
              </span>
                            <h2 class="mt-3">ثبت نام ساده و آسان</h2>
                            <p class="lead">ما از جدیدترین فناوری هایی استفاده می کنیم که همه نیاز های مشتریان را حتماا برطرف خواهد کرد.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                        <div class="register-form text-center">
                            <form method="post" action="{{route('register')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="نام" required="required" data-error="فیلد نام ضروری است.">
                                            @error('name')<div class="help-block with-errors">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="ایمیل" required="required" data-error="فیلد ایمیل ضروری است.">
                                            @error('email')<div class="help-block with-errors">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="رمز عبور" required="required" data-error="فیلد رمز عبور ضروری است.">
                                            @error('password')<div class="help-block with-errors">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="تایید رمز عبور" required="required" data-error="فیلد تایید رمز عبور ضروری است ضروری است.">
                                            @error('password_confirmation')<div class="help-block with-errors">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <select class="form-control">
                                                 <option selected>جنسیت</option>
                                                 <option value="male">مرد</option>
                                                 <option value="female">زن</option>
                                             </select>
                                             <div class="help-block with-errors"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <select class="form-control">
                                                 <option value="کشور">انتخاب کشور...</option>
                                                 <option value="IR">ایران</option>
                                                 <option value="TU">ترکیه</option>
                                                 <option value="IRG">عراق</option>
                                             </select>
                                             <div class="help-block with-errors"></div>
                                         </div>
                                     </div>
                                 </div>--}}
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <div class="remember-checkbox clearfix mb-5">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">من کلیه قوانین سایت راست چین را خوانده ام و آن را تایید میکنم</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary">ایجاد حساب کاربری</button>
                                        <span class="mt-4 d-block">حساب کاربری دارید؟ <a href="login.html"><i>ورود</i></a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--login end-->

    </div>

@endsection
