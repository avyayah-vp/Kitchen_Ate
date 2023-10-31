<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    //
    public function showMenu() {
        $categories = DB::table('food_items')->get();
        return view('menu', ['categories' => $categories]);
    }
}
