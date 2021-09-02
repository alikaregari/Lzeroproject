@extends('layouts.master')
@section('content')
    <!--hero section start-->

    <section class="position-relative">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row  text-center">
                <div class="col">
                    <h1>تک شغل</h1>
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
                            <h2 class="mt-4">تعین نوع ورود</h2>
                            <p class="lead mb-0">شما میتوانید نوع ورود خود را به 2 روش عادی و تایید 2 مرحله ای انتخاب کنید.برای تایید 2 مرحله ای نیزا است تا شماره تلفن خود را تایید نمایید</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{route('TowFactor_Changer')}}">
                            @csrf
                            <div class="messages"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="phone" type="text" name="phone_number" value="{{old('phone_number') ?? auth()->user()->phone_number}}" class="form-control @error('phone_number') is-invalid @enderror" placeholder="شماره تلفن">
                                        @error('phone_number')<div class="help-block with-errors">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="tow_factor_type" class="form-control">
                                            @foreach(config('towfactor.types') as $key => $value)
                                                <option value="{{$key}}" {{old('tow_factor_type') == $key || auth()->user()->tow_factor_type == $key ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                        </select>
                                        @error('tow_factor_type')<div class="help-block with-errors">{{$message}}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 text-center">
                                    <button class="btn btn-primary">بروزرسانی</button>
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
