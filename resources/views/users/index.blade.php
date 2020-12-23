@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-header">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
    
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    List of Users
                    <a href="/users/add" class="btn btn-primary float-right">Add User</a>
                </div>

                <div class="card-body">

                    @if ($users->count())
                        
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $no = 0; @endphp
                                    
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{++$no}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{ucfirst($user->role)}}</td>

                                        <td>
                                            <a href="/users/edit/{{$user->id}}" class="mx-1">Edit</a>
                                            <a href="/users/delete/{{$user->id}}" class="text-danger mx-1" onclick="return confirm('Confirm delete user {{$user->name}}?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    @else
                        
                    Currently there are no users in the table
                    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
