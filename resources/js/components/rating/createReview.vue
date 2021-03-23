<template>
  <div class="container">
    <h1>Create review</h1>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <form
            action="#"
            @submit.prevent="store(review.review, review.rating)"
          >
            <star-rating v-model="review.rating" :increment="0.5" v-bind:star-size="30" class="text-white"></star-rating>
            <textarea type="text" style="resize: none;" placeholder="Maximum 200 characters" rows="4" cols="30" maxlength="200" v-model="review.review" class="mt-5" ></textarea>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-light py-2 px-4 rounded-lg block mt-5" type="submit">Submit</button>
            <div class="flex justify-center items-center mt-5 font-medium py-1 px-2 rounded-md text-green-100 bg-green-700 border border-green-700 " style="visibility: hidden;" id="success">
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

<script>
import StarRating from "vue-star-rating";
export default {
  components: {
    StarRating,
  },

  props: {
    movie: Object,
    review: "",
  },

  methods: {
    store(review, rating) {
      let uri = "/reviews/" + this.movie.id;
      console.log(uri);
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
