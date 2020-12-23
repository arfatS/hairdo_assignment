@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Website Info : {{$website->name}}
                    
                    @if (Auth::user()->role == 'admin')
                    <a href="/websites/approve/{{$website->id}}" class="btn btn-primary float-right" onclick="return confirm('Approve website {{$website->name}}?')">Approve</a>
                    @endif
                
                    @if (Auth::user()->role == 'buyer')
                    <a href="/orders/{{$website->id}}" class="btn btn-success float-right">Place order</a>
                    @endif
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <label>Seller Name</label>
                        <input type="text" class="form-control" value="{{$website->seller->name}}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Website Name</label>
                        <input type="text" class="form-control" value="{{$website->name}}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Website URL</label>
                        <input type="text" class="form-control" value="{{$website->url}}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Domain Authority</label>
                        <input type="text" class="form-control" value="{{$website->domain_authority}}" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label>Page Authority</label>
                        <input type="text" class="form-control" value="{{$website->page_authority}}" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label>Guest Post Price</label>
                        <input type="text" class="form-control" value="{{$website->guest_post_price}}" readonly>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
