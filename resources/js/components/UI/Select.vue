<template>
  <div class="select" v-if="answers && answers.length !== 0">
    <div
      class="dropdown"
      @click="expanded = !expanded"
      :class="expanded ? 'border-secondary' : 'border-primary'"
    >
      <span>{{selected.answer}}</span>

      <button :class="expanded ? 'bg-secondary expanded' :'bg-primary'">
        <i class="fas fa-caret-right"></i>
      </button>
    </div>

    <ul v-if="expanded" class="answers">
      <li
        v-for="answer in answers"
        class="answer"
        v-bind:key="answer.id"
        @click="setAnswer(answer)"
        :class="selected == answer ? 'selected' : ''"
      >
        <span>{{answer.answer}}</span>
      </li>
    </ul>
  </div>
</template>

<script>
import { mapActions } from 'vuex';

export default {
    props: {
        Panswers: null
    },
    data() {
        return {
            selected: undefined,
            answers: undefined,
            expanded: false
        };
    },

    methods: {
        ...mapActions({
            setLayer: 'map/set'
        }),

        setAnswer(answer) {
            this.setLayer(answer.layer);
            this.selected = answer;
            this.expanded = false;
        }
    },

    mounted() {
        this.answers = this.Panswers;
        this.selected = this.answers[0];
    }
};
</script>

<style lang="scss" scoped>
.select {
    width: 100%;

    .dropdown {
        margin-top: 5px;
        border: 2px solid var(--secondary);
        border-radius: 5px;
        padding: 5px;
        display: flex;
        justify-content: space-between;
        cursor: pointer;

        button {
            position: relative;
            height: 20px;
            width: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            border: none;

            i {
                position: absolute;
                height: 20px;
                width: 20px;
                padding: 0;
                margin: 0;
                right: -1px;
                filter: invert(1);

                -webkit-transition: -webkit-transform 0.2s ease-in-out;
                transition: transform 0.2s ease-in-out;
            }
        }

        button.expanded {
            i {
                transform: rotate(90deg);
                right: 0;
                top: 2px;
            }
        }
    }

    span {
        font-size: 15px;
        color: #3d3d3d;
    }

    .answers {
        list-style: none;
        margin: 0;
        padding: 0;

        .answer {
            border: 1px solid grey;
            border-radius: 5px;
            padding: 5px;
            margin-top: 2px;
            cursor: pointer;
        }

        .answer.selected {
            font-weight: bold;
        }

        .answer:hover {
            background: var(--secondary);

            span {
                color: white;
            }
        }
    }
}
</style>