<template>
  <div class="main">
      <Map dusk="map"/>
      <Legend dusk="legend"/>
      <Questionnaire/>
  </div>
</template>

<script>
import { Map, Legend, Questionnaire } from "../components/Map";

export default {
    components: {
        Map,
        Legend,
        Questionnaire
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