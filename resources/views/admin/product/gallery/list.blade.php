@component('admin.layouts.content',['title'=>'لیست تصاویر'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">خانه</a></li>
        <li class="breadcrumb-item active">لیست تصاویر </li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لیست تصاویر </h3>
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
                                <a class="btn btn-success" href="{{route('admin.products.create')}}">ایجا تصاویر</a>
                            </div>
                        @endcan
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>تصاویر</th>
                            <th>توضیحات</th>
                            <th>تاریخ ایجاد</th>
                            @canany('edit_product','delete_product')
                                <th>اقدامات</th>
                            @endcan
                        </tr>
                        @foreach($images as $image)
                            <tr>
                                <td><img class="img-thumbnail" width="100px" height="100px" src="{{$image->image}}" alt="{{$image->alt}}"></td>
                                <td>{{$image->alt}}</td>
                                <td>{{jdate($image->created_at)->format('%d %B %Y')}}</td>
                                @canany('edit_product','delete_product','gallery_product')
                                    <td style="display: flex">
                                        @can('edit_product')
                                            <form action="{{route('admin.products.edit',$image->id)}}">
                                                <button type="submit" class="btn btn-sm btn-info ml-2">ویرایش</button>
                                            </form>
                                        @endcan
                                        @can('delete_product')
                                            <form action="{{route('admin.products.gallery.destroy',['product'=>$product->id,'gallery'=>$image->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger ml-2">حذف</button>
                                            </form>
                                        @endcan
                                        @can('gallery_product')
                                            <form action="{{route('admin.products.gallery.index',$image->id)}}">
                                                <button type="submit" class="btn btn-sm btn-warning ml-2">گالری تصاویر</button>
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
                    {{$images->render()}}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endcomponent
