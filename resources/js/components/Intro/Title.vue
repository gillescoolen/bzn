<template>
  <div class="title">
    <span>
      <i class="fas fa-arrow-down"></i>
    </span>
    <h4>
      <slot />
    </h4>
  </div>
</template>

<script>
export default {
  name: 'Title'
};
</script>

<style lang="scss" scoped>
.title {
  display: flex;
  justify-content: center;
  align-items: center;

  span {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    height: 30px;
    width: 30px;
    margin-right: 10px;
    background-color: orange;
    border-radius: 50%;

    i {
      color: white;
      font-size: 20px;
    }
  }

  h4 {
    font-family: 'Midnight Champion';
    font-size: 30px;
    font-weight: normal;
    text-transform: uppercase;
    margin-left: 10px;
  }
}
</style>
