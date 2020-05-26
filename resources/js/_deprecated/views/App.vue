<template>
    <div class="container">
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
  },

  created () {
    const token = document
      .querySelector('meta[name=\'tkn\']')
      .getAttribute('content');

    this.$http.defaults.headers.Accept = 'application/json';
    this.$http.defaults.headers.Authorization = `Bearer ${token}`;
  }
};
</script>

<style lang="scss">
body {
    margin: 0;
    overflow: hidden;
    font-family: "Arial";
}
</style>
