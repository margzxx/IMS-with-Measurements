@include('layouts.header')


            <div class="panel panel-default">
                <div class="panel-heading">Manage Categories</div>

                <div class="panel-body">
                    <a href="{{ url('add-category') }}">
                    <input type="button" class="btn btn-default" value="Add Categories">
                    </a>

                    <br><br>

                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Description</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($categories as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <a href="{{ url('edit-category/'.$item->id) }}">
                                        <input type="button" class="btn btn-default form-control" value="Edit">
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ url('delete-category/'.$item->id) }}">
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
