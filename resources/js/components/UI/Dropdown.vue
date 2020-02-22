<template>
    <div class="wrapper">
        <transition name="fade" mode="out-in">
            <button v-if="show" key="on" @click="show = false">Sluiten</button>
            <button
                v-else
                key="off"
                @click="show = true"
            >{{(selected) ? selected.name : 'Selecteer een gemeente'}}</button>
        </transition>
        <transition name="dropdown">
            <ul class="menu" v-bind:class="{ active: show }" v-if="show">
                <li class="menu-item" :key="item.id" @click="select(item)" v-for="item in items">
                    <span>{{item.name}}</span>
                </li>
            </ul>
        </transition>
    </div>
</template>

<script>
export default {
    props: {
        items: null
    },

    data() {
        return {
            show: false,
            selected: null
        }
    },

    methods: {
        select(item) {
            this.selected = item;
            this.show = false;
        }
    },
}
</script>

<style lang="scss" scoped>
$width: 300px;

.wrapper {
    padding: 1rem;
    margin: 0.5rem;

    button {
        color: white;
        cursor: pointer;
        font-weight: 700;
        border: 1px solid transparent;
        background-color: transparent;

        &:focus {
            outline: none;
        }

        .icon {
            width: 1.65rem;
            height: 1.65rem;
        }
    }

    .menu {
        top: 100%;
        right: 0;
        z-index: 10;
        margin: 0.5rem;
        padding: 1rem;
        height: 40vh;
        min-width: $width;
        overflow-y: auto;
        position: absolute;
        border-radius: 5px;
        list-style-type: none;
        background-color: white;
        box-shadow: 0px 4px 4px 1px #00000040;

        &-item {
            cursor: pointer;
            border-bottom: 1px solid #dddddd;

            span {
                display: block;
                padding: 0.5rem;
                user-select: none;
                transition: 0.4s all;

                &:hover {
                    transition: 0.1s all;
                    transform: translateX(5px);
                }
            }

            &:last-child {
                border: none;
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

.dropdown-enter-active,
.dropdown-leave-active {
    transition: all 0.4s;
}
.dropdown-enter,
.dropdown-leave-to {
    opacity: 0;
    transform: translateY(30px);
}
</style>