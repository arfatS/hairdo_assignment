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

                    List of available Websites
                    
                    @if (Auth::user()->role != 'buyer')
                    <a href="/websites/add" class="btn btn-primary float-right">Add Website</a>
                    @endif
                </div>

                <div class="card-body">

                    @if ($websites->count())
                        
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Website Name</th>
                                    <th>Approved</th>
                                    <th>Guest Post Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $no = 0; @endphp
                                    
                                @foreach ($websites as $website)
                                    <tr>
                                        <td>{{++$no}}</td>
                                        <td>{{$website->name}}</td>
                                        
                                        @if ($website->approved)
                                        <td>YES</td>
                                        @else
                                        <td>NO</td>
                                        @endif

                                        <td>{{$website->guest_post_price}}</td>
                                        <td>
                                            <a href="/websites/view/{{$website->id}}" class="mx-1">View</a>

                                            @if (Auth::user()->role == 'buyer')
                                            <a href="/orders/{{$website->id}}" class="text-success mx-1">Buy</a>
                                                
                                            @else
                                            <a href="/websites/edit/{{$website->id}}" class="mx-1">Edit</a>
                                            <a href="/websites/delete/{{$website->id}}" class="text-danger mx-1" onclick="return confirm('Confirm delete website {{$website->name}}?')">Delete</a>
                                                
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    @else
                        
                    Currently there are no websites in the table
                    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
