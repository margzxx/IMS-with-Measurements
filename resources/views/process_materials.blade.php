@include('layouts.header')
<?php
use App\Supplier;
use App\Category;
use App\Branch;
use App\Item;
?>


            <div class="panel panel-default">
                <div class="panel-heading">Process Materials</div>

                <div class="panel-body">

                    <a href="{{ url('add-process-materials') }}">
                    <input type="submit" class="btn btn-primary" value="Add Process Materials">
                    </a>

                    <br><br>

                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <td>Purchasing ID</td>
                                <td>Name</td>
                                <td>Qty</td>
                                <td>Date of Creation</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $product_id = 0;
                            ?>

                            @foreach($products as $item)
                            <tr>
                                <td>
                                <a href="{{ url('view-product-blueprint/'.$item->product_id) }}">{{ $item->product_id }}</a>
                                </td>
                                <td>{{ $item->name }}</td>
                                </td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ date('m/d/Y',strtotime($item->created_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

@include('layouts.footer')
