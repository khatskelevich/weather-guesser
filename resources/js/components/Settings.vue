<template>
  <div class="flex flex-col">
    <div class="overflow-x-auto">
      <div class="py-2 align-middle inline-block min-w-full">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
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
                      {{toDate(row.created_at)}}
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
  </div>
</template>

<script>
export default {
  data() {
    return {
      history: [],
    }
  },
  created() {
    this.getHistory();
  },
  methods: {
    getGameStat(str) {
      let output = '';
      for (let item of JSON.parse(str)) {
        output += item.city + ', ' + item.country + ',  ' + item.temperature + ' ';
      }
      return output;
    },
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
    toDate(input_date){
      let date = new Date(input_date);
      return date.toLocaleDateString();
    }
  }
}
</script>

<style scoped>

</style>