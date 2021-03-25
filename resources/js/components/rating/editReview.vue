<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <form
            action="#"
            @submit.prevent="update(review.review, review.rating)">
            <star-rating v-model="review.rating" :increment="0.5" v-bind:star-size="30" class=""></star-rating>
            <textarea type="text" style="resize: none;" rows="4" cols="30" maxlength="200" v-model="review.review" class="mt-5 bg-gray-800 rounded-xl p-2 focus:outline-none" ></textarea>
            <div class="flex">
            <button class="bg-indigo-900 text-white py-2 px-4 rounded-lg mt-5 block transform hover:scale-105 focus:outline-none" type="submit" id="success">Submit</button>
            <a :href="'/movies/' + review.movies_id" class="bg-indigo-900 text-white py-2 px-4 ml-3 rounded-lg mt-5 block transform hover:scale-105 focus:outline-none">Back</a>
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
            review: Object,
        },
        methods: {
            update(review, rating) {
            let uri = "/reviews/" + this.review.id;
            axios.put(uri, { review,rating,}).then((response) => {
                document.querySelector("#success").innerHTML = "Success"
                document.querySelector("#success").style.background = "linear-gradient(79deg, rgba(167,243,208,1) 0%, rgba(16,185,129,1) 100%)"

                });
            }
        },
    };
</script>
