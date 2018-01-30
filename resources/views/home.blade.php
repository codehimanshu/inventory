@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card" style="background-color: #81d1f7; padding: 10px; border-radius: 5px;">
              <div class="card-block">
                <h4 class="card-title">Stock</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                @if(Auth::user()->role == 1)
                    <a href="{{ route('stockInventory') }}" class="card-link">Inventory</a>
                @endif
                <a href="{{ route('stockReport') }}" class="card-link">Generate Report</a>
              </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="background-color: #81d1f7; padding: 10px; border-radius: 5px;">
              <div class="card-block">
                <h4 class="card-title">Site 1</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                @if(Auth::user()->role == 1)
                    <a href="{{ route('site1Inventory') }}" class="card-link">Inventory</a>
                @endif
                <a href="{{ route('site1Report') }}" class="card-link">Generate Report</a>
              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card" style="background-color: #81d1f7; padding: 10px; border-radius: 5px;">
              <div class="card-block">
                <h4 class="card-title">Site 2</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                @if(Auth::user()->role == 1)
                    <a href="{{ route('site2Inventory') }}" class="card-link">Inventory</a>
                @endif
                <a href="{{ route('site2Report') }}" class="card-link">Generate Report</a>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
