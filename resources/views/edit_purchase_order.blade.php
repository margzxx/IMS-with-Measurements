@include('layouts.header')
<?php
use App\Item;
use App\Supplier;
use App\Category;
use App\Branch;

?>


            <div class="panel panel-default">
                <div class="panel-heading">Edit Purchase Order</div>

                <div class="panel-body">

                    <form action="{{ url('edit-purchase-order') }}" method="post">

                        {{ csrf_field() }}

                        <input type="hidden" name="purchasing_id" value="{{ $order->purchasing_id }}">
                        <input type="hidden" name="order_id" value="{{ $order->id }}">

                        <h4>SKU: {{ Item::find($order->item_id)->sku }}</h4>
                        <h4>Current Item Name: {{ Item::find($order->item_id)->name }}</h4>
                        <h4>Price: ₱{{ Item::find($order->item_id)->price }}</h4>

                        <hr>

                        <h4>Supplier Name: {{ Supplier::find(Item::find($order->item_id)->supplier_id)->description }}</h4>
                        <h4>Supplier Contact: {{ Supplier::find(Item::find($order->item_id)->supplier_id)->contact_number }}</h4>
                        <h4>Supplier Address: {{ Supplier::find(Item::find($order->item_id)->supplier_id)->address }}</h4>

                        <hr>

                        <div class="row">

                            <div class="col-md-6">
                                <h5>Select Item</h5>
                                <select name="item_id" class="selectpicker form-control" data-live-search="true">
                                    @foreach($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->sku }} - {{ $item->name }} (₱ {{ $item->price }}) - {{ Supplier::find($item->supplier_id)->description }}</option>
                                    @endforeach
                                </select>

                                
                            </div>

                            <div class="col-md-2">
                                <h5>Quantity</h5>
                                <input type="text" name="qty" placeholder="0" class="form-control" value="{{ $order->qty }}" min="1">
                            </div>

                            <div class="col-md-2">
                                <h5>Discount %</h5>
                                <input type="text" name="discount" placeholder="0" class="form-control" value="{{ $order->discount }}" min="0">
                            </div>

                            <div class="col-md-2">
                            <h5>&nbsp;</h5>
                            <input type="submit" class="btn btn-primary form-control">
                            </div>

                        </div>


                    </form>

                </div>
            </div>

@include('layouts.footer')
