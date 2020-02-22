<template>
    <nav class="navigation">
        <router-link class="item" :to="{ name: 'home' }">Home</router-link>

        <Dropdown v-if="municipalities" :items="municipalities"/>
    </nav>
</template>

<script>
import { Dropdown } from "../UI";

export default {
    components: {
        Dropdown
    },

    data() {
        return {
            municipalities: null
        }
    },

    async mounted() {
        this.municipalities = await this.fetchMunicipalities();
    },

    methods: {
        async fetchMunicipalities() {
            const res = await fetch('api/municipalities');
            return await res.json()
        }
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

    position: absolute;
    top: 0;
    left: 0;
    z-index: 10000000;
    width: 100vw;
    max-width: 100%;

    .item {
        color: white;
        text-decoration: none;
        margin: 0 0.5rem 0 0.5rem;
    }
}
</style>