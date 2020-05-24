<template>
  <div class="container">
      <MeasureHeader :municipality="municipality" :title="`Opgave ${measure.id}`"/>
  </div>
</template>

<script>
import { MeasureHeader } from "../../components/Measures"

export default {
    name: "Measure",

    components: {
        MeasureHeader
    },

    data () {
        return {
            municipality: {
                name: 'Den Haag',
                img: '/assets/logo-gemeente-denhaag.png'
            },
            measure: {
                id: undefined
            }
        }
    },

    mounted() {
        this.loadMeasure()
    },

    methods: {
        loadMeasure () {
            this.measure.id = this.$route.params.id;
            if (!this.measure.id) {
                return this.$router.push('/measures');
            }
        },
    }
};
</script>

<style lang="scss" scoped>
.container {
  height: 100%;
  display: flex;
  flex-direction: column;
}
</style>