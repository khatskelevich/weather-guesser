<template>
  <div>
    <div v-if="loaded">
      <div :id=1 class="button" @click="chooseCity(1)">{{ cities[0].temperature }}<br>{{ cities[0].city }}</div>
      <div :id=2 class="button" @click="chooseCity(2)">{{
          cities[1].temperature
        }}<br>{{ cities[1].city + ', ' + cities[1].country }}
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
          })
          .catch(function (resp) {
            console.log(resp);
            alert("Error. Failed download cities.");
          });
    },
    chooseCity(id) {
      this.storeResult();
      this.getNewCities();
    }
  },
}
</script>

<style scoped>

</style>