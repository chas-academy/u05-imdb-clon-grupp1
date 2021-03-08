<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <!-- <star-rating @rating-selected="create" v-model="rating"></star-rating>-->
          <div v-for="(review, index) in reviews" :key="review.rating">
            <star-rating
              :show-rating="false"
              @rating-selected="store(review.rating)"
              v-model="review.rating"
            ></star-rating>
            {{ review.review }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>



<script>
import StarRating from "vue-star-rating";
export default {
  components: {
    StarRating,
  },

  props: {
    id: {},
  },

  data() {
    return {
      reviews: {},
    };
  },

  mounted() {
    // this.$forceUpdate();
    let uri = `/review-api/${this.id}`;
    axios.get(uri).then((response) => {
      this.reviews = response.data;
    });
  },

  methods: {
    store(rating) {
      let uri = `/rating/${this.id}`;
      axios
        .post(uri, {
          rating,
        })
        .then((response) => {
          console.log(response.data);
        });
    },
  },
};
</script>