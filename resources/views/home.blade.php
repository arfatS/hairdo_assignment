@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                   
                <div class="card-header"> Welcome! You are logged in</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->role == 'admin')
                    <a href="/users">View all users here</a>
                    <hr>
                    @endif
                    <a href="/websites">View avaliable websites here</a>
                    <hr>
                    <a href="/orders">View avaliable orders here</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
