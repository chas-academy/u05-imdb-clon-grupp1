<template>
    <div>
        <div v-if="(showFilter)" class="flex justify-center">
            <form>
                <input type="radio" id="score" name="filter" value="score" v-on:click="filterButton()" class="hidden">
                <label for="score" class="text-white font-medium rounded-lg cursor-pointer text-center score shadow-md transform hover:scale-105">Score</label>
                <input type="radio" id="new" name="filter" value="new" v-on:click="filterButton()" class="hidden" checked>
                <label for="new" class="text-white font-medium  rounded-lg cursor-pointer text-center new shadow-md transform hover:scale-105">New</label>
                <input type="radio" id="comming" name="filter" value="comming" v-on:click="filterButton()" class="hidden">
                <label for="comming" class="text-white font-medium  rounded-lg cursor-pointer text-center comming shadow-md transform hover:scale-105">Comming</label>
            </form>
        </div>

         <div class="flex flex-col justify-center items-center">
            <div class="w-full max-w-screen-xl p-6 ">
                <div class="md:mx-auto md:grid md:grid-cols-2 md:gap-x-11 md:w-4/5 lg:w-full lg:grid-cols-3 ">
                    <div v-for="(movie, index) in moviesPrint" :key="index">
                        <div class="max-w-sm w-full md:bg-gray-800 rounded-2xl my-4 md:mb-7 md:shadow-lg md:border-r md:border-gray-700 md:border-opacity-50 relative">
                            <watchlist-button v-if="profileId" :watchlist="watchlist.includes(',' + movie.id + ',')" :movie-id="movie.id" class="absolute top-5 right-5 w-6 h-6"> </watchlist-button>
                            <a :href="'/movies/' + movie.id">
                                <div class="flex">
                                    <img class="w-24 h-36 rounded-2xl object-cover md:shadow-md md:border-r md:border-gray-900 md:border-opacity-50" :src="'/storage/' + movie.img_path" :alt="movie.title">
                                    <div class="mt-5 ml-4">
                                        <p class="text-white font-bold text-md"> {{ movie.title }}</p>
                                        <p class="text-white">{{ movie.release_date }} - {{ movie.language }}</p>
                                        <p class="text-white text-sm">Rating: {{ movie.top_rating }}</p>
                                        <p class="text-gray-400 mt-2 text-sm">{{ movie.movie_genres.replaceAll(',', ', ') }}</p>
                                        <a v-if="(role == 'admin')" :href="'movies/' + movie.id + '/edit'">Edit Movie</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
                <div class="flex justify-center mt-2 mb-10 select-none">
                    <p v-if="(currentPage != 1)" v-on:click="pagination(currentPage - 1)" class="p-4 bg-gray-800 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 mr-1 hover:bg-gray-700" >Prev</p>
                    <p v-if="(currentPage == 1)" class="p-4 bg-gray-900 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 text-gray-500 mr-1">Prev</p>
                    <div class="" v-for="(page, index) in pageCount" :key="'page-' + index">
                        <p :class="currentPage == page ? 'bg-gray-700 hover:bg-gray-600' : 'bg-gray-800 hover:bg-gray-700'" class="p-4  rounded-lg shadow-md border-r border-gray-700 border-opacity-50 mx-1" v-on:click="pagination(page)"> {{ page  }}</p>
                    </div>
                    <p  v-if="(currentPage != lastPage)" v-on:click="pagination(currentPage + 1)" class="p-4 bg-gray-800 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 ml-1 hover:bg-gray-700">Next</p>
                    <p  v-if="(currentPage == lastPage)" class="p-4 bg-gray-900 rounded-lg shadow-md border-r border-gray-700 border-opacity-50 text-gray-500 ml-1">Next</p>
                </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
        "profileId",
        "watchlist",
        "showWatchlist",
        'showFilter',
        'paginationNumber',
        'genreFilter',
        'role'
        ],
        data() {
                return {
                    response: this.response,
                    watchlistArray: this.watchlistArray,
                    moviesPrint: this.moviesPrint,
                    moviesList: this.moviesList,
                    pageCount: this.pageCount,
                    currentPage: this.currentPage,
                    lastPage: this.lastPage,
                };
            },
        mounted() {
            axios.get('/movie-api')
            .then(response => {
                if(this.showWatchlist){
                    this.watchlistArray = this.watchlist.slice(1, -1).split(",");
                    this.response = response.data.data;
                    this.moviesList = this.response.filter(movie => {
                        if(this.watchlistArray.includes(movie.id.toString())){
                            return movie
                        }
                    });

                    this.filterButton();
                } else if(this.genreFilter){

                    console.log(this.genreFilter);
                    this.moviesList = response.data.data.filter(movie => movie.movie_genres.split(',').includes(this.genreFilter));
                    this.filterButton();

                } else {
                    this.moviesList = response.data.data;
                    this.filterButton();
                }
            });
        },
        methods: {
            search: function () { if (this.$refs.carousel.isSliding)  event.preventDefault() },
            filterButton: function () {
                this.pagination(1);
            },
            pagination: function (page) {
                this.currentPage = page;
                this.paginationLoop(this.moviesList, this.paginationNumber, page)
            },
            paginationLoop: function(lists, rows, page){
                if(this.showFilter){
                    if (document.getElementById('score').checked) lists = lists.sort((a,b) => a.top_rating - b.top_rating).slice().reverse();
                    if (document.getElementById('new').checked) lists = lists.sort((a,b) => a.id - b.id).filter(movie =>  movie.release_date <= new Date().getFullYear()).slice().reverse();
                    if (document.getElementById('comming').checked) lists = lists.sort((a,b) => a.release_date - b.release_date).filter(movie =>  movie.release_date > new Date().getFullYear()).slice();
                } else
                {
                    lists = lists.sort((a,b) => a.id - b.id).filter(movie =>  movie.release_date <= new Date().getFullYear()).slice().reverse();
                }
                page--;
                let list = [];
                let start = rows * page;
                let end = start + rows;
                let paginatedItems = lists.slice(start, end);
                for(let i = 0; i < paginatedItems.length; i++){
                    list.push(paginatedItems[i]);
                }
                this.moviesPrint = list;

                let page_count = [];
                for(let i = page + 1; i <= Math.ceil(lists.length / rows) && i != page + 5  ; i++){
                    page_count.push(i);
                }
                this.lastPage = page_count[page_count.length - 1];
                this.pageCount = page_count;
            }
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
