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
                <div class="panel-heading">Set Product Price</div>

                <div class="panel-body">

                    <form action="{{ url('set-product-price') }}" method="post">

                        {{ csrf_field() }}

                        <input type="hidden" name="purchasing_id" value="{{ $product->purchasing_id }}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="item_id" value="{{ $product->item_id }}">

                        <h4>SKU: {{ $product->product_id }}</h4>
                        <h4>Product Name: {{ $product->name }}</h4>
                        <h4>Price: ₱{{ number_format($product->price,2) }}</h4>

                        <hr>

                        <div class="row">

                            <div class="col-md-2">
                                <h5>Set Product Price</h5>
                                <input type="text" name="price" placeholder="0" class="form-control" value="{{ $product->price }}" min="1">
                            </div>

                            <div class="col-md-2">
                            <h5>&nbsp;</h5>
                            <input type="submit" class="btn btn-primary form-control" onclick="return confirm('Are you sure you want to submit?');">
                            </div>

                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
