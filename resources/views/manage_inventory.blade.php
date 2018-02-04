@include('layouts.header')
<?php
use App\Supplier;
use App\Category;
use App\Branch;
use App\Item;
?>


            <div class="panel panel-default">
                <div class="panel-heading">Manage Inventory - Raw Materials</div>

                <div class="panel-body">

                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('manage-inventory') }}">Raw Materials</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('manage-inventory-finished-products') }}">Finished Products</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('manage-leftovers') }}">Leftovers</a></li>
                </ol>

                <a href="{{ url('add-process-materials') }}">
                <input type="button" class="btn btn-primary" value="Add Process Materials">
                </a>

                <br><br>

                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <td>SKU</td>
                                <td>Product</td>
                                <td>Name</td>
                                <td>Unit</td>
                                <td>Supplier</td>
                                <td>Category</td>
                                <td>Price</td>
                                <td>Qty</td>
                                <td>Total</td>
                                <td>Branch</td>
                                <td>Date of Transaction</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($goods as $item)
                            <tr>
                                <td>{{ Item::find($item->item_id)->sku }}</td>
                                <td><img src="{{ Item::find($item->item_id)->file }}" width="70px"></td>
                                <td>{{ Item::find($item->item_id)->name }}</td>
                                <td>{{ Item::find($item->item_id)->size }}{{ Item::find($item->item_id)->unit }}</td>
                                <td>{{ Supplier::find($item->supplier_id)->description }}</td>
                                <td>{{ Category::find($item->category_id)->description }}</td>
                                <td>‎₱{{ number_format($item->price,2) }}</td>

                                @if($item->qty >= $item->critical_level)
                                    <td style="color:green;">
                                    {{ $item->qty }}
                                    </td>
                                @else
                                    <td style="color:red;">
                                    {{ $item->qty }}
                                    </td>
                                @endif

                                <td>₱{{ number_format($item->qty * $item->price,2) }}</td>
                                <td>{{ Branch::find($item->branch_id)->description }}</td>
                                <td>{{ date('m/d/Y',strtotime($item->created_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>


@include('layouts.footer')
