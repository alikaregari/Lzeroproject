@component('admin.layouts.content',['title'=>'ویرایش مقام'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">لیست مقام</a></li>
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
                <form class="form-horizontal" action="{{route('admin.products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">اطلاعات</label>
                            <div class="col-sm-12">
                                <div class="col-sm-6" style="float: right">
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="inputEmail3" placeholder="نام محصول را وارد کنید" value="{{old('name') ?? $product->name}}">
                                    @error('name')<div class="invalid-feedback">{{$message}}</div> @enderror
                                </div>
                                <div class="col-sm-3" style="float: left">
                                    <input name="inventory" type="text" class="form-control @error('inventory') is-invalid @enderror" id="inputEmail3" placeholder="موجودی را وارد کنید" value="{{old('inventory') ?? $product->inventory}}">
                                    @error('inventory')<div class="invalid-feedback">{{$message}}</div> @enderror
                                </div>
                                <div class="col-sm-3" style="float: left">
                                    <input name="price" type="text" class="form-control @error('price') is-invalid @enderror" id="inputEmail3" placeholder="قیمت را وارد کنید" value="{{old('price') ?? $product->price}}">
                                    @error('price')<div class="invalid-feedback">{{$message}}</div> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">توضیحات</label>
                            <div class="col-sm-12">
                                <textarea rows="5" name="description" type="text" class="form-control @error('description') is-invalid @enderror" id="inputEmail3" placeholder="توضیحات را وارد کنید">{{old('description') ?? $product->name}}</textarea>
                                @error('label')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">تصویر شاخص</label>
                            <div class="col-sm-12">
                                <img style="display: block;margin: 0 auto" class="image mt-3 shadow-sm p-3 mb-5 bg-white rounded" alt="avatar" src="{{$product->image}}">
                                <hr>
                                <input name="image" type="file" class="form-control @error('image') is-invalid @enderror" value="{{old('image') ?? ''}}">
                                @error('image')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">افزودن ویژگی</label>
                            <div class="col-sm-12">
                                <span class="btn btn-sm btn-success" id="add_product_attribute">ویژگی جدید</span>
                            </div>
                            <div id="attribute_section">
                                @foreach($product->attributes as $attribute)
                                    <div class="row" id="attr_section-0">
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label>عنوان ویژگی</label>
                                                <select id="attribute_name_0" name="attributes[0][name]" class="attribute-select form-control">
                                                    <option value="">انتخاب کنید</option>
                                                    @foreach(\App\Models\Attribute::all() as $attr)
                                                        <option value="{{$attr->name}}" {{$attribute->name==$attr->name ? 'selected' : ''}}>{{$attr->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label>مقدار ویژگی</label>
                                                <select id="attribute_value_0" name="attributes[0][value]" class="attribute-select form-control">
                                                    <option value="">انتخاب کنید</option>
                                                    @foreach($attribute->values as $value)
                                                        <option value="{{$value->value}}" {{$value->id==$attribute->pivot->value_id ? 'selected' : ''}}>{{$value->value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <label >اقدامات</label>
                                            <div>
                                                <button type="button" class="btn btn-sm btn-warning" onclick="document.getElementById('attr_section-0').remove()">حذف</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ویرایش</button>
                        <a href="{{route('admin.products.index')}}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
    @slot('script')
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor 4
            // instance, using default configuration.
            CKEDITOR.replace( 'editor1' ,{filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
            document.addEventListener("DOMContentLoaded", function() {

                document.getElementById('button-image').addEventListener('click', (event) => {
                    event.preventDefault();

                    window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
                });
            });

            // set file link
            function fmSetLink($url) {
                document.getElementById('image_label').value = $url;
            }
            let add =({ attribute,values,id}) =>{
                return `
                <div class="row" id="attr_section-${id}">
                        <div class="col-5">
                            <div class="form-group">
                                 <label>عنوان ویژگی</label>
                                 <select id="attribute_name_${id}" name="attributes[${id}][name]" onchange="attributevaluget(${id})" class="attribute-select form-control">
                                    <option value="">انتخاب کنید</option>
                                    @foreach(\App\Models\Attribute::all() as $attr)
                <option value="{{$attr->name}}">{{$attr->name}}</option>
                                    @endforeach
                </select>
           </div>
       </div>
       <div class="col-5">
           <div class="form-group">
                <label>مقدار ویژگی</label>
                  <input id="attribute_value_${id}" name="attributes[${id}][value]" type="search" class="form-control"  placeholder="مقدار را وارد کنید">
                </div>
           </div>
            <div class="col-2">
               <label >اقدامات</label>
               <div>
                                <button type="button" class="btn btn-sm btn-warning" onclick="document.getElementById('attr_section-${id}').remove()">حذف</button>
                            </div>
                        </div>
                    </div>
                `
            }
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
            function attributevaluget(id){
                let atribute_section=$(`select[name='attributes[${id}][value]']`);
                let nameBox = $(`select[name='attributes[${id}][name]']`).val();
                let data={
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
                    url : '/admin/attribute/load_values',
                    data : JSON.stringify(data),
                    success : function(data) {
                        var value=data;
                        console.log(value);
                    }
                });
                /*atribute_section.append(
                    add_value({
                        id
                    })
                )*/
            }
            let add_value =({id}) =>{
                return `
                    <option value="">انتخاب کنید</option>
                    @foreach(\App\Models\AttributeValue::all() as $attr)
                <option value="{{$attr->id}}">{{$attr->value}}</option>
                    @endforeach
                `
            }
        </script>
    @endslot
@endcomponent
