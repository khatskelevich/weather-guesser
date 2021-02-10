<template>
  <div class="w-2/3 mx-auto py-4" v-if="this.loaded">
    <div class="tabs-container">
      <h3 class="mx-1">Set your units</h3>
      <tabs :data="unitArray" :value="unit" @select="saveUnit"></tabs>
    </div>
    <h3 class="text-2xl mx-1">Last 10 games</h3>
    <div class="py-2 align-middle inline-block">
      <div class="shadow border-b border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Date
            </th>
            <th scope="col" colspan="2"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Result
            </th>
          </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="(row, index) in history">
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
                <div class="ml-4">
                  <div class="text-sm font-medium text-gray-900">
                    {{ toDate(row.created_at) }}
                  </div>
                </div>
              </div>
            </td>
            <td colspan="2" class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-900">{{ getGameStat(row.game_stat) }}</div>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import Tabs from "./ui/Tabs";

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
      unit: String,
      loaded: false
    }
  },
  created() {
    this.getHistory();
  },
  methods: {
    getGameStat(str) {
      const filter = this.$options.filters;
      let output = '';
      for (let item of JSON.parse(str)) {
        output += item.city + ', ' + item.country + ',  ' + filter.temperature(item.temperature, this.unit) + ' ';
      }
      return output;
    },
    getHistory() {
      axios.get('history')
          .then((response) => {
            this.history = response.data.data;
            this.unit = response.data.unit;
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
            alert("Error. Failed download history.");
          });
    }
  },
}
</script>