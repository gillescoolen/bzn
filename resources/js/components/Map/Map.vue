<template>
    <l-map
        id="map"
        class="map"
        style="height: 100%; width: 100%;"
        :zoom="zoom"
        :minZoom="minZoom"
        :center="center"
        :options="options"
    >
        <l-tile-layer :url="url"></l-tile-layer>
    </l-map>
</template>

<script>
import "leaflet/dist/leaflet.css";
import { mapGetters } from "vuex";
import { LMap, LTileLayer } from "vue2-leaflet";

export default {
    components: {
        LMap,
        LTileLayer
    },

    data() {
        return {
            zoom: 12,
            minZoom: 12,
            url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
            options: {
                zoomControl: false,
                preferCanvas: true
            }
        };
    },

    computed: {
        ...mapGetters({
            municipality: "municipalities/get"
        }),

        center() {
            return [
                this.municipality.latitude,
                this.municipality.longitude
            ];
        }
    }
};
</script>

<style lang="scss" scoped>
.map {
    width: 100%;
    height: 100%;
}
</style>