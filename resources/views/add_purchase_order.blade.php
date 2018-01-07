@include('layouts.header')
<?php
use App\Item;
use App\Supplier;
use App\Category;
use App\Branch;
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Add Orders</div>

                <div class="panel-body">

                    <form action="{{ url('add-purchase-order') }}" method="post">

                        {{ csrf_field() }}

                        <input type="hidden" name="purchasing_id" value="{{ time().'-'.Auth::user()->id }}">

                        <div class="row">

                            <div class="col-md-6">
                                <h5>Select Item</h5>
                                <select name="item_id" class="selectpicker form-control" data-live-search="true">
                                    @foreach($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->sku }} - {{ $item->name }} {{ $item->size }}{{ $item->unit }} (₱ {{ $item->price }}) - {{ Supplier::find($item->supplier_id)->description }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <h5>Quantity</h5>
                                <input type="text" name="qty" placeholder="0" class="form-control" value="1" min="1">
                            </div>

                            <div class="col-md-2">
                                <h5>Discount %</h5>
                                <input type="text" name="discount" placeholder="0" class="form-control" value="0" min="0">
                            </div>

                            <div class="col-md-2">
                            <h5>&nbsp;</h5>
                            <input type="submit" class="btn btn-primary form-control" value="Add Item">
                            </div>

                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
