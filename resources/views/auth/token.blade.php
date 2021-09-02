@extends('layouts.master')
@section('content')
    <!--hero section start-->

    <section class="position-relative">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row  text-center">
                <div class="col">
                    <h1>اعتبارسنجی شماره تلفن</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                            <li class="breadcrumb-item"><a class="text-dark" href="#">خانه</a>
                            </li>
                            <li class="breadcrumb-item">صفحات</li>
                            <li class="breadcrumb-item">شرکت</li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">تک شغل</li>
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

        <section>
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-12 col-md-12 col-lg-8 mb-8 mb-lg-0">
                        <div class="mb-8"> <span class="badge badge-primary p-2">
                  <i class="la la-bold ic-3x rotation"></i>
              </span>
                            <h2 class="mt-4">وارد کردن کد</h2>
                            <p class="lead mb-0">لطفا کد 6 رقمی ارسال شده به تلفن همراه خود را در کادر ذیل وارد کنید</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{route('check_token_login')}}">
                            @csrf
                            <div class="row">
                                <div style="display: block;margin: 0 auto" class="col-md-6 ">
                                    <div class="form-group">
                                        <input  type="number" name="token" value="{{old('token') ?? ''}}" class="form-control @error('token') is-invalid @enderror" placeholder="کد ارسالی">
                                        @error('token')<div class="help-block with-errors">{{$message}}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 text-center">
                                    <button class="btn btn-primary">تایید</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!--body content end-->


@endsection
