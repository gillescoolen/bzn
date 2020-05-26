<template>
  <div class="container">
    <div>
      <h1>Informatie over de Website</h1>
      <p>Prachtige placeholder tekst!</p>
      <router-link to="login">ff inloggen hiero</router-link>
    </div>

    <Button
      class="button"
      @click="$router.push('municipalities')"
      :style="{'background-color': color}"
    >Verder</Button>
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
    color: white;
  }
}
</style>
