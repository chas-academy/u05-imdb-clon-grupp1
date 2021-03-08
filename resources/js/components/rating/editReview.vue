<template>
  <div class="container">
    <h1>Edit review</h1>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <!-- <star-rating @rating-selected="create" v-model="rating"></star-rating>-->
          <form
            action="#"
            v-for="(review, index) in reviews"
            :key="review"
            @submit.prevent="store(review.review, review.rating)"
          >
            <input type="text" v-model="review.review" />
            <star-rating v-model="review.rating" :increment="0.5"></star-rating>
            <button type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>


<!--
       <h1>Edit review</h1>
       <form action="/movies/{{$review->id}}" method="POST">
           @csrf
           @method('PATCH')
           <label for="review">Review edit</label>

           <input type="text" name="review" value="{{ old('review') ?? $review->review }}"><br>
           @if ($errors->has('review'))
           <span class="text-red-600" role="alert">
               <strong>{{ $errors->first('review') }}</strong>
           </span>
           @endif


           
           @if ($errors->has('rating'))
           <span class="text-red-600" role="alert">
               <strong>{{ $errors->first('rating') }}</strong>
           </span>
           @endif
           <button type="submit" v-on:click.prevent="ratingReq()">Submit</button>
       </form>
-->



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
    store(review, rating) {
      let uri = `/rating/${this.id}`;
      axios
        .post(uri, {
          review,
          rating,
        })
        .then((response) => {
          console.log(response.data);
        });
    },
  },
};
</script>