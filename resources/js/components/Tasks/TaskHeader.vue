<template>
    <div class="header">
          <img :src="`/assets/municipalities/${municipality.imgpath}`" :alt="`Een afbeelding van gemeente ${municipality.name}`">
          <h2 class="title" v-if="title">{{title}}</h2>
          <BackButton />
      </div>
</template>

<script>
import { BackButton } from "../UI"
import { mapGetters } from 'vuex';

export default {
    name: "TaskHeader",
    
    components: {
        BackButton
    },

    props: {
        title: {
            type: String,
            required: false
        }
    },

    computed: {
        ...mapGetters({
            municipality: 'municipalities/get'
        })
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

@media only screen and (max-width: 650px) {
    .header {
        flex-direction: column;
    }
}
</style>