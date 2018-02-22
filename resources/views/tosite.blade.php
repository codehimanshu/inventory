@extends('layouts.app')

@section('content')
<script type="text/javascript">
    function addfield() {
        $("#table").append('\
                        <tr>\
                            <td>\
                                <input type="text" class="form-control" name="category[]" required="true" list="categories">\
                            </td>\
                            <datalist id="categories">\
                                @foreach($categories as $category)\
                                    <option>{{$category->id}}. {{$category->subcategory}} ({{$category->category->category}})</option>\
                                @endforeach   \
                            </datalist>\
                            <td>\
                                <select class="form-control">\
                                    <option>Site 1</option>\
                                    <option>Site 2</option>\
                                </select>\
                            </td>\
                            <td>\
                                <input type="number" class="form-control" name="quantity[]" step="0" >\
                            </td>\
                            <td>\
                                <input type="number" class="form-control" name="costing[]" >\
                            </td>\
                            <td>\
                                <input type="number" class="form-control" name="amount[]" >\
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
        <center><h2>To Site</h2></center>
        <form method="POST" action="{{ route('saveToSite') }}">
            {{ csrf_field() }}
            <div class="col-md-10 col-md-offset-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>To Site</th>
                            <th>Quantity</th>
                            <th>Costing</th>
                            <th>Amount</th>
                            <th>Dated</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="table">
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="category[]" required="true" list="categories">
                            </td>
                            <datalist id="categories">
                                @foreach($categories as $category)
                                    <option>{{$category->id}}. {{$category->subcategory}} ({{$category->category->category}})</option>
                                @endforeach   
                            </datalist>
                            <td>
                                <select class="form-control" name="site[]">
                                    <option>Site 1</option>
                                    <option>Site 2</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="quantity[]" step="0" >
                            </td>
                            <td>
                                <input type="number" class="form-control" name="costing[]" >
                            </td>
                            <td>
                                <input type="number" class="form-control" name="amount[]" >
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
