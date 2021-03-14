<template>
    <div class="flex flex-col justify-center items-center" >
        <div>
            <form action="/action_page.php">
            <input type="radio" id="male" name="gender" value="male" v-on:click="scoreMovies(moviesList)">
            <label for="male">Score</label>
            <input type="radio" id="female" name="gender" value="female" v-on:click="newMovies(moviesList)" checked>
            <label for="female">New</label>
            <input type="radio" id="other" name="gender" value="other" v-on:click="commingMovies(moviesList)">
            <label for="other">Comming</label>
            </form>
        </div>

        <div class="w-screen">
            <flicking
            class="h-80 my-5"
            :options="{ circular: true, moveType: 'freeScroll', gap: 15}"

            @select="e => user(e)">

                <div v-for="(movie, index) in moviesPrint" :key="movie.id" class="h-80 w-56 relative panel text-white">
                    <img  :src="'/storage/' + movie.img_path" class="h-full w-full rounded-3xl cursor-pointer object-cover">
                    <button class="absolute top-5 right-5 rounded-full bg-white w-6 h-6 text-gray-900 transform hover:scale-110 hover:opacity-80">{{movie.id}}</button>
                </div>

            </flicking>
        </div>

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
                moviesPrint: this.moviesPrint,
                moviesList: this.movieslist,
            };
        },
        beforeMount(){
            axios.get('/movie-api')
            .then(response => {
                this.moviesPrint = response.data.data.slice().reverse().slice(0,20);
                this.moviesList = response.data.data;
                })
        },
        mounted() {
            if (localStorage.getItem('reloaded')) {
                localStorage.removeItem('reloaded');
            } else {
                localStorage.setItem('reloaded', '1');
                location.reload();
            }
        },
        methods: {
            user: function (e) { window.location.assign("/movies/" + this.movies[e.index].id) },
            scoreMovies: function (e) { this.moviesPrint = e.sort((a,b) => a.top_rating - b.top_rating).slice().reverse().slice(0,20) },
            newMovies: function (e) { this.moviesPrint = e.sort((a,b) => a.id - b.id).slice().reverse().slice(0,20)},
            commingMovies: function (e) { this.moviesPrint = e.filter(movie =>  movie.release_date >= new Date().getFullYear()).slice().reverse().slice(0,20) }
        }
    };
</script>
