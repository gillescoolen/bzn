<template>
    <div class="select" v-if="answers && answers.length !== 0">
        <div class="dropdown" :class="dropdownBorder" @click="expanded = !expanded">
            <span>{{selected.answer}}</span>

            <button :class="dropdownButtonClass" >
                <img src="/assets/caret-right-solid.svg" alt="caret-right">
            </button>
        </div>
        
        <ul v-if="expanded" class="answers">
            <li v-for="answer_model in answers" v-bind:key="answer_model.id" class="answer" :class="selected == answer_model ? 'selected' : ''" @click="selected = answer_model">
                <span>{{answer_model.answer}}</span>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        Panswers: null
    },
    data () {
        return {
            selected: undefined,
            answers: undefined,
            expanded: false
        }
    },
    mounted() {
        this.answers = this.Panswers;
        this.selected = this.answers[0];
    },
    computed: {
        dropdownBorder () {
            if (this.expanded) {
                return 'border-secondary'
            } else {
                return 'border-primary'
            }
        },
        dropdownButtonClass() {
            if (this.expanded) {
                return 'bg-secondary expanded'
            } else {
                return 'bg-primary'
            }
        }
    }
}
</script>

<style lang="scss">
@import "./resources/sass/app.scss";

.select {
    width: 100%;

    .dropdown {
        margin-top: 5px;
        border: 2px solid $secondary;
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

            img {
                position: absolute;
                height: 20px;
                width: 20px;
                padding: 0;
                margin: 0;
                right: -1px;
                filter: invert(1);

                -webkit-transition: -webkit-transform .2s ease-in-out;
                transition: transform .2s ease-in-out;
            }
        }

        button.expanded {
            img {
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
            background: $secondary;

            span {
                color: white;
            }
        }
    }
}
</style>