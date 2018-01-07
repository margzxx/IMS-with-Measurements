@include('layouts.header')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Item</div>

                <div class="panel-body">
                    
                    <form action="{{ url('add-item') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <h5>SKU</h5>

                        <input type="text" name="sku" class="form-control" placeholder="SKU">
                        
                        <h5>Name</h5>

                        <input type="text" name="name" class="form-control" placeholder="Name">

                        <h5>Price</h5>

                        <input type="text" name="price" class="form-control" placeholder="0.00" value="0.00">

                        <h5>Size</h5>

                        <input type="text" name="size" class="form-control" placeholder="Size">

                        <h5>Unit</h5>

                        <input type="text" name="unit" class="form-control" placeholder="Unit">

                        <h5>Select Supplier</h5>

                        <select name="supplier_id" class="form-control">
                            @foreach($suppliers as $item)
                            <option value="{{ $item->id }}">{{ $item->description }}</option>
                            @endforeach
                        </select>

                        <h5>Select Category</h5>

                        <select name="category_id" class="form-control">
                            @foreach($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->description }}</option>
                            @endforeach
                        </select>

                        <!-- <h5>Select Branch</h5>

                        <select name="branch_id" class="form-control">
                            @foreach($branches as $item)
                            <option value="{{ $item->id }}">{{ $item->description }}</option>
                            @endforeach
                        </select> -->

                        <h5>Description of Product</h5>

                        <textarea name="description" class="form-control" rows="7" placeholder="Enter description here..."></textarea>

                        <h5>Product Image</h5>

                        <input type="file" name="file">

                        <br>

                        <input type="submit" class="btn btn-default">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
