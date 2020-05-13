<template>
  <div class="wrapper">
    <transition name="fade" mode="out-in">
      <div v-if="show" class="questionnaire">
        <div class="header">
          <h1>Biodiversiteit</h1>
          <Button dusk="questionnaire-hide" @click="show = false" :variant="`error`">X</Button>
        </div>
        <p>Wilt u de biodiversiteit binnen uw gemeente vergroten? BZN biedt met deze tool de mogelijkheid inzichten te vergaren voor het creëren van een diervriendelijke leefomgeving.</p>

        <div class="loader" v-if="questions === null || questions.length === 0">
          <Spinner stroke="#744144" />
          <p>Vragenlijst laden...</p>
        </div>
        <div v-else>
          <div class="questions">
            <div v-for="question in questions" v-bind:key="question.id" class="question">
              <p class="title">{{question.title}}</p>
              <p class="question">{{question.question}}</p>
              <Select :Panswers="question.answers" />
            </div>
          </div>

          <div class="buttons">
            <Button disabled :variant="`disabled`">Vorige</Button>
            <Button :variant="`secondary`">Volgende</Button>
            <Button :variant="`primary`">Vergelijk kaarten</Button>
          </div>
        </div>
      </div>

      <img
        dusk="questionnaire-show"
        v-else
        @click="show = true"
        class="tree-icon"
        src="/assets/tree-solid.svg"
        alt="tree-icon"
      />
    </transition>
  </div>
</template>

<script>
import { Select, Spinner, Button } from '../UI';

export default {
  components: {
    Select,
    Spinner,
    Button
  },

  data() {
    return {
      show: false,
      questions: null
    };
  },

  async mounted() {
    this.questions = await this.fetchQuestions();
  },

  methods: {
    async fetchQuestions() {
      try {
        const { data: res } = await this.$http.get('api/questions');
        return res;
      } catch (error) {
        console.error('Error fetching questions: ', error);
      }
    }
  }
};
</script>

<style lang="scss" scoped>
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

  .loader {
    padding: 15px;
    height: 150px;
    position: relative;
    margin-top: -10px;
    border-radius: 10px;
    background-color: white;

    p {
      color: #555;
      text-align: center;
      font-weight: bold;
    }
  }

  .questionnaire {
    width: 300px;
    padding: 15px;
    max-height: 90vh;
    overflow-y: auto;
    border-radius: 10px;
    background-color: white;

    .header {
      display: flex;
      align-items: center;
      justify-content: space-between;

      h1 {
        color: var(--primary);
        margin: 0;
      }
    }

    > p {
      color: #555;
    }

    .questions {
      margin: 25px 0;

      .question {
        margin: 15px 0;

        > p {
          margin: 5px 0;
          color: var(--primary);
        }

        .title {
          font-weight: bold;
        }

        .select {
          margin-top: 10px;
        }
      }
    }

    .buttons {
      display: flex;
      flex-direction: column;

      button {
        margin: 5px 0;
        font-size: 15px;
        text-transform: uppercase;
      }

      .bg-disabled {
        cursor: not-allowed;
      }
    }
  }
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>