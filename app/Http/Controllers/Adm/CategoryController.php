<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Clothes;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category){
        return view('adm.catindex', ['clothes' => $category->clothes,'categories' => Category::all()]);

    }
    public function create(){
        return view('adm.catcreate');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
        ]);

        Category::create($validated);
        return redirect()->route('adm.categories.index');
    }
    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('adm.users.index')->with('message', 'Clothes Deleted Successfully');

    }
}
