<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Permission;
use App\Models\product;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:show_products')->only('index');
        $this->middleware('can:edit_product')->only('edit','update');
        $this->middleware('can:delete_product')->only('destroy');
        $this->middleware('can:create_product')->only('create','store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::query();
        $products=$product->orderBy('id','DESC')->paginate(10);
        return view('admin.product.list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>['required','max:255','string'],
            'description'=>['required','string'],
            'price'=>['required','integer'],
            'inventory'=>['required','integer'],
            'categories'=>['required'],
            'image'=>['required'],
            'attributes'=>'array',
        ]);
        $product=auth()->user()->products()->create($data);
        $product->categories()->sync($data['categories']);
        $attributes=collect($data['attributes']);
        $attributes->each(function ($item) use ($product){
            if (is_null($item['name']) || is_null($item['value'])) return;
            $attr=Attribute::firstOrCreate([
                'name'=>$item['name']
            ]);
            $val=AttributeValue::firstOrCreate([
                'value'=>$item['value'],
                'attribute_id'=>$attr->id
            ]);
            $product->attributes()->attach($attr->id,['value_id'=>$val->id]);
        });
        return redirect(route('admin.products.index'));
    }
    public function ProductValues(Request $request): \Illuminate\Http\JsonResponse
    {
        $data=$request->validate([
            'value'=>'required',
            'attribute_id'=>'required',
        ]);
        AttributeValue::create($data);
        return response()->json([
            'success'=>'Ok'
        ]);
    }
    public function ProductLoadValues(Request $request){
        $attr=Attribute::find($request['attribute_id']);
        return json_encode($attr->values);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, product $product)
    {
        $data=$request->validate([
            'name'=>'required','max:255','string',
            'description'=>'required','string',
            'price'=>'required','integer',
            'inventory'=>'required','integer',
        ]);
        if ($request->file('image')):
            $request->validate([
                'image'=>'image','mimes:jpg,jpeg,png','max:1024'
            ]);
            if (File::exists(public_path($product->image))):
                File::delete(public_path($product->image));
            endif;
            $name = $this->getName($request);
            $data['image']='/img'.'/'.$name;
        endif;
        $product->update($data);
        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(product $product)
    {
        $product->delete();
        return back();
    }

    /**
     * @param Request $request
     * @return string
     */
    private function getName(Request $request): string
    {
        $file = $request->file('image');
        $name = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img'), $name);
        return $name;
    }
}
