@include('layouts.header')
<?php
use App\Branch;
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Employee</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('edit-employee') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('branch_id') ? ' has-error' : '' }}">
                            <label for="branch_id" class="col-md-4 control-label">Select Branch</label>

                            <div class="col-md-6">
                                <select name="branch_id" class="form-control">
                                    <option value="{{ $user->branch_id }}">Currently: {{ Branch::find($user->branch_id)->description }}</option>
                                        @foreach($branches as $item)
                                        <option value="{{ $item->id }}">{{ $item->description }}</option>
                                        @endforeach
                                        </select>

                                @if ($errors->has('branch_id'))
                                    <span class="help-block">
                                        
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">Select Role</label>

                            <div class="col-md-6">
                                <select name="role" class="form-control">
                                    <option value="{{ $user->role }}">Currently: {{ $user->role }}</option>
                                        <option value="Cashier">Cashier</option>
                                        <option value="Admin">Admin</option>
                                        </select>

                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


@include('layouts.footer')