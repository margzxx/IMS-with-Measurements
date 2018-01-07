@include('layouts.header')
<?php
use App\Item;
use App\Supplier;
use App\Category;
use App\Branch;
use App\Order;
use App\Good;
use App\Material;
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Process Materials - {{ $product_id }}</div>

                <div class="panel-body">

                    <h4>Product ID: {{ $product_id }}</h4>
                        <h4>Product Name: {{ Material::where('product_id',$product_id)->first()->name }}</h4>
                        <h4>Width: {{ Material::where('product_id',$product_id)->first()->width }}</h4>
                        <h4>Height: {{ Material::where('product_id',$product_id)->first()->height }}</h4>

                    <br><br>

                        <table class="table table-bordered" id="printTable">
                        <thead>
                            <tr>
                                <td>SKU</td>
                                <td>Name</td>
                                <td>Qty</td>
                                <td>Unit</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($materials as $item)
                                <tr>
                                    <td>
                                    {{ Item::find($item->item_id)->sku }}
                                    </td>
                                    <td>{{ Item::find($item->item_id)->name }}</td>
                                    <td>
                                        {{ $item->qty }}
                                    </td>

                                    <td>{{ Item::find($item->item_id)->size }}{{ Item::find($item->item_id)->unit }}</td>
                                    
                                    <td>‎{{ $item->status }}</td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    @if(Material::where('product_id',$item->product_id)->where('status','Assembled')->exists())
                        
                        <form action="{{ url('add-product-qty') }}" method="post">

                            <input type="hidden" name="product_id" value="{{ $item->product_id }}">

                            <input type="hidden" name="width" value="{{ Material::where('product_id',$product_id)->first()->width }}">

                            <input type="hidden" name="height" value="{{ Material::where('product_id',$product_id)->first()->height }}">
                            
                            {{ csrf_field() }}

                            <h4>Enter Product Quantity</h4>

                            <input type="number" name="qty" class="form-control" placeholder="Qty" value="1" min="1">

                            <br>

                            <input type="submit" class="btn btn-primary">

                        </form>

                    @else
                        <a href="{{ url('finish-product/'.$item->id) }}">
                        <input type="button" class="btn btn-primary" value="Finish Product">
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
