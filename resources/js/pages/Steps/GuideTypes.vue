<template>
  <div class="container">
    <div>
      <h1>Gidsoorten voor {{municipality.name}}</h1>
    </div>
    <div class="guidetypes">
      <Button
        @click="renderMap(guidetype.answers)"
        class="guidetype button"
        :style="{'background-color': color}"
        v-for="guidetype in guidetypes"
        :key="guidetype.id"
      >
      {{ guidetype.question }}
    </Button>
    </div>
    <div class="map">
      <Map/>
    </div>
    <Button class="button" @click="$router.go(-1)" :style="{'background-color': color}">Terug</Button>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
import { Map } from '../../components/Map';
import { Button } from '../../components/UI';

export default {
  components: {
    Map,
    Button
  },

  data () {
    return {
      guidetypes: null
    };
  },

  computed: {
    ...mapGetters({
      color: 'steps/color',
      municipality: 'municipalities/get'
    })
  },

  mounted () {
    this.fetchGuidetypes();
  },

  methods: {
    ...mapActions({
      setLayer: 'map/set'
    }),

    async fetchGuidetypes () {
      try {
        const { data: res } = await this.$http.get('/api/guidetypes');
        this.guidetypes = res;
      } catch (error) {

      }
    },

    renderMap (layer) {
      this.setLayer(layer);
    }
  }
};
</script>

<style lang="scss" scoped>
.container {
  display: flex;
  flex-direction: column;
  justify-content: space-between;

  .button {
    width: 5rem;
    color: white;
  }

  .guidetypes {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-between;

    .guidetype {
      padding: 1rem;
      width: 45vw;

      @media only screen and (max-width: 768px) {
        width: 90vw;
      }
    }
  }

  .map {
    border-radius: 1rem;
    height: 45vh
  }
}
</style>
