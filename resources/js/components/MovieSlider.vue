<template>
    <div>



        <flicking
            class="flicking flicking0 h-96"
            :options="{ gap: 10, circular: true, moveType: 'freeScroll' }">
            <div class="panel h-96"><img class="w-48 rounded-3xl ":src="'/storage/' + movies"></div>
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
                this.movies = response.data.data[0].img_path;

                console.log(this.movies);
            })
            .catch((error) => {
                console.log(error);
                this.errored = true;
            })
            .finally(() => (this.loading = false));
        },
    };

</script>

