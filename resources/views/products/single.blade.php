@extends('layouts.master')
@section('content')

    <!--hero section start-->

    <section class="position-relative">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row  text-center">
                <div class="col">
                    <h1>تک محصول</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                            <li class="breadcrumb-item"><a class="text-dark" href="#">خانه</a>
                            </li>
                            <li class="breadcrumb-item">فروشگاه</li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">تک محصول</li>
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
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <ul id="imageGallery">
                            <li data-thumb="/assets/images/product/01.jpg" data-src="/assets/images/product/01.jpg">
                                <img class="img-fluid w-100" src="/assets/images/product/01.jpg" alt="" />
                            </li>
                            <li data-thumb="/assets/images/product/02.jpg" data-src="/assets/images/product/02.jpg">
                                <img class="img-fluid w-100" src="/assets/images/product/02.jpg" alt="" />
                            </li>
                            <li data-thumb="/assets/images/product/03.jpg" data-src="/assets/images/product/03.jpg">
                                <img class="img-fluid w-100" src="/assets/images/product/03.jpg" alt="" />
                            </li>
                            <li data-thumb="/assets/images/product/04.jpg" data-src="/assets/images/product/04.jpg">
                                <img class="img-fluid w-100" src="/assets/images/product/04.jpg" alt="" />
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 mt-5 mt-md-0">
                        <div class="product-details">
                            <h4>
                                {{$product->name}}
                            </h4>
                            <div class="product-price my-4"> <span class="d-block"> {{$product->price}} تومان <del>{{$product->price}} تومان</del></span>
                                <span class="text-primary">
                      <i class="ti-star"></i>
                      <i class="ti-star"></i>
                      <i class="ti-star"></i>
                      <i class="ti-star"></i>
                      <i class="ti-star"></i>
                    </span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><span class="text-black"> موجود: </span> در انبار</li>
                                <li><span class="text-black"> دسته بندی :</span> زنانه</li>
                            </ul>
                            <p>{{$product->text}}</p>
                            <div class="row my-4">
                                <div class="col-lg-3 col-sm-6">
                                    <h6 class="mb-2 text-black">اندازه</h6>
                                    <select class="custom-select shadow-none">
                                        <option selected>اندازه</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                    </select>
                                </div>
                                <div class="col-lg-9 col-sm-6 mt-3 mt-sm-0">
                                    <div class="filter-color">
                                        <h6>رنگ</h6>
                                        <ul class="list-inline">
                                            <li>
                                                <div class="form-check pl-0">
                                                    <input type="radio" class="form-check-input" id="color-filter1" name="ExampleRadios">
                                                    <label class="form-check-label" for="color-filter1" data-bg-color="#3cb371"></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check pl-0">
                                                    <input type="radio" class="form-check-input" id="color-filter2" name="ExampleRadios" checked>
                                                    <label class="form-check-label" for="color-filter2" data-bg-color="#4876ff"></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check pl-0">
                                                    <input type="radio" class="form-check-input" id="color-filter3" name="ExampleRadios">
                                                    <label class="form-check-label" for="color-filter3" data-bg-color="#0a1b2b"></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check pl-0">
                                                    <input type="radio" class="form-check-input" id="color-filter4" name="ExampleRadios">
                                                    <label class="form-check-label" for="color-filter4" data-bg-color="#f94f15"></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check pl-0">
                                                    <input type="radio" class="form-check-input" id="color-filter5" name="ExampleRadios">
                                                    <label class="form-check-label" for="color-filter5" data-bg-color="#e70fe4"></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check pl-0">
                                                    <input type="radio" class="form-check-input" id="color-filter6" name="ExampleRadios">
                                                    <label class="form-check-label" for="color-filter6" data-bg-color="#ffc300"></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <button class="btn-product btn-product-up"> <i class="ti-minus"></i>
                                </button>
                                <input class="form-product" type="number" name="form-product" value="1">
                                <button class="btn-product btn-product-down"> <i class="ti-plus"></i>
                                </button>
                            </div>
                            <div class="d-flex align-items-center mt-5">
                                <form action="{{route('add.cart')}}">
                                <button class="btn btn-primary ml-4"><i class="ti-bag mr-2"></i>افزودن به سبد</button>
                                </form>
                                <div class="product-link">
                                    <a class="wishlist-btn" href="#"> <i class="ti-heart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--tab start-->

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab">
                            <!-- Nav tabs -->
                            <nav>
                                <div class="nav nav-tabs border-0" id="nav-tab" role="tablist"> <a class="nav-item nav-link active ml-0" id="nav-tab1" data-toggle="tab" href="#tab3-1" role="tab" aria-selected="true">توضیحات</a>
                                    <a class="nav-item nav-link" id="nav-tab2" data-toggle="tab" href="#tab3-2" role="tab" aria-selected="false">اطلاعات اضافی</a>
                                    <a class="nav-item nav-link" id="nav-tab3" data-toggle="tab" href="#tab3-3" role="tab" aria-selected="false">نظرات ({{count($comments)}})</a>
                                </div>
                            </nav>
                            <!-- Tab panes -->
                            <div class="tab-content pt-5">
                                <div role="tabpanel" class="tab-pane fade show active" id="tab3-1">
                                    <h5 class="mb-3">توضیحات محصول</h5>
                                    <p class="mb-0">{{$product->text}}</p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab3-2">
                                    <h5 class="mb-3">اطلاعات اضافی</h5>
                                    <table class="table table-bordered mb-0">
                                        <tbody>
                                        <tr>
                                            <td>اندازه</td>
                                            <td>کوچک، متوسط، بزرگ، بسیار کوچک، بسیار بزرگ</td>
                                        </tr>
                                        <tr>
                                            <td>رنگ</td>
                                            <td>قرمز, آبی, سبز و سیاه</td>
                                        </tr>
                                        <tr>
                                            <td>اینج</td>
                                            <td>38 اینج</td>
                                        </tr>
                                        <tr>
                                            <td>عرض</td>
                                            <td>20 سانتی متر</td>
                                        </tr>
                                        <tr>
                                            <td>ارتفاع</td>
                                            <td>35 سانتی متر</td>
                                        </tr>
                                        <tr>
                                            <td>پارچه</td>
                                            <td>پنبه ، ابریشم و مصنوعی</td>
                                        </tr>
                                        <tr>
                                            <td>ضمانتنامه</td>
                                            <td>5 ماه</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab3-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="post-comments mt-5 pos-r">
                                                <div class="section-title mb-3">
                                                    <h5>نظرات</h5>
                                                </div>
                                                @guest()
                                                    <p class="alert alert-info">برای ارسال دیدگاه لطفا ابتدا وارد سایت شده یا یک حساب ایجاد کنید.</p>
                                                @endguest
                                                @auth()
                                                <form id="sendCommentForm" method="post" action="{{route('send.comment')}}">
                                                    @csrf
                                                    <input type="hidden" name="commentable_id" value="{{$product->id}}">
                                                    <input type="hidden" name="commentable_type" value="{{get_class($product)}}">
                                                    <input type="hidden" name="parent_id" value="0">
                                                    <div class="messages"></div>
                                                    <div class="form-group">
                                                        <textarea id="form_message" name="comment" class="form-control" placeholder="نوع نظر" rows="4" data-error="لطفا پیام بگذارید."></textarea>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mt-3">ارسال نظر</button>
                                                </form>
                                                @endauth
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="media-holder review-list mt-5">
                                                @include('layouts.comment',['comments'=>$comments])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--tab end-->

    </div>

    <!--body content end-->

@endsection
@section('script')
    <script>
        document.querySelector('#sendCommentForm').addEventListener('submit',function (event){
            event.preventDefault();
           let target=event.target;
           let data={
               commentable_id : target.querySelector('input[name="commentable_id"]').value,
               commentable_type: target.querySelector('input[name="commentable_type"]').value,
               comment: target.querySelector('textarea[name="comment"]').value,
               parent_id: target.querySelector('input[name="parent_id"]').value
            }
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':document.head.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type':'application/json'
                }
            });
            $.ajax({
                type:'POST',
                url:'/comment',
                data:JSON.stringify(data),
                success:function (data){
                    sweetAlert({
                        icon: 'success',
                        title: 'با تشکر',
                        timer: 2000,
                        text: 'دیدگاه شما با موفقیت ارسال شد',
                        showConfirmButton: false,
                    })
                    $("#form_message").val("");
                }
            })
        })
    </script>
@endsection
