<template>
    <l-map
        class="map"
        style="height: 100%; width: 100%;"
        :zoom="zoom"
        :center="center"
        :options="options"
    >
        <l-tile-layer :url="url"></l-tile-layer>
        <l-wms-tile-layer
            :base-url="layer.url"
            :layers="layer.layers"
            :name="layer.name"
            :opacity="0.3"
            layer-type="base"
        />
    </l-map>
</template>

<script>
import "leaflet/dist/leaflet.css";
import { mapGetters } from "vuex";
import { LMap, LWMSTileLayer, LTileLayer } from "vue2-leaflet";

export default {
    components: {
        LMap,
        "l-wms-tile-layer": LWMSTileLayer,
        LTileLayer
    },

    data() {
        return {
            zoom: 12,
            minZoom: 12,
            url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
            options: {
                zoomControl: false
            },
            layer: {
                url: "http://gmd.has.nl:8080/geoserver/biodiversiteithorst/wms",
                format: "image/png",
                opacity: "",
                layers: "biodiversiteithorst:Alle_insecten_std"
            }
        };
    },

    computed: {
        ...mapGetters({
            municipality: "municipalities/get"
        }),

        center() {
            return [this.municipality.latitude, this.municipality.longitude];
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