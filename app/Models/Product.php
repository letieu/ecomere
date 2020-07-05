<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["name","price","img","writer","describe","category_id"];
    public function category(){
        return $this->belongsTo("App\Models\Category");
    }
    public function scopeCategory($query,$request){
        if ($request->has('category')){
            if ($request->category == 0){
                return;
            }
            $query->where('category_id',$request->category);
        }
        return $query;
    }
    public function scopePrice($query,$request){
        if ($request->has('price')){
            $query->where('price','<',$request->price);
        }
        return $query;
    }
    public function scopeName($query,$request){
        if ($request->has('name')){
            $query->where('name','like',"%$request->name%");
        }
        return $query;
    }
}
