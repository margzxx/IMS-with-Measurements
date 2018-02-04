@include('layouts.header')
<?php
use App\Supplier;
use App\Category;
use App\Branch;
use App\Item;
use App\Order;
?>


            <div class="panel panel-default">
                <div class="panel-heading">Goods Receipts</div>

                <div class="panel-body">

                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <td>Purchasing ID</td>
                                <td>Date of Transaction</td>
                                <td>Total Items</td>
                                <td>Grand Total</td>
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
                                <a href="{{ url('view-goods-receipt/'.$item->purchasing_id) }}">{{ $item->purchasing_id }}</a>
                                </td>
                                <td>{{ $item->transaction_date }}</td>
                                <td>{{ Order::where('purchasing_id',$item->purchasing_id)->count() }}</td>
                                <td>‎₱{{ number_format(Order::where('purchasing_id',$item->purchasing_id)->sum('total'),2) }}</td>
                            </tr>

                            @endif
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

@include('layouts.footer')
