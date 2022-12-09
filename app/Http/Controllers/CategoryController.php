<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categories;
    private $category;
    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        Category::storeCategory($request);
        return redirect()->back()->with('message', 'Category created Successfully');
    }

    public function manage(){
        $this->categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.category.manage', ['categories' => $this->categories]);
    }

    public function edit($id){
        $this->category = Category::find($id);
        return view('admin.category.edit', ['category' => $this->category]);
    }

    public function update(Request $request, $id){
        Category::updateCategory($request, $id);
        return redirect()->route('manage.category')->with('message', 'Category Updated Successfully');
    }

    public function delete($id){
        Category::deleteCategory($id);
        return redirect()->route('manage.category')->with('message', 'Category Deleted Successfully');
    }





}
