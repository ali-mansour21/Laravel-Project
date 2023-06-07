<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategorieController extends Controller
{
    public function create(){
        return view('admin.categorie.create');
    }
    public function store(Request $request,Category $category){
        $data = $request->validate([
            'name'=>['required',Rule::unique('categories','name'),'max:20'],
            'slug'=>['required',Rule::unique('categories','slug'),'max:20']
        ]);
        $category->create($data);
        return back()->with('success','Categorie Added');
    }
}
