<template>
    <div class="header">
          <img :src="municipality.img" :alt="`Een afbeelding van gemeente ${municipality.name}`">
          <h2 class="title">{{title}}</h2>
          <BackButton />
      </div>
</template>

<script>
import { BackButton } from "../UI"

export default {
    name: "TaskHeader",
    
    components: {
        BackButton
    },

    props: {
        municipality: {
            type: Object,
            required: true
        },
        title: {
            type: String,
            required: true
        }
    }
}
</script>

<style lang="scss" scoped>
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