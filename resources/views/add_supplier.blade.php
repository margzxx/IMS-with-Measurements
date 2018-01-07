@include('layouts.header')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Suppliers</div>

                <div class="panel-body">
                    
                    <form action="{{ url('add-supplier') }}" method="post">

                        {{ csrf_field() }}
                        
                        <h5>Description</h5>

                        <input type="text" name="description" class="form-control" placeholder="Description">

                        <h5>Address</h5>

                        <input type="text" name="address" class="form-control" placeholder="Address">

                        <h5>Contact Number</h5>

                        <input type="text" name="contact_number" class="form-control" placeholder="Contact Number">

                        <h5>Details</h5>

                        <textarea class="form-control" name="details" rows="7" placeholder="Enter details here..."></textarea>

                        <br>

                        <input type="submit" class="btn btn-default">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
