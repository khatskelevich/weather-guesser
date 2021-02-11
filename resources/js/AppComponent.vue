<template>
  <div>
    <layout></layout>
    <router-view></router-view>
  </div>
</template>

<script>
import Layout from "./components/Layout";

export default {
  components: {Layout},
  name: "AppComponent"
}
</script>