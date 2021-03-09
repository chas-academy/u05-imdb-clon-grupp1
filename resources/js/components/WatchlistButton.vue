<template>
  <div>
    <img
      class="bookmark w-12"
      @click="addToWatchlist"
      v-bind:src="'/storage/' + img_path"
    />
  </div>
</template>

<script>
export default {
  props: ["movieId", "watchlist"],

  data: function () {
    return { status: this.watchlist };
  },
  methods: {
    addToWatchlist() {
      axios.post("/watchlist/" + this.movieId).then((response) => {
        console.log(response.data);
        this.status = !this.status;
        if(this.status) {
          alert("Movie added to Watchlist")
        } else {
          alert("Movie removed from Watchlist")
        }
      });
    },
  },
  computed: {
    img_path() {
      return this.status ? "bookmark_filled.png" : "bookmark.png";
    },
  },
};
</script>

<style scoped>
.bookmark {
  cursor: pointer;
}
</style>