<template>
  <div>
    <button @click="addToWatchlist" v-text="buttonText"></button>
    <img
      class="bookmark"
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
      });
    },
  },
  computed: {
    buttonText() {
      return this.status ? "Remove from Watchlist" : "Add to Watchlist";
    },

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