<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    private $products ;
    private $product ;

    public function home(){
        $this->products = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('frontend.home.home', ['products' => $this->products]);
    }

    public function details($id){
        $this->product = Product::find($id);
        return view('frontend.product.details', ['product' => $this->product]);
    }









}
