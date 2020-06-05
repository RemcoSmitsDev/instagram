<template>
  <div>
    <p id="success"></p>
    <button class="flex items-center" @click="likePost">
      <span v-bind:class="{ status: liked, 'text-red-300': 'text-gray-200' }">
        <svg
          class="h-6 w-6"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
          />
        </svg>
      </span>
      <span v-text="buttonText" class="-mt-1"></span>
    </button>
  </div>
</template>

<script>
export default {
  props: ["post", "liked"],
  mounted() {},
  data: function() {
    return {
      status: this.liked
    };
  },
  methods: {
    likePost() {
      console.log(this.status);
      axios
        .post("/like/" + this.post, { post: this.post })
        .then(response => {
          this.status = !this.status;
        })
        .catch(errors => {});
    }
  },
  computed: {
    buttonText() {
      return this.status ? "like" : "liked";
    }
  }
};
</script>
