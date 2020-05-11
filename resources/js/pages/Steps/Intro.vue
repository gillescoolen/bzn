<template>
  <div class="container">
    <div>
      <h1>Informatie over de Website</h1>
      <p>Prachtige placeholder tekst!</p>
    </div>

    <router-link to="config">
      <Button class="button" :style="{'background-color': color}">Verder</Button>
    </router-link>
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