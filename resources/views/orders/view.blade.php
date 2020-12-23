@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Order Info

                    @if (Auth::user()->role != 'buyer')
                    <a href="/orders/confirm/{{$order->id}}" class="btn btn-success float-right">Confirm order</a>
                    @endif
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <label>Buyer Name</label>
                        <input type="text" class="form-control" value="{{$order->buyer->name}}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Website Name</label>
                        <input type="text" class="form-control" value="{{$order->website->name}}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Blog Post Name</label>
                        <input type="text" class="form-control" value="{{$order->blog_post_name}}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Blog Post Article</label>
                        <input type="text" class="form-control" value="{{$order->blog_post_article}}" readonly>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
