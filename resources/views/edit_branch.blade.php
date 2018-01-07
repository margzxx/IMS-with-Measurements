@include('layouts.header')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Branch</div>

                <div class="panel-body">
                    
                    <form action="{{ url('edit-branch') }}" method="post">

                        <input type="hidden" name="branch_id" value="{{ $branch->id }}">

                        {{ csrf_field() }}
                        
                        <h5>Description</h5>

                        <input type="text" name="description" class="form-control" placeholder="Description" value="{{ $branch->description }}">

                        <h5>Address</h5>

                        <textarea name="address" rows="7" class="form-control" placeholder="Enter address here...">{{ $branch->address }}</textarea>

                        <br>

                        <input type="submit" class="btn btn-default">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
`