@component('admin.layouts.content',['title'=>'ویرایش مقام'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.rules.index')}}">لیست مقام</a></li>
        <li class="breadcrumb-item active">ویرایش مقام</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">فرم ویرایش مقام</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('admin.rules.update',$rule->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">نام</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="inputEmail3" placeholder="نام را وارد کنید" value="{{old('name') ?? $rule->name}}">
                                @error('name')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">ایمیل</label>
                            <div class="col-sm-10">
                                <input name="label" type="text" class="form-control @error('label') is-invalid @enderror" id="inputEmail3" placeholder="ایمیل را وارد کنید" value="{{old('label') ?? $rule->label}}">
                                @error('label')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">دسترسی ها</label>
                            <select name="permissions[]" class="form-control" multiple>
                                @foreach(\App\Models\Permission::all() as $permission)
                                    <option value="{{$permission->id}}" {{in_array($permission->id,$rule->permissions()->pluck('id')->toArray()) ? 'selected' :''}}>{{$permission->name}} - {{$permission->label}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ویرایش</button>
                        <a href="{{route('admin.rules.index')}}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endcomponent
