@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Website details</div>

                <div class="card-body">

                   

                    <form action="/websites/add" method="POST">

                        @csrf

                        <div class="form-group">
                            <label for="name">Website Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="url">Website URL</label>
                            <input type="text" name="url" id="url" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="domain_authority">Domain Authority</label>
                            <input type="text" name="domain_authority" id="domain_authority" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="page_authority">Page Authority</label>
                            <input type="text" name="page_authority" id="page_authority" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="guest_post_price">Guest Post Price</label>
                            <input type="text" name="guest_post_price" id="guest_post_price" class="form-control" required>
                        </div>
                        
                        <input type="submit" value="Submit Website" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
