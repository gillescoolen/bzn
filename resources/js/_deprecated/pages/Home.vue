<template>
    <div>
        <NavigationBar />
        <VisitorModal />

        <div class="main" :class="!visitor && 'blur'">
            <Map dusk="map" />
            <Legend dusk="legend" />
            <Questionnaire dusk="questionnaire" />
            <PDF />
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import { PDF } from "../components/UI";
import { NavigationBar } from "../components/Navigation";
import { Map, Legend, VisitorModal, Questionnaire } from "../components/Map";

export default {
    components: {
        PDF,
        Map,
        Legend,
        VisitorModal,
        Questionnaire,
        NavigationBar
    },

    computed: {
        ...mapGetters({
            visitor: "visitor/get"
        })
    }
};
</script>

<style lang="scss" scoped>
.main {
    width: 100vw;
    height: 100vh;
    max-width: 100%;
    max-height: 100%;
}

.blur {
    filter: blur(3px);
}
</style>