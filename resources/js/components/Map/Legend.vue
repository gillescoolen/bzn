<template>
    <div class="wrapper" v-if="items">
        <transition name="fade" mode="out-in">
            <ul dusk="legend-list" v-if="show" class="legend">
                <span v-if="show" @click="show = false" class="close">Verberg</span>

                <li class="legend-item" :key="item.id" v-for="item in items">
                    <div :style="{ 'background-color': item.color }" class="indicator"></div>
                    <span>{{item.label}}</span>
                </li>
            </ul>
            <span v-else @click="show = true" class="show">Legenda</span>
        </transition>
    </div>
</template>

<script>
export default {
    data() {
        return {
            show: false,
            items: null
        }
    },

    async mounted() {
        this.items = await this.fetchLegendItems();
    },


    methods: {
        async fetchLegendItems() {
            const res = await fetch('api/legend');
            return await res.json()
        }
    },
}
</script>

<style lang="scss" scoped>
$width: 300px;
$height: 200px;

.wrapper {
    .legend {
        left: 0;
        bottom: 0;
        padding: 1rem;
        margin: 0.5rem;
        height: $height;
        z-index: 1000000;
        overflow-y: auto;
        min-width: $width;
        position: absolute;
        border-radius: 5px;
        list-style-type: none;
        background-color: white;
        box-shadow: 0px 4px 4px 1px #00000040;

        &-item {
            display: flex;
            flex-direction: row;
            place-items: center;
            border-bottom: 1px solid #dddddd;

            span {
                display: block;
                padding: 0.5rem;
                user-select: none;
            }

            .indicator {
                width: 15px;
                height: 15px;
                border-radius: 100%;
                border: 1px solid #707070;
            }

            &:last-child {
                border: none;
            }
        }
    }

    .close {
        top: 0;
        right: 0;
        margin: 0.5rem;
        cursor: pointer;
        color: #272727;
        font-weight: 700;
        user-select: none;
        font-size: 0.8rem;
        position: absolute;
        transition: all 0.3s;
        background-color: transparent;

        &:focus {
            outline: none;
        }

        &:hover {
            color: #000000;
            transition: all 0.1s;
        }
    }

    .show {
        left: 0;
        bottom: 0;
        margin: 1rem;
        color: black;
        padding: 0.8rem;
        cursor: pointer;
        z-index: 1000000;
        font-weight: 700;
        user-select: none;
        font-size: 0.8rem;
        position: absolute;
        border-radius: 5px;
        transition: all 0.2s;
        background-color: white;
        box-shadow: 0px 4px 4px 1px #0000001f;

        &:focus {
            outline: none;
        }

        &:hover {
            transition: all 0.1s;
            box-shadow: 0px 4px 4px 1px #0000003d;
        }
    }

    &::-webkit-scrollbar {
        width: 10px;

        &-track {
            background: transparent;
        }

        &-thumb {
            border-radius: 5px;
            background: #f0f0f0;

            &:hover {
                border-radius: 5px;
                background: #dbdbdb;
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