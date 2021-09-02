@component('admin.layouts.content',['title'=>'لیست نظرات'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">خانه</a></li>
        <li class="breadcrumb-item active">لیست نظرات تایید شده</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لیست نظرات تایید شده</h3>
                    <div class="card-tools d-flex">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>id</th>
                            <th>نام کاربر</th>
                            <th>کامنت</th>
                            <th>تاریخ ارسال</th>
                            @canany('delete_comment','approved_comment')
                                <th>اقدامات</th>
                            @endcan
                        </tr>
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{$comment->id}}</td>
                                <td>{{$comment->user->name}}</td>
                                <td>{{$comment->comment}}</td>
                                <td>{{jdate($comment->created_at)->format('%d %B %Y')}}</td>
                                @can('delete_comments')
                                    <td style="display: flex">
                                            <form action="{{route('admin.comments.destroy',$comment->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger ml-2">حذف</button>
                                            </form>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{$comments->render()}}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endcomponent
