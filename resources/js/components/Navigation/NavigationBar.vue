<template>
    <nav class="navigation">
        <MunicipalityDropdown dusk="municipality-dropdown" />

        <div class="items">
            <span class="item" @click="setVisitor(null)">Verander bezoeker</span>
            <span class="item" v-if="visitor === 'special'">-</span>
            <a class="item" v-if="visitor === 'special'" href="/login/">Inloggen</a>
        </div>
    </nav>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import { MunicipalityDropdown } from "../UI";

export default {
    components: {
        MunicipalityDropdown
    },

    computed: {
        ...mapGetters({
            visitor: "visitor/get"
        })
    },

    methods: {
        ...mapActions({
            setVisitor: "visitor/set"
        })
    }
};
</script>

<style lang="scss" scoped>
@import "./resources/sass/app.scss";

.navigation {
    height: 3rem;
    display: flex;
    place-items: center;
    flex-direction: row;
    background-color: $primary;
    justify-content: space-between;

    top: 0;
    left: 0;
    width: 100vw;
    max-width: 100%;
    z-index: 10000000;
    position: absolute;

    .items {
        .item {
            color: white;
            cursor: pointer;
            margin: 0 0.5rem;
            font-weight: 700;
            text-decoration: none;
        }
    }
}
</style>
