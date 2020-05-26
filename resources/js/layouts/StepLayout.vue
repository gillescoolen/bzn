<template>
  <div class="content">
    <transition name="fade" mode="out-in">
      <slot />
    </transition>
  </div>
</template>

<style lang="scss" scoped>
.content {
  margin: 2rem;
  min-height: 50vh;
  background-color: #ffffff;
  overflow-y: auto;
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
