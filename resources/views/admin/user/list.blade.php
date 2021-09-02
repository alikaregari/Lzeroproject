@component('admin.layouts.content',['title'=>'لیست کاربران'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">خانه</a></li>
        <li class="breadcrumb-item active">لیست کاربران</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لیست کاربران</h3>

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
                            @can('user_create')
                                <a class="btn btn-success" href="{{route('admin.user.create')}}">ایجا کاربر</a>
                            @endcan
                            @can('show_staff_users')
                                    <a class="btn btn-warning" href="{{request()->fullUrlWithQuery(['admin'=>1])}}">مدیران</a>
                            @endcan

                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>آیدی</th>
                            <th>نام کاربر</th>
                            <th>ایمیل کاربر</th>
                            <th>تاریخ عضویت</th>
                            <th>وضعیت ایمیل</th>
                            @canany('staff_user_permissions','user_edit','user_delete')
                                <th>اقدامات</th>
                            @endcan
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                @if($user->email_verified_at)
                                    <td><span class="badge badge-success">تایید شده</span></td>
                                @else
                                    <td><span class="badge badge-danger">تایید نشده</span></td>
                                @endif
                                @canany('staff_user_permissions','user_edit','user_delete')
                                    <td style="display: flex">
                                        @can('staff_user_permissions')
                                            <form action="{{route('admin.user.permissions.get',$user->id)}}">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary ml-2">دسترسی</button>
                                            </form>
                                        @endcan
                                        @can('user_edit')
                                            <form action="{{route('admin.user.edit',$user->id)}}">
                                                <button type="submit" class="btn btn-sm btn-info ml-2">ویرایش</button>
                                            </form>
                                        @endcan
                                        @can('user_delete')
                                            <form action="{{route('admin.user.destroy',$user->id)}}" method="post">
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
                    {{$users->appends(['search'=>request('search')])->render()}}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endcomponent
