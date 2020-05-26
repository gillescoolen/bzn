<template>
  <div class="container">
    <img
      class="logo"
      src="/assets/BIO_logo.png"
      alt="Het logo van biodiversiteit bosgroep zuid nederland"
    />

    <div class="block-1">
      <div class="header">
        <h1>Biodiversiteit</h1>
        <h3>Stresstest</h3>
      </div>

      <MunicipalityList />

      <Title>Over het project</Title>
    </div>

    <div class="about" v-if="textblocksLoaded">
      <div class="boxes">
        <div class="project_explanation">
          <h3>Uitleg project</h3>
          <p>{{ textblocks.project_explanation }}</p>
        </div>
        <div class="project_purpose">
          <h3>Doel project</h3>
          <p>{{ textblocks.project_purpose }}</p>
        </div>
      </div>
    </div>

    <Title>Partners</Title>

    <PartnerList />
  </div>
</template>

<script>
import { PartnerList, MunicipalityList, Title } from '../../components/Intro';

export default {
  name: 'Intro',

  components: {
    PartnerList,
    MunicipalityList,
    Title
  },

  data () {
    return {
      textblocks: {
        project_explanation: undefined,
        project_purpose: undefined
      },
      textblocksLoaded: false
    };
  },

  mounted () {
    this.fetchTextblocks();
  },

  methods: {
    async fetchTextblocks () {
      const textBlockKeysToFetch = Object.keys(this.textblocks).map(k => k);
      const res = await this.$http.get('/api/textblocks', {
        params: {
          keys: textBlockKeysToFetch
        }
      });

      res.data.forEach(d => {
        this.textblocks[d.key] = d.content;
      });

      this.textblocksLoaded = true;
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

  .button {
    width: 5rem;
    color: white;
  }

  .logo {
    transform: rotate(-20deg);
    width: 300px;
    z-index: 0;
    position: absolute;
    right: -30px;
    top: 30%;
  }

  .block-1 {
    height: calc(100vh - 4rem);

    .header {
      text-transform: uppercase;

      h1 {
        font-family: 'Bebas Neue';
        font-size: 70px;
        margin: 0;
      }

      h3 {
        font-family: 'Midnight Champion';
        font-size: 50px;
        margin: -20px 0 0 130px;
      }
    }

    .municipality-container {
      margin-top: 100px;
      min-height: calc(100% - 340px);
    }
  }

  .about {
    z-index: 1;

    .boxes {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;

      > div {
        padding: 15px;
        max-width: 500px;
      }

      h3 {
        font-family: 'Midnight Champion';
        font-size: 40px;
        font-weight: normal;
        text-transform: uppercase;
        text-align: center;
      }

      p {
        font-size: 18px;
      }
    }
  }
}

@media only screen and (max-width: 1000px) {
  .logo {
    width: 30% !important;
  }
}
</style>
