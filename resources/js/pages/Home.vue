<template>
  <div class="main">
      <Map/>
  </div>
</template>

<script>
import { Map } from "../components/Map";
export default {
    components: {
        Map
    }
}
</script>

<style lang="scss" scoped>
.main {
    width: 100vw;
    height: 100vh;
    max-width: 100%;
    max-height: 100%;
}
</style>