<template>
  <div class="municipality-container">
    <h3>Selecteer uw gemeente</h3>
    <div class="municipality-list">
      <div
        class="municipality"
        v-for="municipality in this.municipalities"
        v-bind:key="municipality.id"
        @click="handleClickMunicipality(municipality)"
      >
        <img :src="`/assets/municipalities/${municipality.imgpath}`" :alt="municipality.imgpath"/>
        <p>{{municipality.name}}</p>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';

export default {
  name: 'MunicipalityList',

  data () {
    return {
      municipalities: []
    };
  },

  async mounted () {
    this.municipalities = await this.fetchMunicipalities();
  },

  methods: {
    async fetchMunicipalities () {
      try {
        const { data: res } = await this.$http.get('/api/municipalities');
        return res;
      } catch (error) {
        console.error('Error fetching questions: ', error);
      }
    },

    ...mapActions({
      setColor: 'steps/setColor',
      setMunicipalityID: 'steps/setMunicipalityID',
      setMunicipality: 'municipalities/set'
    }),

    handleClickMunicipality (municipality) {
      this.setMunicipality(municipality);
      this.setColor(municipality.hexcolor);
      this.$router.push('tasks-or-guidetypes');
    }
  },

  computed: {
    ...mapGetters({
      color: 'steps/color'
    })
  }
};
</script>

<style lang="scss" scoped>
h3 {
  text-align: center;
  width: 100%;
  font-family: 'Bebas Neue';
  font-size: 30px;
}

.municipality-container {
    position: relative;
    z-index: 1;
}

.municipality-list {
    margin: 0 auto;
    display: table;

    .municipality {
        background-color: white;
        border: 1px solid #dadada;
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        padding: 0 15px;
        min-width: 300px;
        cursor: pointer;
        transition: transform 0.1s ease-in-out;

        img {
            width: 50px;
            padding: 5px;
        }

        p {
            font-family: "Midnight Champion";
            font-size: 25px;
            text-transform: uppercase;
            margin: 0 0 0 15px;
        }
    }
    .municipality:hover {
        transform: translate(5px, -5px);
    }
}
</style>
