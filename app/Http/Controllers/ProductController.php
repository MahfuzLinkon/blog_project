<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $categories;
    private $brands;
    private $products;
    private $product;

    public function create(){
        $this->categories = Category::where('status', 1)->orderBy('id', 'DESC')->get();
        $this->brands = Brand::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('admin.product.create', [
            'categories' => $this->categories,
            'brands' => $this->brands,
        ]);
    }

    public function store(Request $request){
        Product::storeProduct($request);
        return redirect()->back()->with('message', 'Product created Successfully');
    }

    public function manage(){
        $this->products = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('admin.product.manage', ['products' => $this->products]);
    }

    public function edit($id){
        $this->categories = Category::where('status', 1)->orderBy('id', 'DESC')->get();
        $this->brands = Brand::where('status', 1)->orderBy('id', 'DESC')->get();
        $this->product = Product::find($id);
        return view('admin.product.edit', [
            'product' => $this->product,
            'categories' => $this->categories,
            'brands' => $this->brands,
        ]);
    }

    public function update(Request $request, $id){
        Product::updateProduct($request, $id);
        return redirect()->route('manage.product')->with('message', 'Product Updated Successfully');
    }

    public function delete($id){
        Product::deleteProduct($id);
        return redirect()->route('manage.product')->with('message', 'Product Deleted Successfully');
    }



}
