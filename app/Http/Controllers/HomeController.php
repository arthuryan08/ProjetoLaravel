<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {   
        // Como adicionar um novo dado no banco com model
        $t = new Product;
        $t->name='Testando pelo Eloquent';
        $t->price='56.49';
        $t-> save();

        // $list = Product::find([1,3]);
        // //  echo $list->name;

        // foreach ($list as $item) {
        //     echo $item->name . "<br/>";
        // }

        // return view('welcome');
    }
}
