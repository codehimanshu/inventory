@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <center><h2>Warehouse Stock</h2></center>
		<div class="col-md-10 col-md-offset-1" style="overflow-x:auto;">
	        <span style="float: right;"><h3>Total Cost: {{ $total_amt }}</h3></span>
			<table class="table datatable hover table-striped display" id="table2excel">
			    <thead>
			        <tr>
			            <th>S No</th>
			            <th>Category</th>
			            <th>Quantity</th>
			            <th>Amount</th>
			            <th>Dated</th>
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
            <center><input type="submit" class="form-control btn btn-primary" id="export" style="width: 100px;" name="submit" value="Download"></center>
		</div>
	</div>
</div>
@endsection
