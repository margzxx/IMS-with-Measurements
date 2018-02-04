@include('layouts.header')
<?php
use App\Item;
use App\Supplier;
use App\Category;
use App\Branch;
use App\Order;
?>


            <div class="panel panel-default">
                <div class="panel-heading">Goods Receipt - {{ $purchasing_id }}</div>

                <div class="panel-body">

                    <div class="pull-left">
                        <h4>Purchasing ID: {{ $purchasing_id }}</h4>
                    </div>

                    <div class="pull-right">
                        <a href="{{ url('receive-all-goods/'.$purchasing_id) }}">
                        <input type="button" class="btn btn-primary" value="Receive All">
                        </a>

                        <a href="#">
                            <input type="button" class="btn btn-primary" value="Print" id="print">
                        </a>
                    </div>

                    <br><br>

                        <table class="table table-bordered" id="printTable">
                        <thead>
                            <tr>
                                <td>Purchasing ID</td>
                                <td>Name</td>
                                <td>Category</td>
                                <td>Supplier</td>
                                <td>Address</td>
                                <td>Contact</td>
                                <td>Received Qty</td>
                                <td>Qty</td>
                                <td>Unit</td>
                                <td>Price</td>
                                <td>Discount %</td>
                                <td>Subtotal</td>
                               
                                <td>Status</td>
                                <td>Receive</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($orders as $item)
                                <tr>
                                    <td>
                                    <a href="{{ url('modify-purchase-orders/'.$item->purchasing_id) }}">{{ $item->purchasing_id }}</a>
                                    </td>
                                    <td>{{ Item::find($item->item_id)->name }}</td>
                                    <td>{{ Category::find($item->category_id)->description }}</td>
                                    <td>{{ Supplier::find($item->supplier_id)->description }}</td>
                                    <td>{{ Supplier::find($item->supplier_id)->address }}</td>
                                    <td>{{ Supplier::find($item->supplier_id)->contact_number }}</td>
                                    <td>
                                    
                                    @if($item->delivered_qty == null)
                                        0
                                    @else
                                        {{ $item->delivered_qty }}
                                        <a href="{{ url('return-goods/'.$item->id) }}">Return</a>
                                    @endif
                                    
                                    </td>

                                    @if($item->qty >= $item->critical_level)
                                        <td style="color:green;">
                                        {{ $item->qty }}
                                        </td>
                                    @else
                                        <td style="color:red;">
                                        {{ $item->qty }}
                                        </td>
                                    @endif

                                    <td>{{ Item::find($item->item_id)->size }}{{ Item::find($item->item_id)->unit }}</td>
                                    
                                    <td>‎₱{{ number_format($item->price,2) }}</td>
                                    <td>‎{{ $item->discount }}%</td>
                                    <td>‎₱{{ number_format($item->total,2) }}</td>
                                    <td>‎{{ $item->status }}</td>

                                    <td>‎
                                    @if($item->status == 'Received' && $item->delivered_qty >= $item->qty)
                                        N/A
                                    @else
                                        <a href="{{ url('receive-goods/'.$item->id) }}">Receive</a>
                                    @endif
                                    </td>

                                </tr>
                            @endforeach

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Grand Total</td>
                                <td>₱{{ number_format($total,2) }}</td>
                               
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>

@include('layouts.footer')
