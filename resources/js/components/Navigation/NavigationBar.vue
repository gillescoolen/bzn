<template>
    <nav class="navigation">
        <router-link class="item" :to="{ name: 'home' }">Home</router-link>
        <router-link class="item" :to="{ name: 'about' }">About</router-link>
    </nav>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
.navigation {
    height: 3rem;
    display: flex;
    place-items: center;
    flex-direction: row;
    background-color: $primary;

    .item {
        color: white;
        text-decoration: none;
        margin: 0 0.5rem 0 0.5rem;
    }
}
</style>