@include('layouts.header')


            <div class="panel panel-default">
                <div class="panel-heading">Manage Suppliers</div>

                <div class="panel-body">
                    <a href="{{ url('add-supplier') }}">
                    <input type="button" class="btn btn-default" value="Add Supplier">
                    </a>

                    <br><br>

                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Description</td>
                                <td>Address</td>
                                <td>Contact Number</td>
                                <td>Details</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($suppliers as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->contact_number }}</td>
                                <td>{{ $item->details }}</td>
                                <td>
                                    <a href="{{ url('edit-supplier/'.$item->id) }}">
                                        <input type="button" class="btn btn-primary form-control" value="Edit">
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ url('delete-supplier/'.$item->id) }}">
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
