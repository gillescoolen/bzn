<template>
  <div class="container">
      <div class="header">
          <img :src="municipality.img" :alt="`Een afbeelding van gemeente ${municipality.name}`">
          <h2 class="title">Aan welke opgave werkt u?</h2>
          <BackButton />
      </div>
      <div class="measures-list">
          <div class="measure" v-for="measure in measures" v-bind:key="measure.id">
              <Collapsible>
                <template v-slot:title>
                    <h3 class="title">{{`Opgave ${measure.id}: ${measure.name}`}}</h3>
                </template>
                <template v-slot:content>
                    <span class="desc">{{measure.desc.substr(0, 150)}}...</span>
                    <a class="read-more" @click="gotoMeasure(measure.id)">Lees meer</a>
                </template>
              </Collapsible>
          </div>
      </div>
  </div>
</template>

<script>
import { BackButton, Collapsible } from "../../components/UI"

export default {
    components: {
        BackButton,
        Collapsible
    },

    data() {
        return {
            municipality: {
                name: 'Den Haag',
                img: '/assets/logo-gemeente-denhaag.png'
            },
            measures: []
        }
    },

    mounted() {
        this.loadMeasures()
    },

    methods: {
        loadMeasures () {
            for (let i = 1; i <= 10; i++) {
                this.measures.push({
                    id: i,
                    name: 'Lorem ipsum dolor sit amet',
                    desc: '(Beschrijving) Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia quod id aliquam ratione qui fugiat fuga tempora minima autem excepturi nobis est, aspernatur odio deserunt? Id vero similique natus esse temporibus aliquid vel totam sunt corrupti, voluptas architecto ipsam recusandae error in alias. Aliquam explicabo dolorem tenetur eos qui labore.'
                })
            }
        },

        gotoMeasure(id) {
            console.log('Gotomeasure:', id)
        }
    }
};
</script>

<style lang="scss" scoped>
.container {
  height: 100%;
  display: flex;
  flex-direction: column;
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

.measures-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;

    .measure {
        margin: 10px;
        max-width: 400px;

        .title {
            padding: 5px;
            cursor: pointer;
            font-style: italic;
            font-weight: normal;
        }

        .read-more {
            color: green;
            cursor: pointer;
        }
    }
}

@media only screen and (max-width: 1000px) {
    .header {
        flex-direction: column;
    }

    .measure {
        width: 100% !important;
    }
}

@media only screen and (min-width: 1000px){
    .measure {
        width: calc(50% - 20px) !important;
    }
}

@media only screen and (min-width: 1400px){
    .measure {
        width: 30% !important;
    }
}


</style>