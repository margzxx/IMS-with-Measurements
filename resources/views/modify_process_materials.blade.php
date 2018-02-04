@include('layouts.header')
<?php
use App\Item;
use App\Supplier;
use App\Category;
use App\Branch;
use App\Order;
use App\Material;
use App\Product;
?>


            <div class="panel panel-default">
                <div class="panel-heading">Process Materials - {{ $product_id }}</div>

                <div class="panel-body">

                    @if(Material::where('product_id',$product_id)->where('status','=','For Assembly')->exists() || Material::where('product_id',$product_id)->where('status','=','Assembled')->exists())

                    @else

                    <form action="{{ url('add-process-material') }}" method="post">

                    <input type="hidden" name="width" value="{{ Material::where('product_id',$product_id)->first()->width }}">

                    <input type="hidden" name="height" value="{{ Material::where('product_id',$product_id)->first()->height }}">

                        {{ csrf_field() }}

                        <input type="hidden" name="product_id" value="{{ $product_id }}">
                        <input type="hidden" name="name" value="{{ Material::where('product_id',$product_id)->first()->name }}">


                        <h4>Product ID: {{ $product_id }}</h4>
                        <h4>Product Name: {{ Material::where('product_id',$product_id)->first()->name }}</h4>

                        <div class="row">

                            <div class="col-md-12"><hr></div>

                            <div class="col-md-6">
                                <h5>Select Material</h5>
                                <select name="good_id" class="selectpicker form-control" data-live-search="true">
                                    @foreach($goods as $item)
                                    <option value="{{ $item->id }}">{{ Item::find($item->item_id)->sku }} - {{ Item::find($item->item_id)->name }} (₱ {{ $item->price }})  REMAINING QTY: {{ $item->qty }} {{ Item::find($item->item_id)->size }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <h5>Leftovers</h5>
                                <select name="leftover_id" class="form-control">
                                    <option value="0">N/A</option>
                                    @foreach($leftovers as $item)
                                    <option value="{{ $item->id }}">{{ Item::find($item->item_id)->name }} - {{ Item::find($item->item_id)->size }}{{ Item::find($item->item_id)->unit }} REMAINING QTY: {{ $item->qty }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-1">
                                <h5>Quantity</h5>
                                <input type="text" name="qty" placeholder="0" class="form-control" value="1" min="1">
                            </div>
                            <div class="col-md-1">
                                <h5>Flexible</h5>
                                <input type="checkbox" name="flexible" checked>
                            </div>

                            <div class="col-md-2">
                            <h5>&nbsp;</h5>
                            <input type="submit" class="btn btn-primary form-control" value="Add Material">
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
                                <td><h6>Status</h6></td>

                                @if(Material::where('product_id',$product_id)->where('status','=','For Assembly')->exists() || Material::where('product_id',$product_id)->where('status','=','Assembled')->exists())

                                @else
                                <td><h6>Edit</h6></td>
                                <td><h6>Remove</h6></td>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($materials as $item)
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

                                    <td><h6>{{ Item::find($item->item_id)->size }}</h6></td>
                                    <td>‎<h6>{{ $item->status }}</h6></td>

                                    @if(Material::where('product_id',$product_id)->where('status','=','For Assembly')->exists() || Material::where('product_id',$product_id)->where('status','=','Assembled')->exists())

                                    @else
                                    <td>‎<h6><a href="{{ url('edit-process-material/'.$item->id) }}">Edit</a></h6></td>

                                    <td>‎<h6><a href="{{ url('remove-process-material/'.$item->id) }}" onclick="return confirm('Are you sure you want to remove material?')">Remove</a></h6></td>
                                    @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if(Material::where('product_id',$product_id)->where('status','=','For Assembly')->exists())->exists())

                    @else

                        <a href="{{ url('submit-product-blueprint/'.$product_id) }}">
                        <input type="button" class="btn btn-primary" value="Submit Product Blueprint">
                        </a>

                    @endif

                </div>
            </div>


@include('layouts.footer')
