<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Clothes;
use Illuminate\Http\Request;

class ClothesController extends Controller
{
    public function index(){
        $clothes=Clothes::all();
        return view('adm.clothes',['clothes'=>$clothes]);
    }
}
