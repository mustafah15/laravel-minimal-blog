@extends('admin.layout.home')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Blog Posts</h1>
        </div>
    </div>

    <br>
    <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
              All blog posts
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>post title</th>
                        <th>actions</th>
                        <th>view</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr class="gradeU">
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td class="center">
                               <a href="{{route('deletePost',['id'=>$post->id])}}" > <button type="button" class="btn btn-danger">
                                    delete</button></a>
                                <a href="{{route('editPost',['id'=>$post->id])}}" ><button type="button" class="btn btn-info">edit</button></a>
                            </td>
                            <td class="center"><a href="{{route('post.show',['id'=>$post->id])}}" ><button type="button" class="btn btn-warning">view</button></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->
                <div class="well">
                    <a class="btn btn-success btn-lg btn-block" target="_blank" href="{{route('newPost')}}">Add New Post</a>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection