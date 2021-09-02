@component('admin.layouts.content',['title'=>'لیست کاربران'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">خانه</a></li>
        <li class="breadcrumb-item active">لیست محصولات </li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لیست محصولات </h3>
                    <div class="card-tools d-flex">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        @can('create_product')
                            <div class="btn-group-sm mr-2">
                                <a class="btn btn-success" href="{{route('admin.products.create')}}">ایجا محصولات</a>
                            </div>
                        @endcan
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>نام محصولات</th>
                            <th>قیمت</th>
                            <th>موجودی</th>
                            <th>تاریخ ایجاد</th>
                            @canany('edit_product','delete_product')
                                <th>اقدامات</th>
                            @endcan
                        </tr>
                        @foreach($products as $product)
                            <tr>
                                <td><span style="background-color: #227093;color: #FFFFFF;padding: 4px;border-radius: 3px">{{$product->name}}</span></td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->inventory}}</td>
                                <td>{{jdate($product->created_at)->format('%d %B %Y')}}</td>
                                @canany('edit_product','delete_product')
                                    <td style="display: flex">
                                        @can('edit_product')
                                            <form action="{{route('admin.products.edit',$product->id)}}">
                                                <button type="submit" class="btn btn-sm btn-info ml-2">ویرایش</button>
                                            </form>
                                        @endcan
                                        @can('delete_product')
                                            <form action="{{route('admin.products.destroy',$product->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger ml-2">حذف</button>
                                            </form>
                                        @endcan

                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{$products->render()}}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endcomponent
