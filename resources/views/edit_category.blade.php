@include('layouts.header')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Categories</div>

                <div class="panel-body">
                    
                    <form action="{{ url('edit-category') }}" method="post">

                        <input type="hidden" name="category_id" value="{{ $category->id }}">

                        {{ csrf_field() }}
                        
                        <h5>Description</h5>

                        <input type="text" name="description" class="form-control" placeholder="Description" value="{{ $category->description }}">

                        <br>

                        <input type="submit" class="btn btn-default">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
