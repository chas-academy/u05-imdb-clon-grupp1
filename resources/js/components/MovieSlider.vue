<template>
    <div class="flex flex-col justify-center items-center px-5" >
        <div>
            <form>
                <input type="radio" id="score" name="filter" value="score" v-on:click="scoreMovies(moviesList)" class="hidden">
                <label for="score" class="text-white font-medium rounded-lg cursor-pointer text-center score shadow-md">Score</label>
                <input type="radio" id="new" name="filter" value="new" v-on:click="newMovies(moviesList)" class="hidden" checked>
                <label for="new" class="text-white font-medium  rounded-lg cursor-pointer text-center new shadow-md">New</label>
                <input type="radio" id="comming" name="filter" value="comming" v-on:click="commingMovies(moviesList)" class="hidden">
                <label for="comming" class="text-white font-medium  rounded-lg cursor-pointer text-center comming shadow-md">Comming</label>
            </form>
        </div>

        <hooper
        class="focus:outline-none h-80 my-1 w-screen max-w-screen-2xl "
        :settings="hooperSettings"
        :wheelControl="false"
        :infiniteScroll="true"
        style="height: 300px"
        ref="carousel"
        >
            <slide v-for="(movie, index) in moviesPrint" :key="index" class="relative ">
                <div class="p-2 h-72">
                    <a :href="'/movies/' + movie.id" v-on:click="search()"><img :src="'/storage/' + movie.img_path" class="h-full w-full rounded-3xl cursor-pointer object-cover shadow-md border-r border-gray-700 border-opacity-30"></a>
                    <watchlist-button v-if="profileId" :watchlist="watchlist.includes(',' + movie.id + ',')" :movie-id="movie.id" class="absolute top-5 right-5 w-6 h-6"> </watchlist-button>
                </div>
            </slide>
        </hooper>
    </div>
</template>

<script>
    import { Hooper, Slide } from 'hooper';
    import 'hooper/dist/hooper.css';

    export default {
        props: ["profileId", "watchlist"],
        name: 'App',
        components: {
        Hooper,
        Slide
        },
        data() {
            return {
                moviesPrint: this.moviesPrint,
                moviesList: this.movieslist,
                hooperSettings: {
                    breakpoints: {
                        1500: {
                            itemsToShow: 8
                        },
                        1400: {
                            itemsToShow: 6.9
                        },
                        1300: {
                            itemsToShow: 6.4
                        },
                        1200: {
                            itemsToShow: 5.9
                        },
                        1100: {
                            itemsToShow: 5.4
                        },
                        900: {
                            itemsToShow: 4.9
                        },
                        900: {
                            itemsToShow: 4.4
                        },
                        800: {
                            itemsToShow: 3.9
                        },
                        700: {
                            itemsToShow: 3.4
                        },
                        500: {
                            itemsToShow: 2.9
                        },
                        300: {
                            itemsToShow: 2.4
                        },
                        300: {
                            itemsToShow: 1.9
                        },
                        200: {
                            itemsToShow: 1.4
                        },
                        100: {
                            itemsToShow: 0.9
                        },
                    }
                }
            };
        },
        mounted() {
             axios.get('/movie-api')
            .then(response => {
                this.moviesPrint = response.data.data.sort((a,b) => a.id - b.id).filter(movie =>  movie.release_date < new Date().getFullYear()).slice().reverse().slice(0,20);
                this.moviesList = response.data.data;
            });
        },
        methods: {
            search: function () { if (this.$refs.carousel.isSliding)  event.preventDefault() },
            scoreMovies: function (e) { this.moviesPrint = e.sort((a,b) => a.top_rating - b.top_rating).slice().reverse().slice(0,20) },
            newMovies: function (e) { this.moviesPrint = e.sort((a,b) => a.id - b.id).filter(movie =>  movie.release_date < new Date().getFullYear()).slice().reverse().slice(0,20)},
            commingMovies: function (e) { this.moviesPrint = e.filter(movie =>  movie.release_date >= new Date().getFullYear()).slice().reverse().slice(0,20) }
        }
    };
</script>

<style>
    input[type=radio] + label {
    display: inline-block;
    background-color: #3730A3;
    line-height: 40px;
    width: 90px;
    height: 40px;

    transition: width 0.3s;
    margin: 5px;
    }

    input[type=radio]:checked + label { width: 120px; }

    input[type=radio]:checked + .score { background: linear-gradient(142deg, #8B5CF6 0%, #3B82F6 100%); }

    input[type=radio]:checked + .new { background: linear-gradient(142deg, #F87171 0%, #F472B6 100%); }

    input[type=radio]:checked + .comming { background: linear-gradient(142deg, #EF4444 0%, #FDE68A 100%); }
</style>
