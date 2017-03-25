<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<div id="app" >
    <header class="intro-header" style=" background-color: gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1> @{{category.name}}</h1>
                        <h2 class="subheading">@{{category.description}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
<hr>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <div v-for="post in category.posts" class="post-preview">
                <a :href="post.url">
                    <h2 class="post-title">
                        @{{post.title}}
                    </h2>
                    <h3 class="post-subtitle">
                        @{{ post.content }}
                    </h3>
                </a>
            </div>
            <!-- Pager -->
            <ul class="pager">
                <li class="next">
                    <a href="#">Older Posts &rarr;</a>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.3/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.3/vue-resource.min.js"></script>

<script>
    var dataRoute = '{{route('singleCategoryData',['categoryId'=>$categoryId])}}';
    new Vue({

        el: '#app',

        data: {
            category: {}
        },

        created() {this.fetchData();},

        methods: {
            fetchData() {
                this.$http.get(dataRoute)
                    .then(result => {
                    this.category = result.data
            })
            }
        }

    })
</script>
@endpush
@include('layouts.footer')


</html>
