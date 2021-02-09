<template>

  <div v-if="data.length" class="tabs" @click="$emit('click')">
    <a class="tabs__item"
       :class="{tabs__item_active : (tab.id + '') === current}"
       v-on:click="setTab(tab.id)"
       v-for="tab in data"
       v-html="tab.name"
    ></a>
  </div>

</template>

<script>
export default {
  props: {
    data: Array,
    value: String
  },
  data() {
    return {
      current: this.value,
    };
  },
  methods: {
    setTab(id) {
      this.current = id + '';
      this.$emit('select', this.current);
    },
  },
  watch: {
    value() {
      this.current = this.value;
    }
  }
}
</script>

<style>

.tabs-container {
  display: flex;
}

.tabs-container .tabs {
  margin-left: 20px;
}

.tabs-container .tabs:first-child {
  margin-left: 0;
}

.tabs {
  display: flex;
  justify-content: left;
  line-height: 28px;
  height: 30px;
  margin: 5px;
}

.tabs__item {
  padding: 0 20px;
  font-weight: bold;
  color: gray;
  background-color: #FFF;
  cursor: pointer;
  border: 1px solid darkgray;
  white-space: nowrap;
}

.tabs__item:first-child {
  border-radius: 5px 0 0 5px;
}

.tabs__item:last-child {
  border-radius: 0 5px 5px 0;
}

.tabs__item_active {
  color: #FFF;
  background-color: darkgray;
}

</style>
