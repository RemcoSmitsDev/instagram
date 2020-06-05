<template>
  <div>
    <input
      class="py-2 px-4 w-64 h-10 rounded border"
      @keyup="searchhit"
      type="text"
      v-model="search"
    />
    <div class="h-64 mt-4 space-y-4 overflow-y-auto">
      <div v-if="item.id !== null && item.id !== ''" v-for="item in zoekitems" v-bind:key="item.id">
        <div class="flex items-center">
          <a class="mr-2" v-bind:href="'/profile/'+ item.id">
            <p>{{ item.name }}</p>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      search: null,
      zoekitems: []
    };
  },

  methods: {
    searchhit() {
      axios
        .get("/zoeken/" + this.search)
        .then(response => {
          this.zoekitems = response.data;
        })
        .catch(errors => console.log(error));
    }
  }
};
</script>