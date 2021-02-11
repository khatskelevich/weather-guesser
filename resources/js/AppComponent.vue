<template>
  <div>
    <layout></layout>
    <router-view></router-view>
  </div>
</template>

<script>
import Layout from "./components/Layout";
import {mapState, mapActions} from "vuex";

export default {
  components: {Layout},
  name: "AppComponent",
  created() {
    this.getUserData();
  },
  methods: {
    ...mapActions(['setUnits', 'setUsername']),
    getUserData() {
      axios.get('/userdata')
          .then(response => {
            debugger;
            this.setUnits(response.data.units);
            this.setUsername(response.data.username);
            debugger;
          })
          .catch(resp => {
            console.log(resp)
          })
    }
  },
  computed: {
  }
}
</script>