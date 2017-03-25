<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<div id="app" >
<header class="intro-header" style="  background-color: gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h1 v-if="post.title">@{{post.title}}</h1>
                    <span class="meta">Posted by @{{post.user.name}} @{{post.created}}</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @{{post.content}}
            </div>
        </div>
    </div>
</article>
</div>
<hr>




@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.3/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.3/vue-resource.min.js"></script>

<script>
    var dataRoute = '{{route('singlePostData',['postId'=>$postId])}}';
    new Vue({

        el: '#app',

        data: {
            post: {}
        },

        created() {this.fetchData();},

        methods: {
            fetchData() {
                this.$http.get(dataRoute)
                    .then(result => {
                      this.post = result.data
            })
            }
        }

    })
</script>
@endpush
@include('layouts.footer')


</html>
