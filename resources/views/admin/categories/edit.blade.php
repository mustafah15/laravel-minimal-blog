@extends('admin.layout.home')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Blog Posts</h1>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-lg-12">
            <form role="form" action="{{route('updateCategory',['id'=>$category->id])}}" method="post">
                <div class="form-group input-group">
                    <label>Category Name</label>
                    <input required type="text" value="{{$category->name}}" class="form-control" name="name" placeholder="category name">
                </div>
                {{ csrf_field() }}

                <div class="form-group input-group">
                    <label>Category Description</label>
                    <textarea required width="%100" class="form-control" name="description">{{$category->description}}</textarea>
                </div>
                {{ csrf_field() }}

                <input type="submit" class="form-control btn btn-primary">
            </form>
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection