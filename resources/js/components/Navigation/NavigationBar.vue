<template>
    <nav class="navigation">
        <router-link class="item" :to="{ name: 'home' }">Home</router-link>
        KIES UW GEMEENTE:
        <Dropdown v-bind:municipalities="municipalities"/>
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
            municipalities: []
        }
    },

    created() {
        this.fetchMunicipalities();
    },

    methods: {
        fetchMunicipalities() {
            fetch('api/municipalities')
                .then(res => res.json())
                .then(res => {
                    this.municipalities.push(res);
                })
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

    .item {
        color: white;
        text-decoration: none;
        margin: 0 0.5rem 0 0.5rem;
    }
}
</style>