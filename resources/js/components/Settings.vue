<template>
  <div class="settings" v-if="this.loaded">
    <div class="tabs-container">
      <p class="mx-1">Set your units</p>
      <tabs :data="unitArray" :value="units" @select="saveUnit"></tabs>
    </div>

    <div class="wrap-table">
      <p class="mx-1">History</p>
      <div class="table">
        <table>
          <tbody class="table-body">
          <tr v-for="(row, index) in history" :class="row.guessed? 'guessed' : 'not-guessed'">
            <td class="table-body__cell">{{ toDate(row.created_at) }}</td>
            <td class="table-body__cell">{{ row.game_stat[0].city }}, {{ row.game_stat[0].country }}</td>
            <td class="table-body__cell">{{ row.game_stat[0].temperature | temperature(units) }}</td>
            <td class="table-body__cell">{{ row.game_stat[1].temperature | temperature(units) }}</td>
            <td class="table-body__cell">{{ row.game_stat[1].city }}, {{ row.game_stat[1].country }}</td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import Tabs from "./ui/Tabs";
import {mapGetters} from "vuex";

export default {
  components: {
    Tabs
  },
  data() {
    return {
      unitArray: [
        {id: 'metric', name: 'Celsius'},
        {id: 'imperial', name: 'Fahrenheit'},
        {id: 'default', name: 'Kelvin'},
      ],
      history: [],
      loaded: false,
    }
  },
  created() {
    this.getHistory();
  },
  methods: {
    getHistory() {
      axios.get('history')
          .then((response) => {
            this.history = response.data;
            this.loaded = true;
          })
          .catch(function (resp) {
            console.log(resp);
            alert("Error. Failed download history.");
          });
    },
    toDate(input_date) {
      let date = new Date(input_date);
      return date.toLocaleDateString();
    },
    saveUnit(id) {
      axios.post('settings', {'units': id})
          .then()
          .catch(function (resp) {
            console.log(resp);
            alert("Error. Failed upload settings.");
          });
    }
  },
  computed: {
    ...mapGetters({units: 'getUnits'}),
  }
}
</script>
<style>
.settings {
  margin: 0 auto;
  padding: 20px 0;
  width: 66.66667%;
}
.table-body{
  max-height: 400px;
}

.guessed {
  background-color: rgba(43, 233, 43, 0.2);
}

.not-guessed {
  background-color: rgba(233, 43, 49, 0.2);
}
</style>