<template>
  <div class="wrapper">
    <div v-if="show" class="questionnaire">
      <div class="header">
        <h1>Biodiversiteit</h1>
        <button class="btn btn-primary" @click="show = false">
          <span>x</span>
        </button>
      </div>
      <p>Wilt u de biodiversiteit binnen uw gemeente vergroten? BZN biedt met deze tool de mogelijkheid inzichten te vergaren voor het creëren van een diervriendelijke leefomgeving.</p>
      <div class="questions"></div>
    </div>
    <img v-else @click="show = true" class="tree-icon" src="/assets/tree-solid.svg" alt="tree-icon" />
  </div>
</template>

<script>
export default {
  data() {
    return {
      show: true,
      questions: undefined
    };
  }
};
</script>

<style lang="scss" scoped>
$primary: #744144;

.wrapper {
  position: absolute;
  top: 48px;
  z-index: 1000;
  right: 0px;
  margin: 1rem;

  .tree-icon {
    height: 50px;
    width: 50px;
    cursor: pointer;
    filter: drop-shadow(3px 3px 3px rgba(0, 0, 0, 0.7));
  }
  .tree-icon:hover {
    filter: drop-shadow(5px 5px 5px rgba(0, 0, 0, 0.7));
  }

  .questionnaire {
    background-color: white;
    border-radius: 10px;
    width: 300px;
    padding: 15px;

    .header {
      display: flex;
      align-items: center;
      justify-content: space-between;

      h1 {
        color: $primary;
        margin: 0;
      }

      button {
        background-color: $primary;
        color: white;
        border: none;
        padding: 15px;
        border-radius: 50%;
        width: 10px;
        height: 10px;
        display: flex;
        justify-content: center;
        align-items: center;

        span {
            font-size: 20px;
            height: 20px;
            line-height: 16px;
            cursor: pointer;
        }
      }
    }
  }
}
</style>