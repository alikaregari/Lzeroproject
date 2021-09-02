@component('admin.layouts.content',['title'=>'ایجاد کاربر'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">لیست مقام ها</a></li>
        <li class="breadcrumb-item active">ایجاد مقام</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">ایجاد مقام</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('admin.products.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">اطلاعات</label>
                            <div class="col-sm-12">
                            <div class="col-sm-6" style="float: right">
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="inputEmail3" placeholder="نام محصول را وارد کنید" value="{{old('name') ?? ''}}">
                                @error('name')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                            <div class="col-sm-3" style="float: left">
                                <input name="inventory" type="text" class="form-control @error('inventory') is-invalid @enderror" id="inputEmail3" placeholder="موجودی را وارد کنید" value="{{old('inventory') ?? ''}}">
                                @error('inventory')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                                <div class="col-sm-3" style="float: left">
                                    <input name="price" type="text" class="form-control @error('price') is-invalid @enderror" id="inputEmail3" placeholder="قیمت را وارد کنید" value="{{old('price') ?? ''}}">
                                    @error('price')<div class="invalid-feedback">{{$message}}</div> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">توضیحات</label>
                            <div class="col-sm-12">
                                <textarea name="description" type="text" class="form-control @error('description') is-invalid @enderror" id="inputEmail3" placeholder="توضیحات را وارد کنید" value="{{old('description') ?? ''}}"></textarea>
                                @error('label')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">تایید</button>
                        <a href="{{route('admin.products.index')}}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endcomponent
