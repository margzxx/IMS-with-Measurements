@include('layouts.header')
<?php
use App\Supplier;
use App\Category;
use App\Branch;
?>


            <div class="panel panel-default">
                <div class="panel-heading">Manage Item</div>

                <div class="panel-body">
                    
                    <a href="{{ url('add-item') }}">
                    <input type="button" class="btn btn-default" value="Add Item">
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
                                <td>Description</td>
                                <td>Date of Transaction</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{ $item->sku }}</td>
                                <td><img src="{{ $item->file }}" width="70px"></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->size }} {{ $item->unit }}</td>
                                <td>{{ Supplier::find($item->supplier_id)->description }}</td>
                                <td>{{ Category::find($item->category_id)->description }}</td>
                                <td>‎₱{{ number_format($item->price,2) }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ date('m/d/Y g:ia',strtotime($item->created_at)) }}</td>
                                <td>
                                    <a href="{{ url('edit-item/'.$item->id) }}">
                                        <input type="button" class="btn btn-default form-control" value="Edit">
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ url('delete-item/'.$item->id) }}">
                                        <input type="button" class="btn btn-danger form-control" value="Delete">
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

@include('layouts.footer')
