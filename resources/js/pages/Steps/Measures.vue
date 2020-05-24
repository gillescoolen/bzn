<template>
  <div class="container">
      <div class="header">
          <img :src="municipality.img" :alt="`Een afbeelding van gemeente ${municipality.name}`">
          <h2 class="title">Aan welke opgave werkt u?</h2>
          <BackButton />
      </div>
      <div class="measures-list">

      </div>
  </div>
</template>

<script>
import { BackButton } from "../../components/UI"

export default {
    components: {
        BackButton
    },

    data() {
        return {
            municipality: {
                name: 'Den Haag',
                img: '/assets/logo-gemeente-denhaag.png'
            }
        }
    }
};
</script>

<style lang="scss" scoped>
.container {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;

    img {
        width: 100px;
    }

    .title {
        color: #d2ad15;
        font-weight: bold;
    }
}
</style>