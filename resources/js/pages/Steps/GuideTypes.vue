<template>
  <div class="container">
    <div>
      <h1>Hele mooie gidssoorten</h1>
      <p>Prachtige placeholder tekst!</p>
    </div>

    <Button class="button" @click="$router.go(-1)" :style="{'background-color': color}">Terug</Button>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';
import { Button } from '../../components/UI';

export default {
  components: {
    Button
  },

  computed: {
    ...mapGetters({
      color: 'steps/color'
    })
  }
};
</script>

<style lang="scss" scoped>
.container {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;

  .button {
    width: 5rem;
    padding: 1rem;
    color: white;
  }
}
</style>