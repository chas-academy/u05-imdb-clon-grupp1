<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <star-rating v-model="rating"></star-rating>
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
  data() {
    return {
      rating: this.rating,
      loading: true,
      errored: false,
    };
  },
  mounted() {
    axios
      .get("/review-api/" + window.location.pathname.split("/")[2])
      .then((response) => {
        this.rating = response.data.data["rating"];
        console.log(this.rating);
      })
      .catch((error) => {
        console.log(error);
        this.errored = true;
      })
      .finally(() => (this.loading = false));
  },
};
</script>

<!--
<script>
import StarRating from "vue-star-rating";

export default {
  props: ["movieId", "rating"],
  components: {
    StarRating,
  },
  data() {
    return {
      rating: 0,
    };
  },
  methods: {
    setRating() {
      axios.post("/api-review/store", {
        ratings: this.rating,
      });
    },
  },
  mounted() {
    console.log("Component mounted.");
    axios
      .get("/review-api/1")
      .then((response) => {
        this.rating = response.data.data;
        console.log(this.rating);
      })
      .catch((error) => {
        console.log(error);
        this.errored = true;
      })
      .finally(() => (this.loading = false));
  },
  data: function () {
    return {
      status: this.rating,
      loading: true,
      errored: false,
    };
  },
};
</script>
-->