<template>
    <div>
        <flicking
            class="h-80 my-5"
            :options="{ circular: true, moveType: 'freeScroll'}"

            @select="e => user(e)">

                <div v-for="(movie, index) in movies" :key="movie.id" class="h-80 w-56 p-2 relative panel text-white">
                    <img  :src="'/storage/' + movie.img_path" class="h-full w-full rounded-3xl cursor-pointer object-cover">
                    <button class="absolute top-5 right-5 rounded-full bg-white w-6 h-6 text-gray-900 transform hover:scale-110 hover:opacity-80">{{movie.id}}</button>
                </div>

        </flicking>
    </div>
</template>

<script>
    import { Flicking } from "@egjs/vue-flicking";
    export default {
        components: {
            Flicking: Flicking,
        },
        data() {
            return {
                movies: this.movies,
            };
        },
        mounted() {
            axios.get('/movie-api')
            .then(response => this.movies = response.data.data.slice().reverse())

            if (localStorage.getItem('reloaded')) {
                localStorage.removeItem('reloaded');
            } else {
                localStorage.setItem('reloaded', '1');
                location.reload();
            }
        },
        methods: {
            user: function (e) { window.location.assign("/movies/" + this.movies[e.index].id) }
        }
    };
</script>
