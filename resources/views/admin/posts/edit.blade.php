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
            <form role="form" action="{{route('updatePost',['id'=>$post->id])}}" method="post">
                <div class="form-group input-group">
                    <label>Post Title</label>
                    <input required type="text" value="{{$post->title}}" class="form-control" name="title" placeholder="Post Title">
                </div>
                {{ csrf_field() }}

                <div class="form-group input-group">
                    <label>Post Content</label>
                    <textarea required width="%100" class="form-control" name="content">{{$post->content}}</textarea>
                </div>
                {{ csrf_field() }}
                <div class="form-group input-group">
                    <label>Post Category</label>
                    <select name="category_id" >
                        @foreach($categories as $category)
                            <option @if($category->id == $post->$category['id']) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" class="form-control btn btn-primary">
            </form>
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection