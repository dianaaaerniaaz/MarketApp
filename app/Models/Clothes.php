<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothes extends Model
{
    use HasFactory;

    protected $fillable = ['type','brand','color','price','category_id','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function usersCart(){
        return $this->belongsToMany(User::class,'cloth_user')
            ->withPivot('number','size')
            ->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
