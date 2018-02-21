<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;
use App\Category;
use App\Stock;
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
        $categories = SubCategory::get();
        return view('stockInventory', compact('categories'));
    }

    public function saveStockInventory(Request $request) {
        $categories = $request->category;
        $quantities = $request->quantity;
        $costings = $request->costing;
        $amounts = $request->amount;
        $dates = $request->date;
        foreach ($categories as $key => $category) {
            $categories[$key] = substr($categories[$key],0,strpos($categories[$key], '.'));
            $stock = Stock::where('subcategory_id',$categories[$key])->get();
            if(count($stock) ==0){
                $stock = new Stock;
                $stock->subcategory_id = $categories[$key];
            }
            else
                $stock = $stock[0];
            if($categories[$key]!="" && $dates[$key]!="")
            $stock->stock_qty += $quantities[$key];
            $stock->stock_amt += max($amounts[$key], $quantities[$key]*$costings[$key]);
            $stock->dated = $dates[$key];
            $stock->save();
        }
        return redirect('/stockReport');
    }

    public function stockReport() {
        if(Auth::user()->role != 1)
            return redirect('/home');
        $stocks = Stock::get();
        return view('stockReport', compact('stocks'));
    }

    public function tosite() {
        $categories = Category::get();
        $comments = Stock::pluck('comment')->toArray();
        return view('tosite', compact('categories','comments'));
    }

    public function saveToSite(Request $request) {
        $categories = $request->category;
        $sites = $request->site;
        $costings = $request->costing;
        $quantities = $request->quantity;
        $comments = $request->comment;
        $dates = $request->date;
        $errors = [];
        foreach ($categories as $key => $category) {
            $stock = Stock::where('category',$categories[$key])->where('comment',$comments[$key])->get();
            if(count($stock)== 0){
                array_push($errors, $categories[$key] .  $comments[$key] . $quantity[$key] );
                continue;
            }
            if($sites[$key] == "Site 1"){
                if($categories[$key]!="" && $costings[$key]!="" && $quantities[$key]!="" && $dates[$key]!="" && $comments[$key]){
                    $tosite = Site1::where('category',$categories[$key])->where('comment',$comments[$key])->get();
                    if(count($tosite)!=0)
                        $tosite = $tosite[0];
                    else
                        $tosite = new Site1;
                    $stock->category = $categories[$key];
                    $stock->costing = $costings[$key];
                    $stock->quantity = $quantities[$key];
                    $stock->dated = $dates[$key];
                    $stock->save();                    
                }
            }else {
                
            }
        }
        return redirect('/site1Report');
    }

    public function site1Report() {
        if(Auth::user()->role != 1)
            return redirect('/home');
        $stocks = Site1::get();
        return view('site1Report', compact('stocks'));
    }

    public function site2Inventory() {
        $categories = Category::get();
        return view('site2Inventory', compact('categories'));
    }

    public function saveSite2Inventory(Request $request) {
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
        if(Auth::user()->role != 1)
            return redirect('/home');
        $stocks = Site2::get();
        return view('site2Report', compact('stocks'));
    }
}
