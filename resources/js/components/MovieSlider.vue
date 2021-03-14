<template>
    <div class="flex flex-col justify-center items-center" >
        <div>
        <!--
            <form>
                <input type="radio" id="score" name="filter" value="score" v-on:click="scoreMovies(moviesList)" class="hidden">
                <label for="score" class="text-white font-medium rounded-lg cursor-pointer text-center score">Score</label>
                <input type="radio" id="new" name="filter" value="new" v-on:click="newMovies(moviesList)" class="hidden" checked>
                <label for="new" class="text-white font-medium  rounded-lg cursor-pointer text-center new">New</label>
                <input type="radio" id="comming" name="filter" value="comming" v-on:click="commingMovies(moviesList)" class="hidden">
                <label for="comming" class="text-white font-medium  rounded-lg cursor-pointer text-center comming">Comming</label>
            </form>
            -->
        </div>

        <vue-glide>
            <vue-glide-slide>
            hej
            </vue-glide-slide>
            <vue-glide-slide>
            hej
            </vue-glide-slide>
            <vue-glide-slide>
            hej
            </vue-glide-slide>
        </vue-glide>

    <!--<vue-glide class="h-80 my-5">
            <vue-glide-slide v-for="(movie, index) in moviesPrint" :key="movie.id" class="h-80 w-56 relative panel text-white">
                <img  :src="'/storage/' + movie.img_path" class="h-full w-full rounded-3xl cursor-pointer object-cover">
                <button class="absolute top-5 right-5 rounded-full bg-white w-6 h-6 text-gray-900 transform hover:scale-110 hover:opacity-80"></button>
            </vue-glide-slide>
        </vue-glide> -->
    </div>
</template>

<script>
    import { Glide, GlideSlide } from 'vue-glide-js';

    export default {
        components: {
            [Glide.name]: Glide,
            [GlideSlide.name]: GlideSlide
        },
        data() {
            return {
                moviesPrint: this.moviesPrint,
                moviesList: this.movieslist,
            };
        },
        mounted() {
             axios.get('/movie-api')
            .then(response => {
                this.moviesPrint = response.data.data.slice().reverse().slice(0,20);
                this.moviesList = response.data.data;
            });

            // if (localStorage.getItem('reloaded')) {
            //     localStorage.removeItem('reloaded');
            // } else {
            //     localStorage.setItem('reloaded', '1');
            //     location.reload();
            // }
        },
        methods: {
            // user: function (e) { window.location.assign("/movies/" + this.movies[e.index].id) },
            // scoreMovies: function (e) { this.moviesPrint = e.sort((a,b) => a.top_rating - b.top_rating).slice().reverse().slice(0,20) },
            // newMovies: function (e) { this.moviesPrint = e.sort((a,b) => a.id - b.id).slice().reverse().slice(0,20)},
            // commingMovies: function (e) { this.moviesPrint = e.filter(movie =>  movie.release_date >= new Date().getFullYear()).slice().reverse().slice(0,20) }
        }
    };
</script>

<style>

    input[type=radio] + label {
    display: inline-block;
    background-color: #3730A3;
    line-height: 40px;
    width: 100px;
    height: 40px;

    transition: width 0.3s;
    margin: 5px;
    }

    input[type=radio]:checked + label { width: 150px; }

    input[type=radio]:checked + .score { background: linear-gradient(142deg, rgba(116,167,255,1) 0%, rgba(30,43,255,1) 100%); }

    input[type=radio]:checked + .new { background: linear-gradient(142deg, rgba(255,116,116,1) 0%, rgba(255,30,220,1) 100%); }

    input[type=radio]:checked + .comming { background: linear-gradient(142deg, rgba(255,251,116,1) 0%, rgba(255,97,30,1) 100%); }

</style>
