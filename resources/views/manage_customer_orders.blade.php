@include('layouts.header')
<?php
use App\Branch;
use App\Item;
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Customer Orders</div>

                <div class="panel-body">

                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <td>Official Receipt</td>
                                <td>Customer Name</td>
                                <td>Item Name</td>
                                <td>Item Color</td>
                                <td>Price</td>
                                <td>Qty</td>
                                <td>Total</td>
                                <td>Status</td>
                                <td>Deliver Item</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($sales as $item)
                            <tr>
                                <td>{{ $item->official_receipt }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ Item::find($item->item_id)->name }}</td>
                                <td>{{ $item->color }}</td>
                                <td>{{ number_format($item->price,2) }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ number_format($item->total,2) }}</td>
                                <td>{{ $item->status }}</td>

                                <td>
                                @if($item->status == 'Delivered')
                                    N/A
                                @else
                                    <a href="{{ url('deliver-customer-order/'.$item->id) }}">
                                        <input type="button" class="btn btn-default form-control" value="Deliver Item">
                                    </a>
                                @endif
                                </td>
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
