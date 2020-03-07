<template>
  <div class="wrapper">
    <img id="tree-icon" src="/assets/tree-solid.svg" alt="tree-icon" />
  </div>
</template>

<script>
export default {
  data() {
    return {
      show: false,
      questions: undefined
    };
  }
};
</script>

<style lang="scss" scoped>
.wrapper {
  position: absolute;
  top: 48px;
  z-index: 1000;
  height: 50px;
  width: 50px;
  right: 0px;
  margin: 1rem;

  #tree-icon {
    cursor: pointer;
    filter: drop-shadow(3px 3px 3px rgba(0, 0, 0, 0.7));
  }
  #tree-icon:hover {
    filter: drop-shadow(5px 5px 5px rgba(0, 0, 0, 0.7));
  }
}
</style>