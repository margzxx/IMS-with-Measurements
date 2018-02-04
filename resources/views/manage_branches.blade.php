@include('layouts.header')


            <div class="panel panel-default">
                <div class="panel-heading">Manage Branches</div>

                <div class="panel-body">
                    <a href="{{ url('add-branch') }}">
                    <input type="button" class="btn btn-default" value="Add Branch">
                    </a>

                    <br><br>

                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Description</td>
                                <td>Address</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($branches as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->address }}</td>
                                <td>
                                    <a href="{{ url('edit-branch/'.$item->id) }}">
                                        <input type="button" class="btn btn-default form-control" value="Edit">
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ url('delete-branch/'.$item->id) }}">
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
