@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Place order for {{$website->name}}</div>

                <div class="card-body">

                   

                    <form action="/orders/{{$website->id}}" method="POST">

                        @csrf

                        <div class="form-group">
                            <label for="blog_post_name">Blog Post Name</label>
                            <input type="text" name="blog_post_name" id="blog_post_name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="blog_post_article">Blog Post Article</label>
                            <textarea name="blog_post_article" id="blog_post_article" class="form-control" rows="8"></textarea>
                        </div>

                        <input type="submit" value="Place Order" class="btn btn-success btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
