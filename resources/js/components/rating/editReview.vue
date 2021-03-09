<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <!-- <star-rating @rating-selected="create" v-model="rating"></star-rating>-->
          <form
            action="/movies"
            v-for="(review, index) in reviews"
            :key="index"
            @submit.prevent="store(review.review, review.rating)"
          >
            <star-rating v-model="review.rating" :increment="0.5" v-bind:star-size="30"> class="text-white"></star-rating>
            <textarea type="text" style="resize: none;" placeholder="Maximum 200 characters" rows="4" cols="50" maxlength="200" v-model="review.review" class="mt-5" >
            </textarea>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-light py-2 px-4 rounded-lg block mt-5">Submit</button>

            <div class="flex justify-center items-center mt-5 font-medium py-1 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-700 " style="visibility: hidden;" id="success">
                <div class="text-xl font-normal  max-w-full flex-initial">
                    <div class="py-2">
                      Success!
                      <div class="text-sm font-base">Your review is now updated!</div>
                    </div>
                </div>
                <div class="flex flex-auto flex-row-reverse" @click="hideSuccess" >
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-green-400 rounded-full w-5 h-5 ml-2">
                          <line x1="18" y1="6" x2="6" y2="18"></line>
                          <line x1="6" y1="6" x2="18" y2="18"></line>
                      </svg>
                    </div>
                </div>
              </div>
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
          document.querySelector("#success").style.visibility = "visible";
          console.log(response.data);
        });
    },
    hideSuccess(){
      document.querySelector("#success").style.visibility = "hidden";
    }
  },
};
</script>