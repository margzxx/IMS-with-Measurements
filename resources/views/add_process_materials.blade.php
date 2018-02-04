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
                                <input type="text" name="product_id" class="form-control" placeholder="Product ID" required>
                            </div>

                            <div class="col-md-12">
                                <h5>Product Name</h5>
                                <input type="text" name="name" class="form-control" placeholder="Product Name" required>
                            </div>

                            <div class="col-md-2">
                                <h5>Width</h5>
                                <input type="text" name="width" class="form-control" placeholder="Width" required>
                            </div>

                            <div class="col-md-2">
                                <h5>Height</h5>
                                <input type="text" name="height" class="form-control" placeholder="Height" required>
                            </div>

                            <div class="col-md-12"><hr></div>

                            <div class="col-md-12">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td></td>
                                            <td>SKU</td>
                                            <td>Product</td>
                                            <td>Price</td>
                                            <td>Leftover</td>
                                            <td>Remaining Qty</td>
                                            <td>Qty</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($goods as $item)
                                        <tr>
                                            <td>
                                                
                                                <input type="checkbox" name="good_id[]" value="{{ $item->id }}"> 
                                                    <a href="{{ url('remove-process-materials') }}">Remove</a>
                                            </td>
                                            <td>{{ Item::find($item->item_id)->sku }}</td>
                                            <td>{{ Item::find($item->item_id)->name }}</td>
                                            <td>₱ ({{ number_format($item->price,2) }})</td>
                                            <td>
                                                
                                            </td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->qty }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <a href="{{ url('update-process-materials/{id}') }}">
                                    <input type="button" class="btn btn-primary" value="Update Blueprint">
                                </a>

                                <input type="submit" class="btn btn-primary" value="Finish Product">
                            </div>

                        </div>


                    </form>

                </div>
            </div>


@include('layouts.footer')
