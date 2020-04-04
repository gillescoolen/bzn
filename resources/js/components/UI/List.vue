<template>
    <ul class="menu">
        <li class="menu-item" :key="item.id" @click="$emit('select', item)" v-for="item in items">
            <span>{{item.name}}</span>
        </li>
    </ul>
</template>

<script>
export default {
    props: {
        items: null
    },

    data() {
        return {
            show: false
        }
    }
}
</script>

<style lang="scss" scoped>
$width: 300px;
$height: 400px;

.menu {
    left: 0;
    top: 100%;
    z-index: 10;
    padding: 1rem;
    margin: 0.5rem;
    height: $height;
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
</style>