<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $brands;
    private $brand;

    public function create(){
        return view('admin.brand.create');
    }

    public function store(Request $request){
        Brand::storeBrand($request);
        return redirect()->back()->with('message', 'Brand created Successfully');
    }

    public function manage(){
        $this->brands = Brand::orderBy('id', 'DESC')->get();
        return view('admin.brand.manage', ['brands' => $this->brands]);
    }

    public function edit($id){
        $this->brand = Brand::find($id);
        return view('admin.brand.edit', ['brand' => $this->brand]);
    }

    public function update(Request $request, $id){
        Brand::updateBrand($request, $id);
        return redirect()->route('manage.brand')->with('message', 'Brand Updated Successfully');
    }

    public function delete($id){
        Brand::deleteBrand($id);
        return redirect()->route('manage.brand')->with('message', 'Brand Deleted Successfully');
    }



}
