@include('layouts.header')
<?php
use App\Branch;
use App\Supplier;
use App\Category;
?>


            <div class="panel panel-default">
                <div class="panel-heading">Edit Item</div>

                <div class="panel-body">
                    
                    <form action="{{ url('edit-item') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <input type="hidden" name="item_id" value="{{ $item->id }}">

                        <h5>SKU</h5>

                        <input type="text" name="sku" class="form-control" placeholder="SKU" value="{{ $item->sku }}">
                        
                        <h5>Name</h5>

                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $item->name }}">

                        <h5>Price</h5>

                        <input type="text" name="price" class="form-control" placeholder="0.00" value="{{ $item->price }}">

                        <h5>Size</h5>

                        <input type="text" name="size" class="form-control" placeholder="Size" value="{{ $item->size }}">

                        <h5>Select Supplier</h5>

                        <select name="supplier_id" class="form-control">
                            <option value="{{ $item->supplier_id }}">Currently: {{ Supplier::find($item->supplier_id)->description }}</option>
                            @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->description }}</option>
                            @endforeach
                        </select>

                        <h5>Select Category</h5>

                        <select name="category_id" class="form-control">
                            <option value="{{ $item->category_id }}">Currently: {{ Category::find($item->category_id)->description }}</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->description }}</option>
                            @endforeach
                        </select>

                        <!-- <h5>Select Branch</h5>

                        <select name="branch_id" class="form-control">
                            <option value="{{ $item->branch_id }}">Currently: {{ Branch::find($item->branch_id)->description }}</option>
                            @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->description }}</option>
                            @endforeach
                        </select> -->

                        <h5>Description of Product</h5>

                        <textarea name="description" class="form-control" rows="7" placeholder="Enter description here...">{{ $item->description }}</textarea>

                        <h5>Product Image</h5>

                        <input type="file" name="file">

                        <br>

                        <input type="submit" class="btn btn-default">

                    </form>

                </div>
            </div>


@include('layouts.footer')
