<template>
    <nav class="navigation">
        <router-link class="item" :to="{ name: 'home' }">Bosgroep Zuid-Nederland</router-link>

        <MunicipalityDropdown/>
    </nav>
</template>

<script>
import { MunicipalityDropdown } from "../UI";

export default {
    components: {
        MunicipalityDropdown
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
    justify-content: space-between;

    top: 0;
    left: 0;
    width: 100vw;
    max-width: 100%;
    z-index: 10000000;
    position: absolute;

    .item {
        color: white;
        font-weight: 700;
        text-decoration: none;
        margin: 0 0.5rem 0 0.5rem;
    }
}
</style>