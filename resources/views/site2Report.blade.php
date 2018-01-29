@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <center><h2>Site 2</h2></center>
		<div class="col-md-10 col-md-offset-1">
			<table class="table" id="table2excel">
			    <thead>
			        <tr>
			            <th>S No</th>
			            <th>Category Name</th>
			            <th>Costing</th>
			            <th>Quantity</th>
			            <th>Dated</th>
			        </tr>
			    </thead>
			    <tbody>
			    	<?php $i=1; ?>
			    	@foreach($stocks as $stock)
			    		<tr>
			    			<td>{{$i++}}</td>
			    			<td>{{$stock->category}}</td>
			    			<td>{{$stock->costing}}</td>
			    			<td>{{$stock->quantity}}</td>
			    			<td>{{$stock->dated}}</td>
			    		</tr>
			    	@endforeach
			    </tbody>
			</table>
            <center><input type="submit" class="form-control" id="export" style="width: 100px;" name="submit" value="Download"></center>
		</div>
	</div>
</div>
@endsection
