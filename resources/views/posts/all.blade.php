
@extends('layouts.home')
@section('posts')
<div id="app">
    <div v-for="post in posts" class="post-preview">
        <a href="post.html">
            <h2 class="post-title">
               @{{post.title}}
            </h2>
            <h3 class="post-subtitle">
                @{{ post.content }}
            </h3>
        </a>
        <p class="post-meta">Posted by <a href="">@{{ post.user.name }}</a> @{{ post.created }}</p>
    </div>
</div>
<hr>
@endsection


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.3/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.3/vue-resource.min.js"></script>

<script>
    var dataRoute = '{{route('postsData')}}';
    new Vue({

        el: '#app',

        data: {
            posts: []
        },

        created() {this.fetchData();},

        methods: {
            fetchData() {
                this.$http.get(dataRoute)
                    .then(result => {
                    this.posts = result.data
            })
            }
        }

    })
</script>
@endpush
