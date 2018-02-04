@include('layouts.header')
<?php
use App\Supplier;
use App\Category;
use App\Branch;
use App\Item;
?>


            <div class="panel panel-default">
                <div class="panel-heading">Product Blueprints</div>

                <div class="panel-body">

                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <td>Product ID</td>
                                <td>Name</td>
                                <td>View Blueprint</td>
                                <td>Add Stock/s</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $product_id = 0;
                            ?>

                            

                            @foreach($materials as $item)
                            @if($product_id == $item->product_id)

                            @else
                            <tr>
                                <td>
                                <a href="{{ url('view-product-blueprint/'.$item->product_id) }}">{{ $item->product_id }}</a>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>
                                <a href="{{ url('view-product-blueprint/'.$item->id) }}">
                                <input type="button" class="btn btn-primary" value="View Product Blueprint">
                                </a> 
                                </td>
                                <td>
                                <a href="{{ url('add-product-stocks/'.$item->id) }}">
                                <input type="button" class="btn btn-default" value="Add Stock/s">
                                </a>
                                </td>
                            </tr>

                            @endif
                            @endforeach
                            
                        </tbody>
                    </table>

                </div>
            </div>


@include('layouts.footer')
