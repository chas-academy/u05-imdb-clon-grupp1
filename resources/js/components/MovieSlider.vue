<template>
    <div v-if="loading !== true && errored !== true" >
        <flicking
            class="h-80 my-5"
            :options="{ circular: true, moveType: 'freeScroll'}"

            @select="e => user(e)">

                <div v-for="movie in movies" class="h-80 w-56 p-2 relative panel text-white bg-red-500">
                    <img  :src="'/storage/' + movie.img_path" class="h-full w-full rounded-3xl cursor-pointer object-cover">
                    <button class="absolute top-5 right-5 rounded-full bg-white w-6 h-6 text-gray-900 ">{{movie.id}}</button>
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
                loading: true,
                errored: false,
            };
        },
        mounted() {
            axios.get('/movie-api')
            .then(response => {
                this.movies = response.data.data.slice().reverse()
                console.log(this.movies);
                })
            .catch((error) => this.errored = true)
            .finally(() => this.loading = false);
        },
        methods: {
            user: function (e) { window.location.assign(`/movies/${this.movies[e.index].id}`) }
        }
    };
</script>
