<template>
  <div>
      <h2>Reviews</h2>
        <p v-for="review in reviews" :key="review.id"> {{review.review}} </p>
  </div>
</template>

<script>
export default {
    props: ['movieId'],
    data() {
        return {
            reviews: []
        }
    },
    created() {
        axios.get('/movies/' + this.movieId)
        .then(response => 
            this.reviews = response.data);
          
        }
    }

</script>

<style>

</style>