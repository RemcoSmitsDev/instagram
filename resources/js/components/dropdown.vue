<template>
  <div>
    <div id="dropdown" class="relative">
      <button @click="isOpen = !isOpen" class="dropdown inline-flex space-x-px py-2">
        <span class="rounded-full h-1 w-1 bg-gray-400"></span>
        <span class="rounded-full h-1 w-1 bg-gray-400"></span>
        <span class="rounded-full h-1 w-1 bg-gray-400"></span>
      </button>

      <div
        v-show="isOpen"
        class="dropdown-menu p-4 mt-2 absolute right-0 bg-white rounded shadow-2xl"
      >
        <span class="block">
          <h3 class="text-gray-600 text-lg">Kopieer link</h3>
          <input
            class="px-4 py-1 bg-gray-300 select-all"
            type="text"
            v-bind:value="'localhost:8000/p/' +  post_id"
          />
        </span>
        <span class="block">
          <h3 class="text-gray-600 text-lg">Deel via whatsapp</h3>
          <a
            v-bind:href="'whatsapp://send?text=Bekijk deze post:'+ post_caption + 'Click here localhost:8000/p/' + post_id"
          >Nu delen</a>
        </span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["postId", "postCaption"],
  data() {
    return {
      post_id: this.postId,
      post_caption: this.postCaption,
      isOpen: false
    };
  },

  methods: {}
};
</script>