<template>
  <div>
    <img
      class="bookmark w-12 cursor-pointer transform hover:scale-105"
      @click="addToWatchlist"
      :src="'/storage/' + img_path"
      :alt="movieId"
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
        this.status = !this.status;
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


