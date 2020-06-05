<template>
  <div>
    <button class="mt-2" @click="comment">
      <svg
        fill="none"
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        stroke="currentColor"
        viewBox="0 0 24 24"
        class="h-6 w-6"
      >
        <path
          d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
        />
      </svg>
    </button>
  </div>
</template>

<script>
export default {
  props: ["userId", "postId"],
  mounted() {
    console.log("comment system ready");
  },
  data: function() {
    return {};
  },
  methods: {
    comment() {
      console.log("je kan nu een comment plaatsen");
    }
  },
  computed: {}
};
</script>
