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
  border-radius: 15px;
  background-color: #ffffff;
  box-shadow: 0px 0px 4px 0px #7a7a7a10;
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
