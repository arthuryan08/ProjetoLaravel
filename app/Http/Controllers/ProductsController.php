<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function list(){
        $list = DB::select('SELECT * FROM products');

        return view('products.list', [
            'list' => $list
        ]);
    }
    
    public function new(){
        return view('products.new');
    }

    public function store(Request $request){
        if($request->filled('name') && $request->filled('price')){
            $name = $request->input('name');
            $price = $request->input('price');

            DB::insert('INSERT INTO products (name, price) VALUES (:name, :price)',[
                'name' => $name,
                'price' => $price
            ]);

            return redirect()->route('products.list');
        } else {
            return redirect()->route('products.new')->with('warning', 'Você não preencheu os campos!!😡');
        }
    }

    public function edit($id){
        $data = DB::select('SELECT *FROM products WHERE id = :id',[
            'id' => $id
        ]);

        if(count($data)>0){
            return view('products.edit',[
                'data'=>$data[0]
            ]);
        } else{
            return redirect()->route('products.list');
        }

    }

    public function editAction(Request $request, $id){
        if($request->filled('name') && $request->filled('price')){
            $name = $request->input('name');
            $price = $request->input('price');

            $data = DB::select('SELECT *FROM products WHERE id = :id',[
                'id' => $id
            ]);
    
            if(count($data)>0){
                DB::update('UPDATE products SET name = :name, price = :price WHERE id = :id',[
                    'id' => $id,
                    'name' => $name,
                    'price' => $price
                ]);
            } 
            return redirect()->route('products.list');
    
        } else {
            return redirect()->route('products.edit', ['id'=>$id])->with('warning', 'Você não preencheu os campos!!😡');
        }
    }

    public function del($id){
        Db::delete('DELETE FROM products WHERE id = :id', [
            'id' => $id
        ]);

        return redirect()->route('products.list');
    }

}
