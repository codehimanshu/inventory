@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        @if(session('success1'))
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="alert alert-success">
                      <strong>Success!</strong> Stock created.
                    </div>
                </div>
            </div>
        @endif
        <?php session()->forget('success1'); ?>
        <center><h2>Warehouse Stock</h2></center>
		<div class="col-md-10 col-md-offset-1" style="overflow-x:auto;">
	        <span style="float: right;"><h3>Total Cost: Rs. {{ $total_amt }}</h3></span>
			<table class="table datatable hover table-striped display" style="text-align: center;" id="table2excel">
			    <thead>
			        <tr style="text-align: center!important;">
			            <th style="text-align: center!important;">S No</th>
			            <th style="text-align: center!important;">Category</th>
			            <th style="text-align: center!important;">Quantity</th>
			            <th style="text-align: center!important;">Total Cost (in Rs)</th>
			            <th style="text-align: center!important;">Dated</th>
			        </tr>
			    </thead>
			    <tbody>
			    	<?php $i=1; ?>
			    	@foreach($stocks as $stock)
			    		<tr>
			    			<td>{{$i++}}</td>
			    			<td>{{$stock->subcategory->subcategory}} ({{$stock->subcategory->category->category}})</td>
			    			<td>{{$stock->stock_qty}}</td>
			    			<td>{{$stock->stock_amt}}</td>
			    			<td>{{$stock->dated}}</td>
			    		</tr>
			    	@endforeach
			    </tbody>
			</table>
			<br>
            <center><input type="submit" class="form-control btn btn-primary" id="export" style="width: 200px;margin-bottom: 40px;" name="submit" value="Download Report"></center>
		</div>
	</div>
</div>
@endsection
