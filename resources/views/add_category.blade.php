@include('layouts.header')


            <div class="panel panel-default">
                <div class="panel-heading">Manage Categories</div>

                <div class="panel-body">
                    
                    <form action="{{ url('add-category') }}" method="post">

                        {{ csrf_field() }}
                        
                        <h5>Description</h5>

                        <input type="text" name="description" class="form-control" placeholder="Description">

                        <br>

                        <input type="submit" class="btn btn-default">

                    </form>

                </div>
            </div>


@include('layouts.footer')
