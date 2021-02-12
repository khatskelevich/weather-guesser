<template>
  <nav class="navigation">
    <div class="navigation-links">
      <div class="navigation-item navigation-logo">
        <logo></logo>
      </div>
      <div class="navigation-item navigation-link">
        <router-link :to="'/'">Game</router-link>
      </div>
      <div class="navigation-item navigation-link">
        <router-link :to="'/settings'">Profile</router-link>
      </div>
    </div>
    <div class="navigation-user">
      <div class="navigation-item" @click="dropdown=!dropdown">{{ username }}
        <arrow></arrow>
      </div>
      <div class="navigation-user-menu" :class="dropdown ? 'navigation-user-menu__show' : 'navigation-user-menu__hide'">
        <div @click="logout" class="navigation-user-menu__dropdown">logout</div>
      </div>
    </div>
  </nav>
</template>

<script>
import Logo from "./ui/Logo";
import Arrow from "./ui/Arrow";
import {mapGetters} from "vuex";

export default {
  components: {Logo, Arrow},
  data() {
    return {
      dropdown: false,
    }
  },
  methods: {
    logout() {
      axios.post('/logout').then(response => {
        window.location.href = '/welcome';
      }).catch(resp => {
        console.log(resp)
      });
    }
  },
  computed: {
    ...mapGetters({username: 'getUsername'})
  }
}
</script>

<style>
.navigation {
  border-bottom: 1px solid rgba(243, 244, 246, 1);
  background: white;
  display: flex;
  justify-content: space-between;
}

.navigation-links {
  margin-left: 20px;
  display: flex;
  flex-direction: row;
  justify-content: flex-start;
  align-items: flex-end;
}

.navigation-item {
  flex: 0 1 50px;
  height: 50px;
  margin: 0 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}

.navigation-logo {
  cursor: default;
}

.navigation-link {
  opacity: 0.5;
  transition: opacity 300ms;
}

.navigation-link:hover {
  opacity: 1;
  border-bottom: 2px solid gray;
  margin-bottom: -1px;
}

.navigation-user {
  margin-right: 50px;
  position: relative;
}

.navigation-user-menu {
  position: absolute;
  top: 35px;
  right: 10px;
  z-index: 1;
  background: white;
  min-width: 100px;
  border: 1px solid rgb(210, 210, 210);
  border-radius: 3px;
}

.navigation-user-menu__hide {
  display: none;
}

.navigation-user-menu__show {
  display: block;
}

.navigation-user-menu__dropdown {
  padding: 5px 10px;
  transition: background-color 300ms;
}

.navigation-user-menu__dropdown:hover {
  background: rgb(234, 235, 236);
}
</style>