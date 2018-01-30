@extends('layouts.app')

@section('content')
<script type="text/javascript">
    function addfield() {
        $("#table").append('\
                        <tr>\
                            <td>\
                                <input type="number" class="form-control" name="sno[]">\
                            </td>\
                            <td>\
                                <select class="form-control" name="category[]">\
                                    @foreach($categories as $category)\
                                        <option>{{$category->category}}</option>\
                                    @endforeach\
                                </select>\
                            </td>\
                            <td>\
                                <input type="text" class="form-control" name="costing[]" required="true">\
                            </td>\
                            <td>\
                                <input type="number" class="form-control" name="quantity[]" step="0" required="true">\
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
        <center><h2>Site 2</h2></center>
        <form method="POST" action="{{ route('saveSite2Inventory') }}">
            {{ csrf_field() }}
            <div class="col-md-10 col-md-offset-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th>S No</th>
                            <th>Category Name</th>
                            <th>Costing</th>
                            <th>Quantity</th>
                            <th>Dated</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="table">
                        <tr>
                            <td>
                                <input type="number" class="form-control" name="sno[]">
                            </td>
                            <td>
                                <select class="form-control" name="category[]">
                                    @foreach($categories as $category)
                                        <option>{{$category->category}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="costing[]" required="true">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="quantity[]" step="0" required="true">
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
                <center><input type="submit" class="form-control" style="width: 100px;" name="submit"></center>
            </div>        
        </form>
    </div>
</div>
@endsection
