@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User details</div>

                <div class="card-body">

                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('error')}}
    
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <form action="/users/edit/{{$user->id}}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Id</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="old_password">Old Password</label>
                            <input type="password" name="old_password" id="old_password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" name="new_password" id="new_password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="role">User Role</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="{{$user->role}}" selected>{{ucfirst($user->role)}}</option>
                                <option value="buyer">Buyer</option>
                                <option value="seller">Seller</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <input type="submit" value="Update User" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
