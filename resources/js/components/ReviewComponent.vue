<template>
    
        <form method="post" @submit.prevent="addReview">
        <label for="title">Review</label>

        <input type="text" v-model="review" name="review" value=""><br>
     

        <!-- <select name="rating">
            <option value="" hidden>Select a rating</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select> -->
      
       
        
        <button type="submit">Add review</button>
        </form>
</template>

<script>
import MovieStarComponent from './MovieStarComponent';

export default {
    props: ['movieId', 'userId'],
    components: {
        MovieStarComponent
    },

    data() {
        return {
            review: '',
            movies_id: this.movieId,
            user_id: this.userId,
        }
    },

    methods: {
        addReview() {
            axios.post('/review-api', {
                review:this.review,
                movies_id: this.movies_id,
                user_id: this.user_id,
                })
            .then(response => {
                console.log(response)
            })
            
        }
    }
}
</script>

<style>

        
</style>