<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public const USER = 1;
    public const MODERATOR = 2;
    public const ADMIN = 3;

    public function users(){
        return $this->hasMany(User::class);
    }
}
