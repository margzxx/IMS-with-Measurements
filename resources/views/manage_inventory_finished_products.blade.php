@include('layouts.header')
<?php
use App\Supplier;
use App\Category;
use App\Branch;
use App\Item;
?>


            <div class="panel panel-default">
                <div class="panel-heading">Manage Inventory - Finished Products</div>

                <div class="panel-body">

                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('manage-inventory') }}">Raw Materials</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('manage-inventory-finished-products') }}">Finished Products</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('manage-leftovers') }}">Leftovers</a></li>
                </ol>

                <a href="{{ url('process-materials') }}">
                <input type="button" class="btn btn-default" value="Process Materials">
                </a>

                <br><br>

                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <td>SKU</td>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Qty</td>
                                <td>Date of Creation</td>
                                <td>Set Price</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($products as $item)
                            <tr>
                                <td><a href="{{ url('view-product-blueprint/'.$item->product_id) }}">{{ $item->product_id }}</a></td>
                                <td>{{ $item->name }}</td>
                                <td>
                                @if($item->price == null)
                                    ‎₱{{ number_format(0,2) }}
                                @else
                                    ‎₱{{ number_format($item->price,2) }}
                                @endif
                                </td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ date('m/d/Y',strtotime($item->created_at)) }}</td>
                                <td>
                                    <a href="{{ url('set-product-price/'.$item->id) }}">
                                    <input type="button" class="btn btn-default" value="Set Price">
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>


@include('layouts.footer')
