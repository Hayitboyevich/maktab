<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
{
    public function category()
    {
    	return view('categories.category');
    }

    public function category_store(Request $request)
    {
    	$category = new Category;
    	$category->category = $request->category;
    	$category->save();
    	return redirect('/category')->with('session', 'Category Added Successfully');

    }
}
