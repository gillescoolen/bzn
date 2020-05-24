<template>
    <div class="collapsible">
        <div class="title" @click="open = !open">
            <slot name="title" />
            <img src="/assets/icons/chevron-right-solid.svg" alt="A dropdown arrow icon" :class="open ? 'rotate' : ''">
        </div>
        <div class="content" v-if="open">
            <slot name="content" />
        </div>
    </div>
</template>

<script>
export default {
    name: "Collapsible",
    data() {
        return {
            open: false
        }
    }
}
</script>

<style lang="scss" scoped>
.title {
    display: flex;
    align-items: center;
    justify-content: space-between;

    img {
        width: 20px;
        height: 20px;
        transition: transform 0.2s ease-in-out;
    }
    img.rotate {
        transform: rotate(90deg);
    }
}
</style>