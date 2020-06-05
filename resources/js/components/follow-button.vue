<template>
  <div>
    <button
      class="px-3 py-1 w-full bg-blue-500 text-white rounded"
      @click="followUser"
      v-text="buttonText"
    ></button>
  </div>
</template>

<script>
export default {
  props: ["userId", "follows"],
  mounted() {},
  data: function() {
    return {
      status: this.follows
    };
  },
  methods: {
    followUser() {
      axios
        .post("/follow/" + this.userId)
        .then(response => {
          this.status = !this.status;
        })
        .catch(errors => {
          if (errors.response.status == 401) {
            window.location = "/login";
          }
        });
    }
  },
  computed: {
    buttonText() {
      return this.status ? "Unfollow" : "Follow";
    }
  }
};
</script>
