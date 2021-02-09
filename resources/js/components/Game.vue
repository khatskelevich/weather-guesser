<template>
  <div v-if="loaded" class="row">
    <div class="mx-auto py-8 text-center">
      <h3 class="text-4xl">Where is the hotter?</h3>
    </div>
    <div class="max-w-screen-sm mx-auto">
      <div class="sm:grid grid-cols-4 gap-5 mx-auto px-16 g-buttons">
        <div class="col-start-1 col-end-3 my-2">
          <div @click="chooseCity(0)"
               class="h-full p-6 dark:bg-gray-800 bg-white hover:shadow-xl rounded border-b-4 border-red-500 shadow-md">
            <p class="text-lg">{{ cities[0].city + ', ' + cities[0].country }}</p>
            <p v-if="cShowTemperature" class="text-2xl mb-3 font-semibold inline-flex">
              {{ cities[0].temperature }}
            </p>
          </div>
        </div>
        <div class="col-end-5 col-span-2 my-2">
          <div @click="chooseCity(1)"
               class="h-full p-6 dark:bg-gray-800 bg-white hover:shadow-xl rounded border-b-4 border-red-500 shadow-md text-right">
            <p class="text-lg">{{ cities[1].city + ', ' + cities[1].country }}</p>
            <p v-if="cShowTemperature" class="text-2xl mb-3 font-semibold inline-flex ">
              {{ cities[1].temperature }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      cities: [],
      loaded: false,
      guessed: Boolean
    }
  },
  created() {
    this.getNewCities();
  },
  methods: {
    storeResult() {
      const data = {'guessed': this.guessed, 'game_stat': this.cities};
      axios.post('history', data)
          .then()
          .catch(function (resp) {
            console.log(resp);
            alert("Error. Failed download results.");
          });
    },
    getNewCities() {
      axios.get('api/cities')
          .then((response) => {
            this.cities = response.data;
            this.loaded = true;
            this.guessed = null;
          })
          .catch(function (resp) {
            console.log(resp);
            alert("Error. Failed download cities.");
          });
    },
    chooseCity(id) {
      this.guessed = this.cities[id].temperature === Math.max(this.cities[0].temperature, this.cities[1].temperature);
      this.storeResult();
      this.getNewCities();
    },
  },
  computed: {
    cShowTemperature() {
      return this.guessed !== null;
    }
  }
}
</script>

<style scoped>
 .g-buttons {
  height: 200px;
}
</style>