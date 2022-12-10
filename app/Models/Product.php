<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $product;
    private static $uploadedImage, $imageName, $imageDirectory, $imageUrl;

    public static function getImageUrl($request){
        self::$uploadedImage = $request->file('image');
        self::$imageName = self::$uploadedImage->getClientOriginalName();
        self::$imageDirectory = 'upload/product/';
        self::$uploadedImage->move(self::$imageDirectory, self::$imageName);
        return self::$imageDirectory.self::$imageName;
    }

    public static function storeProduct($request){
        self::$product = new Product();
        self::$product->category_id = $request->category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->name = $request->name;
        self::$product->price = $request->price;
        if ($request->file('image')){
            self::$product->image = self::getImageUrl($request);
        }else{
            self::$product->image = null;
        }
        self::$product->description = $request->description;
        self::$product->status = $request->status;
        self::$product->save();
    }

    public static function updateProduct($request, $id){
        self::$product = Product::find($id);
        if ($request->file('image')){
            if (file_exists(self::$product->image)){
                unlink(self::$product->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }else{
            self::$imageUrl = self::$product->image;
        }
        self::$product->category_id = $request->category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->name = $request->name;
        self::$product->price = $request->price;
        self::$product->image = self::$imageUrl;
        self::$product->description = $request->description;
        self::$product->status = $request->status;
        self::$product->save();

    }
    public static function deleteProduct($id){
        self::$product = Product::find($id);
        if (file_exists(self::$product->image)){
            unlink(self::$product->image);
        }
        self::$product->delete();
    }




//    Relation
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }







}
