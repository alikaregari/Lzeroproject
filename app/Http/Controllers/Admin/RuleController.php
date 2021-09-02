<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:show_rules')->only('index');
        $this->middleware('can:edit_rule')->only('edit','update');
        $this->middleware('can:create_rule')->only('create','store');
        $this->middleware('can:delete_rule')->only('dlete');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
       $rule=Rule::query();
        if ($key=request('search')):
            $rule->where('name','LIKE',"%$key%")->orWhere('label','LIKE',"%$key%");
        endif;
       $rules=$rule->orderBy('id','DESC')->paginate(5);
       return view('admin.rule.list',compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.rule.create');
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
            'name'=>['string','required','max:255','unique:rules'],
            'label'=>['string','required','max:255'],
            'permissions'=>['array','required',]
        ]);
        $rule=Rule::create($data);
        $rule->permissions()->sync($data['permissions']);
        return redirect(route('admin.rules.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function show(Rule $rule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Rule $rule)
    {
        return view('admin.rule.edit',compact('rule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Rule $rule)
    {
        $data=$request->validate([
            'name'=>['string','required','max:255',\Illuminate\Validation\Rule::unique('rules')->ignore($rule->id)],
            'label'=>['string','required','max:255'],
            'permissions'=>['array','required',]
        ]);
        $rule->update($data);
        $rule->permissions()->sync($data['permissions']);
        return redirect(route('admin.rules.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Rule $rule)
    {
        $rule->delete();
        return redirect(route('admin.rules.index'));
    }
}
