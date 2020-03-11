<template>
  <div class="main">
      <Map dusk="map"/>
      <Legend dusk="legend"/>
  </div>
</template>

<script>
import { Map, Legend } from "../components/Map";

export default {
    components: {
        Map,
        Legend
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