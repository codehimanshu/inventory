<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Stock;
use App\Site1;
use App\Site2;
use Auth;

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
        if(Auth::user()->role != 1)
            return redirect('/home');
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
        $stocks = Stock::get();
        return view('stockReport', compact('stocks'));
    }

    public function site1Inventory() {
        $categories = Category::get();
        return view('site1Inventory', compact('categories'));
    }

    public function saveSite1Inventory(Request $request) {
        if(Auth::user()->role != 1)
            return redirect('/home');
        $categories = $request->category;
        $costings = $request->costing;
        $quantities = $request->quantity;
        $dates = $request->date;
        foreach ($categories as $key => $category) {
            $stock = new Site1;
            if($categories[$key]!="" && $costings[$key]!="" && $quantities[$key]!="" && $dates[$key]!="" )
            $stock->category = $categories[$key];
            $stock->costing = $costings[$key];
            $stock->quantity = $quantities[$key];
            $stock->dated = $dates[$key];
            $stock->save();
        }
        return redirect('/site1Report');
    }

    public function site1Report() {
        $stocks = Site1::get();
        return view('site1Report', compact('stocks'));
    }

    public function site2Inventory() {
        $categories = Category::get();
        return view('site2Inventory', compact('categories'));
    }

    public function saveSite2Inventory(Request $request) {
        if(Auth::user()->role != 1)
            return redirect('/home');
        $categories = $request->category;
        $costings = $request->costing;
        $quantities = $request->quantity;
        $dates = $request->date;
        foreach ($categories as $key => $category) {
            $stock = new Site2;
            if($categories[$key]!="" && $costings[$key]!="" && $quantities[$key]!="" && $dates[$key]!="" )
            $stock->category = $categories[$key];
            $stock->costing = $costings[$key];
            $stock->quantity = $quantities[$key];
            $stock->dated = $dates[$key];
            $stock->save();
        }
        return redirect('/site2Report');
    }

    public function site2Report() {
        $stocks = Site2::get();
        return view('site2Report', compact('stocks'));
    }
}
