<template>
    <nav class="navigation">
        <router-link class="item" :to="{ name: 'home' }">Home</router-link>
        <Dropdown/>
    </nav>
</template>

<script>
import { Dropdown } from "../UI/Dropdown";

export default {
    components: {
        Dropdown
    }
}
</script>

<style lang="scss" scoped>
.navigation {
    height: 3rem;
    display: flex;
    place-items: center;
    flex-direction: row;
    background-color: #1b6e37;

    .item {
        color: white;
        text-decoration: none;
        margin: 0 0.5rem 0 0.5rem;
    }
}
</style>