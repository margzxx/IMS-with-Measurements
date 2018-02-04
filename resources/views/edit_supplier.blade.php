@include('layouts.header')


            <div class="panel panel-default">
                <div class="panel-heading">Manage Suppliers</div>

                <div class="panel-body">
                    
                    <form action="{{ url('edit-supplier') }}" method="post">

                        <input type="hidden" name="supplier_id" value="{{ $supplier->id }}">

                        {{ csrf_field() }}
                        
                        <h5>Description</h5>

                        <input type="text" name="description" class="form-control" placeholder="Description" value="{{ $supplier->description }}">

                        <h5>Address</h5>

                        <input type="text" name="address" class="form-control" placeholder="Address" value="{{ $supplier->address }}">

                        <h5>Contact Number</h5>

                        <input type="text" name="contact_number" class="form-control" placeholder="Contact Number" value="{{ $supplier->contact_number }}">

                        <h5>Details</h5>

                        <textarea class="form-control" name="details" rows="7" placeholder="Enter details here...">{{ $supplier->details }}</textarea>

                        <br>

                        <input type="submit" class="btn btn-default">

                    </form>

                </div>
            </div>


@include('layouts.footer')
