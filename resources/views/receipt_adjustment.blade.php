@include('layouts.header')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Receipt Adjustment</div>

                <div class="panel-body">
                    
                    <h5>Current Official Receipt</h5>
                    {{ $receipt->description }}

                    <hr>

                    <form action="{{ url('adjust-receipt') }}" method="post">

                    {{ csrf_field() }}
                        
                        <h5>New Official Receipt</h5>
                        <input type="text" name="description" value="{{ $receipt->description }}" class="form-control">

                        <br>

                        <input type="submit" class="btn btn-default" value="Update">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
