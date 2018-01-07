@include('layouts.header')
<?php
use App\Branch;
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Branches</div>

                <div class="panel-body">
                    <a href="{{ url('add-employee') }}">
                    <input type="button" class="btn btn-default" value="Add Employee">
                    </a>

                    <br><br>

                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Role</td>
                                <td>Assigned Branch</td>
                                <td>Address</td>
                                <td>Edit</td>
                                <td>Change Password</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                                <td>{{ Branch::find($item->branch_id)->description }}</td>
                                
                                <td>{{ Branch::find($item->branch_id)->address }}</td>

                                <td>
                                    <a href="{{ url('edit-employee/'.$item->id) }}">
                                        <input type="button" class="btn btn-default form-control" value="Edit">
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ url('change-password-employee/'.$item->id) }}">
                                        <input type="button" class="btn btn-default form-control" value="Change Password">
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
