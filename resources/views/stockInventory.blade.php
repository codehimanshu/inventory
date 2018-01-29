@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <center><h2>Stock</h2></center>
        <form>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>S No</th>
                            <th>Category Name</th>
                            <th>To Site</th>
                            <th>Costing</th>
                            <th>Quantity</th>
                            <th>Dated</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                <select class="form-control" name="tosite[]">
                                    <option>Site 1</option>
                                    <option>Site 2</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="costing[]" step="0.01">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="quantity[]" step="0">
                            </td>
                            <td>
                                <input type="date" class="form-control" name="date[]">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <span style="float: right;"><button class="btn btn-sm btn-primary">Add Row</button></span>
                <br><br>
                <center><input type="submit" class="form-control" style="width: 100px;" name="submit"></center>
            </div>        
        </form>
    </div>
</div>
@endsection
