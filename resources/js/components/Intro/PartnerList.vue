<template>
    <div class="partner-list">
        <Partner v-for="partner in partners" v-bind:key="partner.id" :partner="partner" />
    </div>
</template>

<script>
import Partner from "./Partner"

export default {
    name: "PartnerList",

    components: {
        Partner
    },

    data () {
        return {
            partners: []
        }
    },

    mounted () {
        this.fetchPartners()
    },

    methods: {
        async fetchPartners () {
            const res = await this.$http.get('/api/partners');
            this.partners = res.data
        }
    }
}
</script>

<style lang="scss" scoped>
.partner-list {
    max-width: 950px;
    margin: 50px auto;
    padding: 0 10px;
}
</style>