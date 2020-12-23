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

                    List of orders
                </div>

                <div class="card-body">

                    @if ($orders->count())
                        
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Buyer Name</th>
                                    <th>Website Name</th>
                                    <th>Confirmed</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $no = 0; @endphp
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{++$no}}</td>
                                        <td>{{$order->buyer->name}}</td>
                                        <td>{{$order->website->name}}</td>
                                        
                                        @if ($order->confirmed)
                                        <td>YES</td>
                                        @else
                                        <td>NO</td>
                                        @endif
                                    
                                        <td>
                                            <a href="/orders/view/{{$order->id}}" class="mx-1">View</a>
                                            
                                            @if (Auth::user()->role != 'buyer')
                                            <a href="/orders/confirm/{{$order->id}}" class="text-success mx-1">Confirm</a>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                              
                            </tbody>
                        </table>
                    </div>

                    @else
                        
                    Currently there are no orders placed
                    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
