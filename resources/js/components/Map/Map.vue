<template>
    <l-map style="height: 100%; width: 100%;" :zoom="zoom" :center="center" :options="options">
        <l-tile-layer :url="url"></l-tile-layer>
    </l-map>
</template>

<script>
import "leaflet/dist/leaflet.css";
import { mapGetters, mapActions } from 'vuex';
import { LMap, LTileLayer } from 'vue2-leaflet';

export default {
    components: {
        LMap,
        LTileLayer,
    },

    props: {

    },

    data() {
        return {
            zoom: 10,
            url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            options: {
                zoomControl: false
            },
        };
    },

    computed: {
        ...mapGetters({
            getMunicipality: 'municipalities/get'
        }),

        center() {
            return [this.getMunicipality.latitude, this.getMunicipality.longitude]
        }
    }
}
</script>