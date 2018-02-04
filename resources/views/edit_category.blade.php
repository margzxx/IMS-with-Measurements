@include('layouts.header')

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

@include('layouts.footer')
