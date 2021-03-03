<template>
  <div>
      <h2 class="mb-8">Reviews</h2>
      <div v-for="review in reviews" :key="review.id">
          <div v-bind="movieId" v-if="movieId == review.movies_id">
        <p> {{review.review}} </p>
        <p>Score: {{review.rating}}</p>
        <p class="mb-4"><a v-bind:href="'/profile/' + review.user_id">By {{review.user.username}}</a></p>
          </div>
        </div>
        
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
        axios.get('/review')
        .then(response => {
            this.reviews = response.data.reviews
            });
            
          Event.$on('reviewAdded', (review, rating, id) => {
            this.reviews.push(review, rating, id);

        })
        }
    }

</script>

<style>

</style>