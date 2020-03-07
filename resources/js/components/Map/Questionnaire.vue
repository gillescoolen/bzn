<template>
  <div class="wrapper">
    <transition name="fade" mode="out-in">
      <div v-if="show" class="questionnaire">

        <div class="header">
          <h1>Biodiversiteit</h1>
          <button @click="show = false">
            <span>x</span>
          </button>
        </div>
        <p>Wilt u de biodiversiteit binnen uw gemeente vergroten? BZN biedt met deze tool de mogelijkheid inzichten te vergaren voor het creëren van een diervriendelijke leefomgeving.</p>
        
        <div class="questions">
            <div v-for="question in questions" v-bind:key="question.id" class="question">
                <p class="title">{{question.title}}</p>
                <p class="question">{{question.question}}</p>
                <select class="option">
                    <option v-for="option in question.options" v-bind:key="option" :value="option">{{option}}</option>
                </select>
            </div>
        </div>

        <div class="buttons">
            <button class="bg-disabled" disabled>Vorige</button>
            <button class="bg-secondary">Volgende</button>
            <button class="bg-primary">Vergelijk kaarten</button>
        </div>

      </div>
      <img
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
export default {
  data() {
    return {
      show: true,
      questions: undefined
    };
  },
  mounted() {
      this.setQuestions();
  },
  methods: {
      setQuestions () {
          const questions = [
              {
                  title: 'Vraag 1',
                  question: 'Welk dier vind je belangrijk?',
                  options: [
                      'Konijnen',
                      'Koeien',
                      'Kippen',
                      'Honden',
                      'Bevers'
                  ]
              },
              {
                  title: 'Vraag 2',
                  question: 'Welke kaas vind je goed bij de regio passen?',
                  options: [
                      'Blauwe kaas',
                      'Jong belegen'
                  ]
              },
              {
                  title: 'Vraag 3',
                  question: 'Welke soort bomen vind je mooi?',
                  options: [
                      'Amerikaanse eiken',
                      'Dennenbomen',
                      'Wilgen'
                  ]
              }
          ]
          this.questions = questions;
      }
  }
};
</script>

<style lang="scss" scoped>
$primary: #744144;
$secondary: #45BF63;
$disabled: #A5A5A5;
$darkgray: #585858;

.bg-primary {
    background-color: $primary;
}

.bg-secondary {
    background-color: $secondary;
}

.bg-disabled {
    background-color: $disabled;
}

.bg-darkgray {
    background-color: $darkgray;
}

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

  .questionnaire {
    background-color: white;
    border-radius: 10px;
    width: 300px;
    padding: 15px;

    .header {
      display: flex;
      align-items: center;
      justify-content: space-between;

      h1 {
        color: $primary;
        margin: 0;
      }

      button {
        background-color: $primary;
        color: white;
        border: none;
        padding: 15px;
        border-radius: 50%;
        width: 10px;
        height: 10px;
        display: flex;
        justify-content: center;
        align-items: center;

        span {
          font-size: 20px;
          height: 20px;
          line-height: 16px;
          cursor: pointer;
        }
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
                color: $primary;
            }
            
            .title {
                font-weight: bold;
            }
        }
    }

    .buttons {
        display: flex;
        flex-direction: column;

        button {
            border: none;
            cursor: pointer;
            padding: 5px;
            margin: 5px 0;
            font-size: 15px;
            font-weight: bold;
            color: white;
            text-transform: uppercase;
            border-radius: 5px;
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