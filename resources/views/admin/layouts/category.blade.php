@foreach($category->child as $child)
    <tr class="category_child">
        <td><span style="background-color: #78e08f;color: #FFFFFF;padding: 4px;border-radius: 3px">{{$child->name}}</span></td>
        <td>{{$child->created_at}}</td>
        <td style="display: flex">
            <form action="{{route('admin.categories.edit',$child->id)}}">
                <button type="submit" class="btn btn-sm btn-info ml-2">ویرایش</button>
            </form>
            <form action="{{route('admin.categories.destroy',$child->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger ml-2">حذف</button>
            </form>
        </td>
    </tr>
    @if($child->child)
        @include('admin.layouts.category',['category'=>$child])
    @endif
@endforeach
