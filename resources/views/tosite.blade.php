@extends('layouts.app')

@section('content')
<script type="text/javascript">
    function addfield() {
        $("#table").append('\
                        <tr>\
                            <td>\
                                <select class="form-control" name="category[]">\
                                    @foreach($categories as $category)\
                                        <option>{{$category->category}}</option>\
                                    @endforeach\
                                </select>\
                            </td>\
                            <td>\
                                <select class="form-control" name="site[]">\
                                    <option>Site 1</option>\
                                    <option>Site 2</option>\
                                </select>\
                            </td>\
                            <td>\
                                <input type="number" class="form-control" name="costing[]" required="true">\
                            </td>\
                            <td>\
                                <input type="number" class="form-control" name="quantity[]" step="0" required="true">\
                            </td>\
                            <td>\
                                <input type="number" class="form-control" name="comment[]" list="comment" required="true">\
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
                            <th>Costing</th>
                            <th>Quantity</th>
                            <th>Comment</th>
                            <th>Dated</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="table">
                        <tr>
                            <td>
                                <select class="form-control" name="category[]">
                                    @foreach($categories as $category)
                                        <option>{{$category->category}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="site[]">
                                    <option>Site 1</option>
                                    <option>Site 2</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="costing[]" required="true">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="quantity[]" step="0" required="true">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="comment[]" list="comment" required="true">
                            </td>
                            <datalist id="comments">
                                @foreach($comments as $comment)
                                    <option>{{ $comment }}</option>
                                @endforeach
                            </datalist>
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
