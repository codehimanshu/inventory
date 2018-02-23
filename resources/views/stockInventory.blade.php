@extends('layouts.app')

@section('content')
<script type="text/javascript">
    function addfield() {
        $("#table").append('\
                        <tr>\
                            <td>\
                                <input type="text" class="form-control" name="category[]" required="true" list="categories">\
                            </td>\
                            <td>\
                                <input type="number" class="form-control quantity" name="quantity[]" step="0">\
                            </td>\
                            <td>\
                                <input type="number" class="form-control costing" name="costing[]" step="0.01" >\
                            </td>\
                            <td>\
                                <input type="number" class="form-control amount" name="amount[]" step="0.01" >\
                            </td>\
                            <td>\
                                <input type="date" class="form-control" name="date[]" required="true">\
                            </td>\
                            <td>\
                                <img src="{{ asset('/close.png') }}" width="30px;" class="deleteRow">\
                            </td>\
                        </tr>\
            ')
        return;   
    }

</script>

<div class="container">
    <div class="row">
        <center><h2>Warehouse</h2></center>
        <form method="POST" action="{{ route('saveStockInventory') }}">
            {{ csrf_field() }}
            <div class="col-md-10 col-md-offset-1" style="overflow-x:auto;">
                <table class="table table-hover table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Quantity</th>
                            <th>Rate (in Rs)</th>
                            <th>Total Cost (in Rs)</th>
                            <th>Dated</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="table">
                        <tr>
                            <td>
                                <select class="form-control" name="categories[]">
                                    @foreach($cats as $cat)
                                        <option value="{{$cat->id}}">{{$cat->category}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="category[]" required="true" list="subcategories">
                            </td>
                            <datalist id="categories">
                                @foreach($categories as $category)
                                    <option>{{$category->id}}. {{$category->subcategory}} ({{$category->category->category}})</option>
                                @endforeach   
                            </datalist>
                            <td>
                                <input type="number" class="form-control quantity" name="quantity[]" step="0" >
                            </td>
                            <td>
                                <input type="number" class="form-control costing" name="costing[]"  step="0.01">
                            </td>
                            <td>
                                <input type="number" class="form-control amount" name="amount[]" step="0.01" >
                            </td>
                            <td>
                                <input type="date" class="form-control" name="date[]" required="true">
                            </td>
                            <td>
                                <img src="{{ asset('/close.png') }}" width="30px;" class="deleteRow">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <span style="float: right;"><input type="button" class="btn btn-sm btn-primary" onclick="addfield()" value="Add Row"></span>
                <br><br>
                <center><input type="submit" class="form-control btn btn-primary" style="width: 100px;margin-bottom: 40px;" name="submit"></center>
            </div>        
        </form>
    </div>
</div>
@endsection
