@extends('layouts.master')
@section('content')
    <!--hero section start-->

    <section class="position-relative">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row  text-center">
                <div class="col">
                    <h1>محصولات</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                            <li class="breadcrumb-item"><a class="text-dark" href="#">خانه</a>
                            </li>
                            <li class="breadcrumb-item">فروشگاه</li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">محصولات</li>
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
                    <div class="col-lg-9 col-md-12 order-lg-12">
                        <div class="row text-center">
                            @foreach($products as $product)
                                <div class="col-lg-4 col-md-6">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <img class="img-fluid" src="assets/images/product/01.jpg" alt="">
                                        </div>
                                        <div class="product-desc"> <a href="product-single.html" class="product-name mt-4 mb-2 d-block link-title">{{$product->name}}</a>
                                            <span class="product-price"><del class="text-muted">{{$product->price}} تومان </del>{{$product->price}} تومان </span>
                                            <div class="product-link mt-3">
                                                <a class="add-cart " href="{{route('product-single',$product->id)}}"> <i class="ti-bag ml-2"></i>مشاهده محصول</a>
                                                <a class="wishlist-btn" href="#"> <i class="ti-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{--<div class="col-lg-4 col-md-6">
                                <div class="product-item">
                                    <div class="product-img">
                                        <img class="img-fluid" src="assets/images/product/01.jpg" alt="">
                                    </div>
                                    <div class="product-desc"> <a href="product-single.html" class="product-name mt-4 mb-2 d-block link-title">کیف دستی زنانه</a>
                                        <span class="product-price"><del class="text-muted">4600 تومان</del> 2800 تومان</span>
                                        <div class="product-link mt-3">
                                            <a class="add-cart " href="#"> <i class="ti-bag ml-2"></i>افزودن به سبد</a>
                                            <a class="wishlist-btn" href="#"> <i class="ti-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}
                           {{-- <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
                                <div class="product-item">
                                    <div class="product-img">
                                        <img class="img-fluid" src="assets/images/product/02.jpg" alt="">
                                    </div>
                                    <div class="product-desc"> <a href="product-single.html" class="product-name mt-4 mb-2 d-block link-title">ساعت هوشمند سیاه</a>
                                        <span class="product-price"><del class="text-muted">4600 تومان</del> 2800 تومان</span>
                                        <div class="product-link mt-3">
                                            <a class="add-cart " href="#"> <i class="ti-bag ml-2"></i>افزودن به سبد</a>
                                            <a class="wishlist-btn" href="#"> <i class="ti-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
                                <div class="product-item">
                                    <div class="product-img">
                                        <img class="img-fluid" src="assets/images/product/03.jpg" alt="">
                                    </div>
                                    <div class="product-desc"> <a href="product-single.html" class="product-name mt-4 mb-2 d-block link-title">تی شرت چسبی مشتی</a>
                                        <span class="product-price"><del class="text-muted">4600 تومان</del> 2800 تومان</span>
                                        <div class="product-link mt-3">
                                            <a class="add-cart " href="#"> <i class="ti-bag ml-2"></i>افزودن به سبد</a>
                                            <a class="wishlist-btn" href="#"> <i class="ti-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mt-5">
                                <div class="product-item">
                                    <div class="product-img">
                                        <img class="img-fluid" src="assets/images/product/04.jpg" alt="">
                                    </div>
                                    <div class="product-desc"> <a href="product-single.html" class="product-name mt-4 mb-2 d-block link-title">کامپیوتر دسکتابی</a>
                                        <span class="product-price"><del class="text-muted">4600 تومان</del> 2800 تومان</span>
                                        <div class="product-link mt-3">
                                            <a class="add-cart " href="#"> <i class="ti-bag ml-2"></i>افزودن به سبد</a>
                                            <a class="wishlist-btn" href="#"> <i class="ti-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mt-5">
                                <div class="product-item">
                                    <div class="product-img">
                                        <img class="img-fluid" src="assets/images/product/05.jpg" alt="">
                                    </div>
                                    <div class="product-desc"> <a href="product-single.html" class="product-name mt-4 mb-2 d-block link-title">کیف شانه زنانه</a>
                                        <span class="product-price"><del class="text-muted">4600 تومان</del> 2800 تومان</span>
                                        <div class="product-link mt-3">
                                            <a class="add-cart " href="#"> <i class="ti-bag ml-2"></i>افزودن به سبد</a>
                                            <a class="wishlist-btn" href="#"> <i class="ti-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mt-5">
                                <div class="product-item">
                                    <div class="product-img">
                                        <img class="img-fluid" src="assets/images/product/06.jpg" alt="">
                                    </div>
                                    <div class="product-desc"> <a href="product-single.html" class="product-name mt-4 mb-2 d-block link-title">دوربین کانون</a>
                                        <span class="product-price"><del class="text-muted">4600 تومان</del> 2800 تومان</span>
                                        <div class="product-link mt-3">
                                            <a class="add-cart " href="#"> <i class="ti-bag ml-2"></i>افزودن به سبد</a>
                                            <a class="wishlist-btn" href="#"> <i class="ti-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}
                        </div>
                        <nav aria-label="..." class="mt-8">
                            <ul class="pagination">
                                <li class="page-item mr-auto"> <a class="page-link" href="#">قبلی</a>
                                </li>
                                <li class="page-item"><a class="page-link border-0 rounded text-dark" href="#">1</a>
                                </li>
                                <li class="page-item active" aria-current="page"> <a class="page-link border-0 rounded" href="#">2 <span class="sr-only">(جاری)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link border-0 rounded text-dark" href="#">3</a>
                                </li>
                                <li class="page-item"><a class="page-link border-0 rounded text-dark" href="#">...</a>
                                </li>
                                <li class="page-item"><a class="page-link border-0 rounded text-dark" href="#">5</a>
                                </li>
                                <li class="page-item ml-auto"> <a class="page-link" href="#">بعدی</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3 col-md-12 order-lg-1 sidebar">
                        <div>
                            <h4 class="mb-5">دسته ها</h4>
                            <ul class="list-unstyled list-group list-group-flush mb-5">
                                <li class="mb-4"> <a class="list-group-item list-group-item-action border-0 p-0" href="#">
                                        همه
                                        <span class="badge badge-primary-soft text-dark font-weight-normal p-2 badge-pill mr-2">74</span>
                                    </a>
                                </li>
                                <li class="mb-4"> <a class="list-group-item list-group-item-action border-0 p-0" href="#">
                                        مدل مردانه
                                        <span class="badge badge-primary-soft text-dark font-weight-normal p-2 badge-pill mr-2">23</span>
                                    </a>
                                </li>
                                <li class="mb-4"> <a class="list-group-item list-group-item-action border-0 p-0" href="#">
                                        مدل زنانه                 <span class="badge badge-primary-soft text-dark font-weight-normal p-2 badge-pill mr-2">14</span>
                                    </a>
                                </li>
                                <li class="mb-4"> <a class="list-group-item list-group-item-action border-0 p-0" href="#">
                                        مدل بچگانه
                                        <span class="badge badge-primary-soft text-dark font-weight-normal p-2 badge-pill mr-2">48</span>
                                    </a>
                                </li>
                                <li> <a class="list-group-item list-group-item-action border-0 p-0" href="#">
                                        مجموعه جدید
                                        <span class="badge badge-primary-soft text-dark font-weight-normal p-2 badge-pill mr-2">32</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-8">
                            <h4 class="mb-5">قیمت</h4>
                            <div>
                                <div id="slider-range"></div>
                                <input type="text" id="amount" readonly style="border:0;">
                            </div>
                        </div>
                        <div class="mt-8 filter-color">
                            <h4>رنگ</h4>
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
                        <div class="mt-8">
                            <h5 class="mb-5">اندازه</h5>
                            <div class="size-choose">
                                <ul class="list-inline">
                                    <li>
                                        <input name="sc" id="xs-size" type="radio">
                                        <label for="xs-size">XS</label>
                                    </li>
                                    <li>
                                        <input name="sc" id="s-size" type="radio">
                                        <label for="s-size">S</label>
                                    </li>
                                    <li>
                                        <input name="sc" id="m-size" checked="" type="radio">
                                        <label for="m-size">M</label>
                                    </li>
                                    <li>
                                        <input name="sc" id="l-size" type="radio">
                                        <label for="l-size">L</label>
                                    </li>
                                    <li>
                                        <input name="sc" id="xl-size" type="radio">
                                        <label for="xl-size">XL</label>
                                    </li>
                                    <li>
                                        <input name="sc" id="xxl-size" type="radio">
                                        <label for="xxl-size">XXL</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!--body content end-->
@endsection
