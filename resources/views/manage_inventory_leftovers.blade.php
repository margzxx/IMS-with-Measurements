@include('layouts.header')
<?php
use App\Supplier;
use App\Category;
use App\Branch;
use App\Item;
use App\Good;
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Inventory - Leftovers</div>

                <div class="panel-body">

                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('manage-inventory') }}">Raw Materials</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('manage-inventory-finished-products') }}">Finished Products</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('manage-leftovers') }}">Leftovers</a></li>
                </ol>

                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <td>SKU</td>
                                <td>Name</td>
                                <td>Qty</td>
                                <td>Unit</td>
                                <td>Date of Creation</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($leftovers as $item)
                            <tr>
                                <td><a href="{{ url('view-product-blueprint/'.$item->product_id) }}">{{ Item::find($item->item_id)->sku }}</a></td>
                                <td>{{ Item::find($item->item_id)->name }}</td>
                                <td>
                                {{ $item->qty }}
                                </td>
                                <td>{{ $item->size }}{{ Item::find($item->item_id)->unit }}</td>
                                <td>{{ date('m/d/Y',strtotime($item->created_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
