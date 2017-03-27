@extends('admin.layout.home')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">New Blog Posts</h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <form role="form" action="{{route('storePost')}}" method="post">
                <div class="form-group input-group">
                    <label>Post Title</label>
                    <input required type="text" class="form-control" name="title" placeholder="Post Title">
                </div>
                <div class="form-group input-group">
                    <label>Post Content</label>
                    <textarea required width="%100" class="form-control" name="content"></textarea>
                </div>
                {{ csrf_field() }}
                <div class="form-group input-group">
                    <label>Post Category</label>
                    <select name="category_id" >
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" class="form-control btn btn-primary">
            </form>
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection