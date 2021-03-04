<template>
    <div>
        <flicking
            class="flicking h-80 my-5"
            :options="{gap: 15, circular: true, moveType: 'freeScroll' }">
                <div v-for="movie in movies"  class="h-80 w-56 relative">
                    <img  :src="'/storage/' + movie.img_path" class="h-full w-full rounded-3xl cursor-pointer object-cover">
                    <button class="absolute top-4 right-4 bg-white w-6 h-6 rounded-full scale-100 transform hover:opacity-70 hover:scale-110"></button>
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
            .then(response => {
                this.movies = response.data.data.slice().reverse();
            })
        },
    };

</script>

