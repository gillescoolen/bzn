<template>
    <ul class="legend">
        <li class="legend-item" :key="item.id" v-for="item in items">
            <div :style="{ color: item.color }" class="indicator"></div>
            <span>{{item.name}}</span>
        </li>
    </ul>
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
$height: 40vh;

.legend {
    bottom: 100%;
    left: 0;
    z-index: 10;
    margin: 0.5rem;
    padding: 1rem;
    height: $height;
    min-width: $width;
    overflow-y: auto;
    position: absolute;
    border-radius: 5px;
    list-style-type: none;
    background-color: white;
    box-shadow: 0px 4px 4px 1px #00000040;

    /* width */
    &::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    &::-webkit-scrollbar-track {
        background: transparent;
    }

    /* Handle */
    &::-webkit-scrollbar-thumb {
        border-radius: 5px;
        background: #f0f0f0;
    }

    /* Handle on hover */
    &::-webkit-scrollbar-thumb:hover {
        border-radius: 5px;
        background: #dbdbdb;
    }

    &-item {
        border-bottom: 1px solid #dddddd;

        span {
            display: block;
            padding: 0.5rem;
            user-select: none;
        }

        .indicator {
            width: 5px;
            height: 5px;
        }

        &:last-child {
            border: none;
        }
    }
}
</style>