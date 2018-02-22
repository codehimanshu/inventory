<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;
use App\Category;
use App\Stock;
use App\Log;
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

            $log = new Log;
            $log->subcategory_id = $categories[$key];
            $log->to = "stock";
            $log->qty = $quantities[$key];
            $log->costing = $costings[$key];
            $log->amount = $amounts[$key];
            $log->save();
        }
        return redirect('/stockReport');
    }

    public function stockReport() {
        if(Auth::user()->role != 1)
            return redirect('/home');
        $stocks = Stock::with('subcategory')->get();
        return view('stockReport', compact('stocks'));
    }

    public function tosite() {
        $categories = SubCategory::get();
        return view('tosite', compact('categories'));
    }

    public function saveToSite(Request $request) {
        $categories = $request->category;
        $sites = $request->site;
        $quantities = $request->quantity;
        $costings = $request->costing;
        $amounts = $request->amount;
        $dates = $request->date;
        $errors = [];
        foreach ($categories as $key => $category) {
            $cat = $categories[$key];
            $categories[$key] = substr($categories[$key],0,strpos($categories[$key], '.'));
            $stock = Stock::where('subcategory_id',$categories[$key])->get();
            if(count($stock) ==0){
                array_push($errors, $cat . $quantity[$key] );
                continue;
            }else
                $stock = $stock[0];
            if($sites[$key] == "Site 1"){
                if($categories[$key]!="" && $dates[$key]!=""){
                    if($stock->stock_qty >= (int)$quantities[$key]){
                        $stock->stock_qty -= $quantities[$key];
                        $stock->site1_qty += $quantities[$key];
                        $stock->site1_amt += max($amounts[$key], $quantities[$key]*$costings[$key]);
                        $stock->dated = $dates[$key];
                        $stock->save();
                    }else if($quantities[$key] == 0){
                        $stock->site1_amt += max($amounts[$key], $quantities[$key]*$costings[$key]);
                        $stock->dated = $dates[$key];
                        $stock->save();
                    }else{
                        echo "2";
                        array_push($errors, $cat . $quantity[$key] );
                        continue;
                    }
                }
            }else {
                if($categories[$key]!="" && $dates[$key]!=""){
                    if($stock->stock_qty >= (int)$quantities[$key]){
                        $stock->stock_qty -= $quantities[$key];
                        $stock->site2_qty += $quantities[$key];
                        $stock->site2_amt += max($amounts[$key], $quantities[$key]*$costings[$key]);
                        $stock->dated = $dates[$key];
                        $stock->save();
                    }else if($quantities[$key] == 0){
                        $stock->site2_amt += max($amounts[$key], $quantities[$key]*$costings[$key]);
                        $stock->dated = $dates[$key];
                        $stock->save();
                    }else{
                        echo $stock->stock_qty;
                        array_push($errors, $cat . $quantities[$key] );
                        continue;
                    }
                }
            }
        }
        return redirect('/tosite')->with($errors);
    }

    public function site1Report() {
        if(Auth::user()->role != 1)
            return redirect('/home');
        $stocks = Site1::get();
        return view('site1Report', compact('stocks'));
    }

    public function site2Inventory() {
        $categories = SubCategory::get();
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
