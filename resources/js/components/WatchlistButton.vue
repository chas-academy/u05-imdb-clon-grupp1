<template>
  <div>
    <img
      class="bookmark w-12 cursor-pointer"
      @click="addToWatchlist"
      :src="'/storage/' + img_path"
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

        if(this.status) {
          console.log("Movie added to Watchlist", this.movieId)
        } else {
          console.log("Movie removed from Watchlist", this.movieId)
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

