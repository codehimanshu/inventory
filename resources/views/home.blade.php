@extends('layouts.app')

@section('content')
<div class="container" style="margin-bottom: 30px;">
    <div class="row">
        <div class="col-md-6" style="margin-bottom: 30px;">
            <div class="card cardi" style="background-color: #81d1f7; padding: 10px; border-radius: 5px;">
              <div class="card-block">
                <h4 class="card-title">Warehouse</h4>
                <p class="card-text">Add item to stock</p>
                    <a href="{{ route('stockInventory') }}" class="card-link">Inventory</a>
              </div>
            </div>
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
            <div class="card cardi" style="background-color: #81d1f7; padding: 10px; border-radius: 5px;">
              <div class="card-block">
                <h4 class="card-title">Add to site</h4>
                <p class="card-text">Add items to site</p>
                    <a href="{{ route('tosite') }}" class="card-link">To Site</a>
              </div>
            </div>
        </div>
    </div>
    <br>
    @if(Auth::user()->role == 1)
        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-4" style="margin-bottom: 30px;">
                <div class="card cardi" style="background-color: #81d1f7; padding: 10px; border-radius: 5px;">
                  <div class="card-block">
                    <h4 class="card-title">Warehouse</h4>
                    <p class="card-text">Report of Stock at Warehouse</p>
                        <a href="{{ route('stockReport') }}" class="card-link">Generate Report</a>
                  </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom: 30px;">
                <div class="card cardi" style="background-color: #81d1f7; padding: 10px; border-radius: 5px;">
                  <div class="card-block">
                    <h4 class="card-title">Site 1</h4>
                    <p class="card-text">Report of Stock at Site 1</p>
                        <a href="{{ route('site1Report') }}" class="card-link">Generate Report</a>
                  </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card cardi" style="background-color: #81d1f7; padding: 10px; border-radius: 5px;">
                  <div class="card-block">
                    <h4 class="card-title">Site 2</h4>
                    <p class="card-text">Report of Stock at Site 2</p>
                        <a href="{{ route('site2Report') }}" class="card-link">Generate Report</a>
                  </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
