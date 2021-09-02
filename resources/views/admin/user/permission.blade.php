@component('admin.layouts.content',['title'=>'ویرایش دسترسی ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">لیست کاربران</a></li>
        <li class="breadcrumb-item active">ویرایش دسترسی ها</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">فرم ویرایش دسترسی ها</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('admin.user.permissions.post',$user->id)}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">مقام ها</label>
                            <select name="rules[]" class="form-control" multiple>
                                @foreach(\App\Models\Rule::all() as $rule)
                                    <option value="{{$rule->id}}" {{in_array($rule->id,$user->rules->pluck('id')->toArray()) ? 'selected' : ''}}>{{$rule->name}} - {{$rule->label}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">دسترسی ها</label>
                            <select name="permissions[]" class="form-control" multiple>
                                @foreach(\App\Models\Permission::all() as $permission)
                                    <option value="{{$permission->id}}" {{in_array($permission->id,$user->permissions->pluck('id')->toArray()) ? 'selected' : ''}}>{{$permission->name}} - {{$permission->label}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ویرایش</button>
                        <a href="{{route('admin.user.index')}}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endcomponent
