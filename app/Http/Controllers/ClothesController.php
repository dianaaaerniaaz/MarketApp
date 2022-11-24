<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Clothes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClothesController extends Controller
{
    public function cartindex(Clothes $clothes){

        $clothes = Auth::user()->clothesCart()->get();
        return view('clothes.cart',['clothes'=>$clothes]);
    }
    public function cart(Request $request,Clothes $clothes){
        $request->validate([
            'number'=>'required|min:1|max:10',
            'size'=>'required'
        ]);
        $clothCart = Auth::user()->clothesCart()->where('clothes_id', $clothes->id)->first();
        if($clothCart!=null){
            Auth::user()->clothesCart()->updateExistingPivot($clothes->id, ['number'=>$request->input('number'),'size'=>$request->input('size')]);
        }else{
            Auth::user()->clothesCart()->attach($clothes->id, ['number'=>$request->input('number'),'size'=>$request->input('size')]);
        }

        return back();
    }
    public function uncart(Clothes $clothes){
        $clcart = Auth::user()->clothesCart()->where('clothes_id',$clothes->id)->first();
        if($clcart!=null){
            Auth::user()->clothesCart()->detach($clothes->id);
            $clothes->usersCart()->detach();
        }
        return back()->with('message','Clothes deleted from the cart!');
    }

    public function index()
    {

        return view('clothes.index', ['clothes' => Clothes::all(), 'categories' => Category::all()]);
    }

    public function clothesByCategory(Category $category)
    {
        return view('clothes.index', ['clothes' => $category->clothes, 'categories' => Category::all()]);
    }

    public function create()
    {
        $this->authorize('create',Clothes::class);
        return view('clothes.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $this->authorize('create',Clothes::class);
        $validated = $request->validate([
           'brand' => 'required|min:3|max:255',
           'type' => 'required|min:3|max:255',
           'color' => 'required|min:3|max:255',
           'price' => 'required|numeric|min:0',
           'category_id' => 'required|numeric|exists:categories,id',
        ]);
        //Clothes::create($validated + ['user_id'=>Auth::user()->id]);
        Auth::user()->clothes()->create($validated);
        return redirect()->route('clothes.index')->with('message', 'Clothes Added Successfully');
    }

    public function show(Clothes $clothes)
    {
        //$comments = $clothes->comments();
        $myCart=0;
        $clothCart = Auth::user()->clothesCart()->where('clothes_id',$clothes->id)->first();
        if($clothCart != null)
            $myCart = $clothCart->pivot->number;
        return view('clothes.show', ['clothes' => $clothes,'category' => Category::find($clothes->category_id),'myCart'=>$myCart]);
    }

    public function edit(Clothes $clothes)
    {
        $this->authorize('update',$clothes);
        return view('clothes.edit', ['clothes' => $clothes,'categories' => Category::all()]);
    }

    public function update(Request $request, Clothes $clothes)
    {
        $validated = $request->validate([
            'brand' => 'required|min:3|max:255',
            'type' => 'required|min:3|max:255',
            'color' => 'required|min:3|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|numeric|exists:categories,id',
        ]);
        $clothes->update($validated);
        return redirect()->route('clothes.index')->with('message', 'Information about Clothing Updated Successfully');
    }

    public function destroy(Clothes $clothes)
    {
        //$this->authorize('delete',$clothes);
        $clothes->delete();
        return redirect()->route('clothes.index')->with('message', 'Clothes Deleted Successfully');
    }
}
