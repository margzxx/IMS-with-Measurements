@include('layouts.header')
<?php
use App\Supplier;
use App\Category;
use App\Branch;
use App\Item;
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Purchase Orders</div>

                <div class="panel-body">

                    <a href="{{ url('add-purchase-order') }}">
                    <input type="submit" class="btn btn-primary" value="Add Purchase Order">
                    </a>

                    <br><br>

                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <td>Purchasing ID</td>
                                <td>Name</td>
                                <td>Category</td>
                                <td>Supplier</td>
                                <td>Address</td>
                                <td>Contact</td>
                                <td>Qty</td>
                                <td>Unit</td>
                                <td>Price</td>
                                <td>Discount %</td>
                                <td>Total</td>
                               
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $purchasing_id = 0;
                            ?>

                            @foreach($orders as $item)
                            @if($purchasing_id == $item->purchasing_id)

                            @else

                            <?php
                            $purchasing_id = $item->purchasing_id;
                            ?>
                            <tr>
                                <td>
                                <a href="{{ url('modify-purchase-orders/'.$item->purchasing_id) }}">{{ $item->purchasing_id }}</a>
                                </td>
                                <td>{{ Item::find($item->item_id)->name }}</td>
                                <td>{{ Category::find($item->category_id)->description }}</td>
                                <td>{{ Supplier::find($item->supplier_id)->description }}</td>
                                <td>{{ Supplier::find($item->supplier_id)->address }}</td>
                                <td>{{ Supplier::find($item->supplier_id)->contact_number }}</td>

                                @if($item->qty >= $item->critical_level)
                                    <td style="color:green;">
                                    {{ $item->qty }}
                                    </td>
                                @else
                                    <td style="color:red;">
                                    {{ $item->qty }}
                                    </td>
                                @endif

                                <td>{{ Item::find($item->item_id)->size }}</td>
                                
                                <td>‎₱{{ number_format($item->price,2) }}</td>
                                <td>‎{{ $item->discount }}%</td>
                                <td>‎₱{{ number_format($item->total,2) }}</td>
                                <td>‎{{ $item->status }}</td>

                            </tr>

                            @endif
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
