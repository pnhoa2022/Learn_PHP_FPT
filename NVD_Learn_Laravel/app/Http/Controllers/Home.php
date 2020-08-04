<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class Home extends Controller
{
    public function index() {
        //insert Data
        $product = new Product();
        $product->title = "Dong Ho";
        $product->des = "Mo ta";

        $product->save();

        $data = array(
            "id" => '1',
            "name" => 'Hieu'
        );

        return view('home.index', $data);
    }
}
