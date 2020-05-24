<template>
  <div class="container">
      <MeasureHeader :municipality="municipality" title="Aan welke opgave werkt u?"/>
      
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
import { Collapsible } from "../../components/UI"
import { MeasureHeader } from "../../components/Measures"

export default {
    components: {
        Collapsible,
        MeasureHeader
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
            this.$router.push(`/measure/${id}`)
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