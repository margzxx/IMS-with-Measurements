@include('layouts.header')
<?php
use App\Item;
use App\Supplier;
use App\Category;
use App\Branch;

?>


            <div class="panel panel-default">
                <div class="panel-heading">Return Goods</div>

                <div class="panel-body">

                    <form action="{{ url('return-goods') }}" method="post">

                        {{ csrf_field() }}

                        <input type="hidden" name="purchasing_id" value="{{ $order->purchasing_id }}">
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <input type="hidden" name="item_id" value="{{ $order->item_id }}">

                        <h4>SKU: {{ Item::find($order->item_id)->sku }}</h4>
                        <h4>Current Item Name: {{ Item::find($order->item_id)->name }}</h4>
                        <h4>Price: ₱{{ number_format(Item::find($order->item_id)->price,2) }}</h4>
                        <h4>Expected Quantity: {{ $order->qty }} {{ Item::find($order->item_id)->size }}</h4>
                        <h4>
                        Received Quantity:
                        @if($order->delivered_qty == null)
                            0
                        @else
                            {{ $order->delivered_qty }}
                        @endif
                        </h4>
                        <h4>Total: ₱{{ number_format($order->total,2) }}</h4>

                        <hr>

                        <h4>Supplier Name: {{ Supplier::find(Item::find($order->item_id)->supplier_id)->description }}</h4>
                        <h4>Supplier Contact: {{ Supplier::find(Item::find($order->item_id)->supplier_id)->contact_number }}</h4>
                        <h4>Supplier Address: {{ Supplier::find(Item::find($order->item_id)->supplier_id)->address }}</h4>

                        <hr>

                        <div class="row">

                            <div class="col-md-2">
                                <h5>Type Quantity To Return</h5>
                                <input type="text" name="delivered_qty" placeholder="0" class="form-control" value="{{ $order->delivered_qty }}" min="1">
                            </div>

                            <div class="col-md-2">
                            <h5>&nbsp;</h5>
                            <input type="submit" class="btn btn-primary form-control" onclick="return confirm('Are you sure you want to submit?');">
                            </div>

                        </div>


                    </form>

                </div>
            </div>

@include('layouts.footer')
