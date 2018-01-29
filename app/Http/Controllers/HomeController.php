<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Stock;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function stockInventory() {
        $categories = Category::get();
        return view('stockInventory', compact('categories'));
    }

    public function saveStockInventory(Request $request) {
        $categories = $request->category;
        $tosites = $request->tosite;
        $costings = $request->costing;
        $quantities = $request->quantity;
        $dates = $request->date;
        foreach ($categories as $key => $category) {
            $stock = new Stock;
            if($categories[$key]!="" && $tosites[$key]!="" && $costings[$key]!="" && $quantities[$key]!="" && $dates[$key]!="" )
            $stock->category = $categories[$key];
            $stock->tosite = $tosites[$key];
            $stock->costing = $costings[$key];
            $stock->quantity = $quantities[$key];
            $stock->dated = $dates[$key];
            $stock->save();
        }
        return redirect('/stockReport');
    }

    public function stockReport() {
        return;
    }
}
