@include('layouts.header')


            <div class="panel panel-default">
                <div class="panel-heading">Use POS</div>

                <div class="panel-body">

                <button onClick="addBox()" class="btn btn-default">Add Item Row</button>

                <form action="{{ url('confirm-order') }}" method="post">

                <h5>Official Receipt</h5>
                <h5>{{ $receipt->description }}</h5>

                <h5>Customer Name</h5>

                <input type="text" name="name" class="form-control" placeholder="Customer Name" required>

                <h5>From Branch</h5>

                <select name="branch_id" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                @foreach($branches as $branch)
                <option value="{{ $branch->id }}">{{ $branch->description }} - {{ $branch->address }}</option>
                @endforeach
                </select>

                <h5>Date Purchase</h5>
                <input type="date" name="transaction_date" value="{{ date('Y-m-d') }}" class="form-control" max="{{ date('Y-m-d') }}">

                <br>


                    

                    {{ csrf_field() }}

                    <input type="hidden" name="official_receipt" value="{{ $receipt->description }}">

                    <div id='last'>
                                </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Item ID</td>
                                <td>Color</td>
                                <td>Qty</td>

                            </tr>
                        </thead>

                        
                        <tbody>
                            
                            <tr>
                                <td>
                                <div id='item_id'>
                                </div>
                                </td>

                                <td>
                                    <!-- <div id='price'>
                                    </div> -->

                                    <div id='color'>
                                    </div>
                                    
                                </td>

                                <td>
                                    <div id='qty'>
                                    </div>
                                    
                                </td>

                            </tr>

                            <tr>
                                <td></td>

                                <td></td>
                                <td><input type="submit" class="btn btn-primary btn-sm" value="Confirm Order"></td>
                            </tr>
                            
                            
                        </tbody>
                        
                    </table>

                    

                    </form>

                </div>
            </div>

<script>
    var i = 0;

    addBox = function(){

    $("#last").append("<input type='hidden' name='last[]' class='form-control' value="+i+">");
    $("#item_id").append("<select name='item_id[]' class='form-control'>@foreach($products as $item)<option value='{{ $item->id }}'>{{ $item->product_id }} - {{ $item->name }} ‎₱{{ number_format($item->price,2) }}</option>@endforeach</select>");
    // $("#price").append("<input type='text' name='price[]' class='form-control' placeholder='0.00' value='0.00'>");
    $("#color").append("<select name='color[]' class='form-control'><option value='No Color'>No Color</option><option value='Red'>Red</option><option value='Blue'>Blue</option></select>");
    $("#qty").append("<input type='number' name='qty[]' class='form-control' placeholder='0' value='1' min='1'>");

    document.getElementById("last").value = i;

    i++;



    return i;
}
</script>

@include('layouts.footer')
