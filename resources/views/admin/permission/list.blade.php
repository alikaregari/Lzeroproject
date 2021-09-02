@component('admin.layouts.content',['title'=>'لیست کاربران'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">خانه</a></li>
        <li class="breadcrumb-item active">لیست دسترسی ها</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لیست دسترسی ها</h3>

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
                            <a class="btn btn-success" href="{{route('admin.permissions.create')}}">ایجا دسترسی</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>نام دسترسی</th>
                            <th>توصیحات</th>
                            <th>تاریخ ایجاد</th>
                            @canany('edit_permission','delete_permission')
                            <th>اقدامات</th>
                            @endcan
                        </tr>
                        @foreach($permissions as $permission)
                            <tr>
                                <td><span style="background-color: #218c74;color: #FFFFFF;padding: 4px;border-radius: 3px">{{$permission->name}}</span></td>
                                <td>{{$permission->label}}</td>
                                <td>{{$permission->created_at}}</td>
                                @canany('edit_permission','delete_permission')
                                    <td style="display: flex">
                                        @can('edit_permission')
                                            <form action="{{route('admin.permissions.edit',$permission->id)}}">
                                                <button type="submit" class="btn btn-sm btn-info ml-2">ویرایش</button>
                                            </form>
                                        @endcan
                                        @can('delete_permission')
                                            <form action="{{route('admin.permissions.destroy',$permission->id)}}" method="post">
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
                    {{$permissions->render()}}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endcomponent
