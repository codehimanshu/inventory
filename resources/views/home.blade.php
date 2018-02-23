@extends('layouts.app')

@section('content')
<div class="container" style="margin-bottom: 30px;">
    <div class="row">
        <div class="col-md-6" style="margin-bottom: 30px;">
            <div class="card cardi" style="background-color: #81d1f7; padding: 10px; border-radius: 5px;">
              <div class="card-block">
                <h3 class="card-title">Warehouse Stock</h3>
                    <a href="{{ route('stockInventory') }}" class="card-link"><h5>Add items to Warehouse</h5></a>

                     <a href="{{ route('stockReport') }}" class="card-link">Generate Report</a><br>
              </div>
            </div>
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
            <div class="card cardi" style="background-color: #81d1f7; padding: 10px; border-radius: 5px;">
              <div class="card-block">
                <h3 class="card-title">Add to Site</h3>
                <BR>
                    <a href="{{ route('tosite') }}" class="card-link">To Site</a>
              </div>
            </div>
        </div>
    </div>
    <br>
    @if(Auth::user()->role == 1)
       <!--  <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-4" style="margin-bottom: 30px;">
                <div class="card cardi" style="background-color: #81d1f7; padding: 10px; border-radius: 5px;">
                  <div class="card-block">
                    <h4 class="card-title">Warehouse</h4>
                    <p class="card-text">Report of Stock at Warehouse</p>
                        <a href="{{ route('stockReport') }}" class="card-link">Generate Report</a>
                  </div>
                </div>
            </div> -->
            <!-- <div class="col-md-4" style="margin-bottom: 30px;">
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
            </div> -->
        <!-- </div> -->
    @endif
</div>
@endsection
