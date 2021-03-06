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
                                <select class="form-control" name="subcategory[]">\
                                        <option>Wires</option>\
                                        <option>Switches</option>\
                                        <option>MCB</option>\
                                        <option>LED</option>\
                                        <option>Strip Lights</option>\
                                        <option>Niche Lights</option>\
                                        <option>Miscellaneous</option>\
                                </select>\
                            </td>\
                            <td>\
                                <input type="number" class="form-control" name="costing[]" required="true">\
                            </td>\
                            <td>\
                                <input type="number" class="form-control" name="quantity[]" step="0" required="true">\
                            </td>\
                            <td>\
                                <input type="text" class="form-control" name="comment[]" required="true" list="datalist">\
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
            <div class="col-md-10 col-md-offset-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Sub Category</th>
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
                                <select class="form-control" name="subcategory[]">
                                        <option>Wires</option>
                                        <option>Switches</option>
                                        <option>MCB</option>
                                        <option>LED</option>
                                        <option>Strip Lights</option>
                                        <option>Niche Lights</option>
                                        <option>Miscellaneous</option>
                                        <option>Flush Tanks</option>
                                        <option>W C (Seat)</option>
                                        <option>WashBasin</option>
                                        <option>Diverter</option>
                                        <option>Sink Mixture</option>
                                        <option>Basin Diverter</option>
                                        <option>Angle Value</option>
                                        <option>Health Faucet</option>
                                        <option>Battle Trap</option>
                                        <option>Spout</option>
                                        <option>Rain Shower</option>
                                        <option>Miscellaneous</option>
                                        <option>Paint</option>
                                        <option>P.U.</option>
                                        <option>Wood Polish</option>
                                        <option>Putty</option>
                                        <option>Wood Base</option>
                                        <option>Sealer</option>
                                        <option>Miscellaneous</option>
                                        <option>Ply</option>
                                        <option>Board</option>
                                        <option>Veneen</option>
                                        <option>Mica</option>
                                        <option>MDF</option>
                                        <option>Charcoal Sheet</option>
                                        <option>Miscellaneous</option>
                                        <option>Dust</option>
                                        <option>Bricks</option>
                                        <option>Cement</option>
                                        <option>Peta</option>
                                        <option>Rodi</option>
                                        <option>Miscellaneous</option>
                                        <option>Hinges</option>
                                        <option>Hinges Doors</option>
                                        <option>Channel</option>
                                        <option>Handle Locks</option>
                                        <option>Tower Bolt</option>
                                        <option>Jalli Palla Handles</option>
                                        <option>Drawer Locks</option>
                                        <option>Wardrobe Locks</option>
                                        <option>Wardrobe Handles</option>
                                        <option>Locks</option>
                                        <option>Knobs</option>
                                        <option>Miscellaneous</option>
                                        <option>Hinges</option>
                                        <option>Inno Tech</option>
                                        <option>InnoTech</option>
                                        <option>S Chausel</option>
                                        <option>Pantry</option>
                                        <option>Bottle Pullout</option>
                                        <option>Rolling Shutler</option>
                                        <option>Lift Up</option>
                                        <option>Cutlry</option>
                                        <option>Miscellaneous</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="costing[]" required="true">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="quantity[]" step="0" required="true">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="comment[]" required="true" list="comments">
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
