@include('layouts.header')
<?php
use App\Item;
use App\Supplier;
use App\Category;
use App\Branch;
?>


            <div class="panel panel-default">
                <div class="panel-heading">Process Materials</div>

                <div class="panel-body">

                    <form action="{{ url('add-process-material') }}" method="post">

                        {{ csrf_field() }}

                        <div class="row">

                            <div class="col-md-12">
                                <h5>Product ID</h5>
                                <input type="text" name="product_id" class="form-control" placeholder="Product ID">
                            </div>

                            <div class="col-md-12">
                                <h5>Product Name</h5>
                                <input type="text" name="name" class="form-control" placeholder="Product Name">
                            </div>

                            <div class="col-md-2">
                                <h5>Width</h5>
                                <input type="text" name="width" class="form-control" placeholder="Width">
                            </div>

                            <div class="col-md-2">
                                <h5>Height</h5>
                                <input type="text" name="height" class="form-control" placeholder="Height">
                            </div>

                            <div class="col-md-12"><hr></div>

                            <div class="col-md-6">
                                <h5>Select Material</h5>
                                <select name="good_id" class="selectpicker form-control" data-live-search="true">
                                    @foreach($goods as $item)
                                    <option value="{{ $item->id }}">{{ Item::find($item->item_id)->sku }} - {{ Item::find($item->item_id)->name }} (₱ {{ $item->price }})  REMAINING QTY: {{ $item->qty }} {{ Item::find($item->item_id)->size }}{{ Item::find($item->item_id)->unit }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <h5>Leftovers</h5>
                                <select name="leftover_id" class="form-control">
                                    <option value="0">N/A</option>
                                    @foreach($leftovers as $item)
                                    <option value="{{ $item->id }}">{{ Item::find($item->item_id)->name }} - {{ Item::find($item->item_id)->size }}{{ Item::find($item->item_id)->unit }} REMAINING QTY: {{ $item->qty }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-1">
                                <h5>Quantity</h5>
                                <input type="text" name="qty" placeholder="0" class="form-control" value="1" min="1">
                            </div>
                            <div class="col-md-1">
                                <h5>Flexible</h5>
                                <input type="checkbox" name="flexible" checked>
                            </div>

                            <div class="col-md-2">
                            <h5>&nbsp;</h5>
                            <input type="submit" class="btn btn-primary form-control" value="Add Material">
                            </div>

                        </div>


                    </form>

                </div>
            </div>


@include('layouts.footer')
