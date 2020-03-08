<template>
    <div class="select" v-if="options && options.length !== 0">
        <div class="dropdown" :class="dropdownBorder" @click="expanded = !expanded">
            <span>{{selected}}</span>

            <button :class="dropdownButtonClass" >
                <img src="/assets/caret-right-solid.svg" alt="caret-right">
            </button>
        </div>
        
        <ul v-if="expanded" class="options">
            <li v-for="option in options" v-bind:key="option" class="option" :class="selected == option ? 'selected' : ''" @click="selected = option">
                <span>{{option}}</span>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        Poptions: null
    },
    data () {
        return {
            selected: undefined,
            options: undefined,
            expanded: false
        }
    },
    mounted() {
        this.options = this.Poptions;
        this.selected = this.options[0];
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

<style lang="scss" scoped>
$primary: #744144;
$secondary: #45bf63;

.bg-primary {
    background-color: $primary;
}
.primary {
    color: $primary;
}
.bg-secondary {
    background-color: $secondary;
}
.secondary {
    color: $secondary;
}
.border-primary {
    border-color: $primary !important;
}
.border-secondary {
    border-color: $secondary !important;
}

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

    .options {
        list-style: none;
        margin: 0;
        padding: 0;

        .option {
            border: 1px solid grey;
            border-radius: 5px;
            padding: 5px;
            margin-top: 2px;
            cursor: pointer;
        }

        .option.selected {
            font-weight: bold;
        }

        .option:hover {
            background: $secondary;

            span {
                color: white;
            }
        }
    }
}
</style>