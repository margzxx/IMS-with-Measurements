@include('layouts.header')
<?php
use App\Item;
use App\Supplier;
use App\Category;
use App\Branch;
use App\Order;
?>

            <div class="panel panel-default">
                <div class="panel-heading">Purchase Orders - {{ $purchasing_id }}</div>

                <div class="panel-body">

                    @if(Order::where('purchasing_id',$purchasing_id)->where('status','=','For Delivery')->exists() || Order::where('purchasing_id',$purchasing_id)->where('status','=','Received')->exists() || Order::where('purchasing_id',$purchasing_id)->where('status','=','Returned')->exists())

                    @else

                    <form action="{{ url('add-purchase-order') }}" method="post">

                        {{ csrf_field() }}

                        <input type="hidden" name="purchasing_id" value="{{ $purchasing_id }}">

                        <h4>Purchasing ID: {{ $purchasing_id }}</h4>

                        <div class="row">

                            <div class="col-md-6">
                                <h5>Select Item</h5>
                                <select name="item_id" class="selectpicker form-control" data-live-search="true">
                                    @foreach($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->sku }} - {{ $item->name }} {{ $item->size }} (₱ {{ $item->price }}) - {{ Supplier::find($item->supplier_id)->description }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-md-2">
                                <h5>Quantity</h5>
                                <input type="text" name="qty" placeholder="0" class="form-control" value="1" min="1">
                            </div>

                            <div class="col-md-2">
                                <h5>Discount %</h5>
                                <input type="text" name="discount" placeholder="0" class="form-control" value="0" min="0">
                            </div>

                            <div class="col-md-2">
                            <h5>&nbsp;</h5>
                            <input type="submit" class="btn btn-primary form-control" value="Add Item">
                            </div>

                        </div>


                    </form>

                    <br>

                    @endif

                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td><h6>Purchasing ID</h6></td>
                                <td><h6>Name</h6></td>
                                <td><h6>Category</h6></td>
                                <td><h6>Supplier</h6></td>
                                <td><h6>Address</h6></td>
                                <td><h6>Contact</h6></td>
                                <td><h6>Qty</h6></td>
                                <td><h6>Unit</h6></td>
                                <td><h6>Price</h6></td>
                                <td><h6>Discount %</h6></td>
                                <td><h6>Total</h6></td>
                               
                                <td><h6>Status</h6></td>

                                @if(Order::where('purchasing_id',$purchasing_id)->where('status','=','For Delivery')->exists() || Order::where('purchasing_id',$purchasing_id)->where('status','=','Received')->exists() || Order::where('purchasing_id',$purchasing_id)->where('status','=','Returned')->exists())

                                @else
                                <td><h6>Edit</h6></td>
                                <td><h6>Remove</h6></td>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($orders as $item)
                                <tr>
                                    <td>
                                    <a href="{{ url('modify-purchase-orders/'.$item->purchasing_id) }}"><h6>{{ $item->purchasing_id }}</h6></a>
                                    </td>
                                    <td><h6>{{ Item::find($item->item_id)->name }}</td>
                                    <td><h6>{{ Category::find($item->category_id)->description }}</h6></td>
                                    <td><h6>{{ Supplier::find($item->supplier_id)->description }}</h6></td>
                                    <td><h6>{{ Supplier::find($item->supplier_id)->address }}</h6></td>
                                    <td><h6>{{ Supplier::find($item->supplier_id)->contact_number }}</h6></td>

                                    @if($item->qty >= $item->critical_level)
                                        <td style="color:green;">
                                        <h6>{{ $item->qty }}</h6>
                                        </td>
                                    @else
                                        <td style="color:red;">
                                        <h6>{{ $item->qty }}</h6>
                                        </td>
                                    @endif

                                    <td><h6>{{ Item::find($item->item_id)->size }}{{ Item::find($item->item_id)->unit }}</h6></td>
                                    
                                    <td>‎<h6>₱{{ number_format($item->price,2) }}</h6></td>
                                    <td>‎<h6>{{ $item->discount }}%</h6></td>
                                    <td>‎<h6>₱{{ number_format($item->total,2) }}</h6></td>
                                    <td>‎<h6>{{ $item->status }}</h6></td>

                                    @if(Order::where('purchasing_id',$purchasing_id)->where('status','=','For Delivery')->exists() || Order::where('purchasing_id',$purchasing_id)->where('status','=','Received')->exists() || Order::where('purchasing_id',$purchasing_id)->where('status','=','Returned')->exists())

                                    @else
                                    <td>‎<h6><a href="{{ url('edit-purchase-order/'.$item->id) }}">Edit</a></h6></td>

                                    <td>‎<h6><a href="{{ url('remove-purchase-order/'.$item->id) }}" onclick="return confirm('Are you sure you want to remove item?')">Remove</a></h6></td>
                                    @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if(Order::where('purchasing_id',$purchasing_id)->where('status','=','For Delivery')->exists() || Order::where('purchasing_id',$purchasing_id)->where('status','=','Received')->exists() || Order::where('purchasing_id',$purchasing_id)->where('status','=','Returned')->exists())

                    @else

                        <a href="{{ url('submit-purchase-order/'.$purchasing_id) }}">
                        <input type="button" class="btn btn-primary" value="Submit Purchase Order">
                        </a>

                    @endif

                </div>
            </div>

@include('layouts.footer')
