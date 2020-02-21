<template>
    <l-map style="height: 100%; width: 100%;" :zoom="zoom" :center="center" :options="options">
        <l-tile-layer :url="url"></l-tile-layer>
    </l-map>
</template>

<script>
import "leaflet/dist/leaflet.css";
import { LMap, LTileLayer } from 'vue2-leaflet';
export default {
    components: {
        LMap,
        LTileLayer,
    },

    props: {
        latitude: {
            default: 5.322876
        },
        longitude: {
            default: 51.685541
        },
    },

    data() {
        return {
            zoom: 10,
            bounds: null,
            options: {
                zoomControl: false
            },
            center: [this.longitude, this.latitude],
            url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        };
    },
}
</script>