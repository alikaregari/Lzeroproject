@component('admin.layouts.content',['title'=>'ایجاد محصول'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">لیست محصولات ها</a></li>
        <li class="breadcrumb-item active">ایجاد محصول</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">ایجاد محصول</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
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
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">دسته بندی ها</label>
                            <select name="categories[]" class="form-control" multiple>
                                @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">تصویر شاخص</label>
                            <input name="image" type="file" class="form-control @error('image') is-invalid @enderror" value="{{old('image') ?? ''}}">
                            @error('image')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">افزودن ویژگی</label>
                            <div class="col-sm-12">
                                <span class="btn btn-sm btn-success" id="add_product_attribute">ویژگی جدید</span>
                            </div>
                            <div id="attribute_section">
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
{{--    <select id="attribute_value_${id}" name="attributes[${id}][value]" class="attribute-select form-control"> <option value="0">انتخاب</option> </select>--}}
    @slot('script')
        <script>
            function search(id){
               /* let valueBox = $(`input[name='attributes[${id}][value]']`);*/
                let valueBox = $(`input[name='attributes[${id}][value]']`).val();
                let nameBox = $(`select[name='attributes[${id}][name]']`).val();
                let data={
                    value : valueBox,
                    attribute_id : nameBox,
                }
                $.ajaxSetup({
                    headers : {
                        'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type' : 'application/json'
                    }
                });
                $.ajax({
                    type : 'POST',
                    url : '/admin/attribute/values',
                    data : JSON.stringify(data),
                    success : function(data) {
                        alert('ویژگی با موفقیت اضافه گردید')
                    }
                });
            }
            let add =({ attribute,values,id}) =>{
                return `
                <div class="row" id="attr_section-${id}">
                        <div class="col-5">
                            <div class="form-group">
                                 <label>عنوان ویژگی</label>
                                 <select id="attribute_name_${id}" name="attributes[${id}][name]" onchange="attributevaluget(${id})" class="attribute-select form-control">
                                    <option value="0">انتخاب کنید</option>
                                    @foreach(\App\Models\Attribute::all() as $attr)
                                                <option value="{{$attr->id}}">{{$attr->name}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                 <label>مقدار ویژگی</label>
                                 <input id="attribute_value_${id}" name="attributes[${id}][value]" type="search" class="form-control"  placeholder="قیمت را وارد کنید">
                            </div>
                        </div>
                         <div class="col-2">
                            <label >اقدامات</label>
                            <div>
                                <button type="button" class="btn btn-sm btn-success" onclick="search(${id})">save</button>
                                <button type="button" class="btn btn-sm btn-warning" onclick="document.getElementById('attr_section-${id}').remove()">حذف</button>
                            </div>
                        </div>
                    </div>
                `
            }
            var tags="<a>sdasdasd</a>"
               $("#add_product_attribute").click(function () {
                   let attr_section=$("#attribute_section");
                   var id=attr_section.children().length;
                   attr_section.append(
                       add({
                           attribute : [],
                           values : [],
                           id
                       })
                   )
               })
        </script>
    @endslot
@endcomponent

