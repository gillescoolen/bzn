<template>
  <l-map
    id="map"
    class="map"
    style="height: 100%; width: 100%;"
    :zoom="zoom"
    :minZoom="minZoom"
    :maxZoom="maxZoom"
    :center="center"
    :options="options"
  >
    <l-tile-layer :url="url"></l-tile-layer>
    <l-wms-tile-layer
      v-if="wms"
      :key="layer"
      dusk="map-layer"
      layer-type="base"
      :layers="layer"
      :base-url="wms.url"
      :opacity="wms.opacity"
    />
  </l-map>
</template>

<script>
import 'leaflet/dist/leaflet.css';
import { mapGetters } from 'vuex';
import { LMap, LWMSTileLayer, LTileLayer } from 'vue2-leaflet';

export default {
  components: {
    LMap,
    'l-wms-tile-layer': LWMSTileLayer,
    LTileLayer
  },

  data () {
    return {
      zoom: 12,
      maxZoom: 15,
      minZoom: 12,
      url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
      options: {
        zoomControl: false,
        preferCanvas: true
      },
      wms: {
        url: 'http://gmd.has.nl:8080/geoserver/biodiversiteithorst/wms',
        format: 'image/png',
        opacity: 0.3
      }
    };
  },

  computed: {
    ...mapGetters({
      layer: 'map/get',
      municipality: 'municipalities/get'
    }),

    center () {
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
