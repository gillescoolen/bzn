<template>
  <div class="container">
    <div>
      <h1>Selecteer je stuff</h1>
      <p>ff mooie gemeente select</p>
      <Button
        class="button"
        @click="setColor(`#${Math.floor(Math.random()*16777215).toString(16)}`)"
        :style="{'background-color': color}"
      >Gay Color Changer 3000</Button>
    </div>

    <div class="buttons">
      <Button
        class="button"
        @click="$router.push('tasks')"
        :style="{'background-color': color}"
      >Aan de slag met biodiversiteit!</Button>
      <Button
        class="button"
        @click="$router.push('tasks')"
        :style="{'background-color': color}"
      >Aan de slag met een opgave!</Button>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
import { Button } from '../../components/UI';

export default {
  components: {
    Button
  },

  methods: {
    ...mapActions({
      setColor: 'steps/setColor'
    })
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

  .buttons {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }

  .button {
    color: white;
  }
}
</style>
