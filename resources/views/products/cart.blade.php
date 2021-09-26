@extends('layouts.master')
@section('content')
    <!--hero section start-->

    <section class="position-relative">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row  text-center">
                <div class="col">
                    <h1>سبد محصولات</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                            <li class="breadcrumb-item"><a class="text-dark" href="#">خانه</a>
                            </li>
                            <li class="breadcrumb-item">فروشگاه</li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">سبد محصولات</li>
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
                    <div class="col">
                        <div class="table-responsive">
                                    <table class="cart-table table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">محصول</th>
                                            <th scope="col">قیمت</th>
                                            <th scope="col">تعداد</th>
                                            <th scope="col">مجموع</th>
                                            <th scope="col">پاک کردن</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cart as $item)
                                            <tr>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <a href="#">
                                                            <img class="img-fluid mr-lg-2 mb-2 mb-lg-0" src="assets/images/product-thumb/01.jpg" alt="">
                                                        </a>
                                                        <div class="media-body text-left">
                                                            <p class="mb-0">{{$item['product']->name}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 id="price" class="mb-0">{{$item['product']->price}} تومان</h5>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <button onclick="UpdateCart_C('{{$item['id']}}')" class="btn-product btn-product-up"> <i class="ti-minus"></i>
                                                        </button>
                                                        <input id="quantity" onchange="UpdateCart(event,'{{$item['id']}}')" class="form-product" type="number" name="form-product" value="{{$item['quantity']}}" min="1" max="3">
                                                        <button onclick="UpdateCart_C('{{$item['id']}}')" class="btn-product btn-product-down"> <i class="ti-plus"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="mb-0">{{$item['product']['price'] * $item['quantity']}} تومان</h5>
                                                </td>
                                                <td>
                                                    <button onclick="Delete('{{$item['id']}}')" class="btn btn-primary btn-sm"><i class="ti-close"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                        </div>
                    </div>
                </div>

                    <div class="row mt-8">
                        <div class="col-lg-6">
                            <div class="row mb-5">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <button class="btn btn-primary btn-sm btn-block">بروز رسانی سبد</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-outline-primary btn-sm btn-block">لغو</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="text-black h4" for="coupon">تخفیف</label>
                                    <p>کد تخفیف خود را سریع استفاده کنید.</p>
                                </div>
                                <div class="col-md-8 mb-3 mb-md-0">
                                    <input class="form-control py-3" id="coupon" placeholder="کد تخفیف" type="text">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-primary btn-sm px-4">اعمال کد تخفیف</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 pl-5 mt-5 mt-lg-0">
                            <div class="row justify-content-end">
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-12 text-left border-bottom mb-5">
                                            <h3 class="text-black h4 text-uppercase">مجموع سبد</h3>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <span class="text-black">جمع</span>
                                        </div>
                                        <div class="col-md-6 text-left">
                                            @php
                                                $totalPrice=\app\Helpers\Cart\Cart::all()->sum(function ($cart){
                                                  return $cart['price'] * $cart['quantity'];
                                                });
                                            @endphp
                                            <strong class="text-black">{{$totalPrice}} تومان</strong>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-md-6">
                                            <span class="text-black">کل خرید</span>
                                        </div>
                                        <div class="col-md-6 text-left">
                                            <strong class="text-black">{{$totalPrice+5500}} تومان</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a class="btn btn-primary btn-md btn-block" href="product-checkout.html">پرداخت</a>
                                            <a class="btn btn-outline-primary btn-md btn-block" href="#">ادامه خرید</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </section>

    </div>

    <!--body content end-->


@endsection
@section('script')
    <script>
    function UpdateCart(event,id,cart = null){
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                'Content-Type' : 'application/json'
            }
        });
        $.ajax({
            type : 'POST',
            url : '/cart/quantity/change',
            data : JSON.stringify({
                quantity:event.target.value,
                id:id,
                btn:false,
                /*cart:cart,*/
                _method:'patch'
            }),
            success : function(res) {
                location.reload()
            }
        });
    }
    function UpdateCart_C(id){
        var quantity=$("#quantity").val();
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                'Content-Type' : 'application/json'
            }
        });
        $.ajax({
            type : 'POST',
            url : '/cart/quantity/change',
            data : JSON.stringify({
                quantity:quantity,
                btn:true,
                id:id,
                /*cart:cart,*/
                _method:'patch'
            }),
            success : function(res) {
                location.reload()
            }
        });
    }
    function Delete(id){
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                'Content-Type' : 'application/json'
            }
        });
        $.ajax({
            type : 'POST',
            url : '/cart/delete',
            data : JSON.stringify({
                id:id,
                /*cart:cart,*/
                _method:'delete'
            }),
            success : function(res) {
                /*location.reload()*/
                console.log(res)
            }
        });
    }
    </script>
@endsection
