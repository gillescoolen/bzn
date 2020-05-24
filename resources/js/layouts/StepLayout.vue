<template>
  <div class="main" :style="{'background-color': color}">
    <div class="content">
      <transition name="fade" mode="out-in">
        <slot />
      </transition>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';

export default {
  computed: {
    ...mapGetters({
      color: 'steps/color'
    })
  }
};
</script>

<style lang="scss" scoped>
.main {
  display: flex;
  flex-direction: row;

  width: 100vw;
  height: 100vh;
  max-width: 100%;
  max-height: 100%;
  transition: background-color 0.2s;

  .content {
    width: 100%;
    margin: 4rem;
    padding: 2rem;
    min-height: 50vh;
    border-radius: 15px;
    background-color: #ffffff;
    box-shadow: 0px 0px 4px 0px #7a7a7a10;
    overflow-y: auto;
  }
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>