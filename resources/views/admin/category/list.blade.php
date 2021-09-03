@component('admin.layouts.content',['title'=>'دسته بندی'])
    @slot('head')
        <style>
            .category_child{
                background-color: #dfe6e9;
            }
        </style>
    @endslot
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">خانه</a></li>
        <li class="breadcrumb-item active">لیست دسته بندی ها</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لیست دسته بندی ها</h3>
                    <div class="card-tools d-flex">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="btn-group-sm mr-2">
                            <a class="btn btn-success" href="{{route('admin.categories.create')}}">ایجا دسته بندی</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>نام دسته بندی</th>
                            <th>تاریخ ایجاد</th>
                            <th>اقدامات</th>
                        </tr>
                        @foreach($categories as $category)
                            <tr>
                                <td><span style="background-color: #474787;color: #FFFFFF;padding: 4px;border-radius: 3px">{{$category->name}}</span></td>
                                <td>{{$category->created_at}}</td>
                                <td style="display: flex">
                                    <form action="{{route('admin.categories.edit',$category->id)}}">
                                        <button type="submit" class="btn btn-sm btn-info ml-2">ویرایش</button>
                                    </form>
                                    <form action="{{route('admin.categories.destroy',$category->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger ml-2">حذف</button>
                                    </form>
                                </td>
                            </tr>
                            @include('admin.layouts.category',['category'=>$category])
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $categories->appends(['search'=>request('search')])->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endcomponent
