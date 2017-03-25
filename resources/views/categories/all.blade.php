
@extends('layouts.home')
@section('posts')
    <div id="app">
        <div v-for="category in categories" class="post-preview">
            <a :href="category.url">
                <h2 class="post-title">
                    @{{category.name}}
                </h2>
                <h3 class="post-subtitle">
                    @{{ category.description }}
                </h3>
            </a>
        </div>
    </div>
    <hr>
@endsection


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.3/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.3/vue-resource.min.js"></script>

<script>
    var dataRoute = '{{route('CategoriesData')}}';
    new Vue({

        el: '#app',

        data: {
            categories: []
        },

        created() {this.fetchData();},

        methods: {
            fetchData() {
                this.$http.get(dataRoute)
                    .then(result => {
                    this.categories = result.data
            })
            }
        }

    })
</script>
@endpush
