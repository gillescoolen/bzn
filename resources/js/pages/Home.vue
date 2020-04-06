<template>
    <div>
        <NavigationBar />
        <div class="main">
            <Map dusk="map" />
            <Legend dusk="legend" />
            <Questionnaire dusk="questionnaire" />
            <PDF/>
        </div>
    </div>
</template>

<script>
import { NavigationBar } from "../components/Navigation";
import { PDF } from "../components/UI";
import { Map, Legend, Questionnaire } from "../components/Map";

export default {
    components: {
        PDF,
        Map,
        Legend,
        Questionnaire,
        NavigationBar
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
</style>