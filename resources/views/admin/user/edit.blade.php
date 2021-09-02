@component('admin.layouts.content',['title'=>'ویرایش کاربر'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">لیست کاربران</a></li>
        <li class="breadcrumb-item active">ویرایش کاربر</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">فرم ویرایش کاربر</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('admin.user.update',$user->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">نام</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="inputEmail3" placeholder="نام را وارد کنید" value="{{old('name') ?? $user->name}}">
                                @error('name')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">ایمیل</label>
                            <div class="col-sm-10">
                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail3" placeholder="ایمیل را وارد کنید" value="{{old('email') ?? $user->email}}">
                                @error('email')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">پسورد</label>

                            <div class="col-sm-10">
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword3" placeholder="پسورد را وارد کنید">
                                @error('password')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">تایید پسوورد</label>

                            <div class="col-sm-10">
                                <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="inputPassword3" placeholder="تایید پسوورد را وارد کنید">
                                @error('password_confirmation')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>
                        @if(! $user->hasVerifiedEmail())
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="form-check">
                                        <input name="active" type="checkbox" class="form-check-input" id="exampleCheck2">
                                        <label class="form-check-label" for="exampleCheck2">فعال بودن ایمیل</label>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ویرایش کاربر</button>
                        <a href="{{route('admin.user.index')}}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endcomponent
