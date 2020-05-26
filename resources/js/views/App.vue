<template>
  <div class="container">
    <!-- Do this because the css-loader isn't very nice to use. -->
    <link rel="stylesheet" href="//unpkg.com/leaflet/dist/leaflet.css" />
    <component v-if="layout" :is="layout">
      <router-view></router-view>
    </component>
    <router-view v-else></router-view>
  </div>
</template>

<script>
export default {
  computed: {
    layout () {
      return this.$route.meta.layout;
    }
  }
};
</script>

<style lang="scss">
:root {
  --primary: #25643d;
  --secondary: #379734;
  --gray: #a5a5a5;
  --error: #da2828;
}

body {
  margin: 0;
  font-family: 'Arial';
  overflow-x: hidden;
}
</style>
