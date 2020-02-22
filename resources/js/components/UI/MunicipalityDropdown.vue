<template>
    <div v-if="municipalities" class="wrapper">
        <transition name="fade" mode="out-in">
            <span v-if="show" key="on" @click="show = false">Sluiten</span>
            <span
                v-else
                key="off"
                @click="show = true"
            >{{(getMunicipality) ? getMunicipality.name : 'Selecteer een gemeente'}}</span>
        </transition>
        <transition name="dropdown">
            <Dropdown v-if="show" v-on:select="set($event)" :items="municipalities" />
        </transition>
    </div>
</template>

<script>
import { Dropdown } from '../UI'
import { mapGetters, mapActions } from 'vuex';

export default {
    components: {
        Dropdown
    },

    data() {
        return {
            show: false,
            selected: null,
            municipalities: null
        }
    },

    async mounted() {
        this.municipalities = await this.fetchMunicipalities();
    },

    computed: {
        ...mapGetters({
            getMunicipality: 'municipalities/get'
        })
    },

    methods: {
        ...mapActions({
            setMunicipality: 'municipalities/set'
        }),

        set(item) {
            this.setMunicipality(item);
            this.show = false;
        },

        async fetchMunicipalities() {
            const res = await fetch('api/municipalities');
            return await res.json()
        }
    },
}
</script>

<style lang="scss" scoped>
.wrapper {
    padding: 1rem;
    margin: 0.5rem;

    span {
        color: white;
        cursor: pointer;
        font-size: 1rem;
        font-weight: 700;
        user-select: none;
        background-color: transparent;

        &:focus {
            outline: none;
        }
    }
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s;
}
.fade-enter,
.fade-leave-to {
    opacity: 0;
}

.dropdown-enter-active,
.dropdown-leave-active {
    transition: all 0.4s;
}
.dropdown-enter,
.dropdown-leave-to {
    opacity: 0;
    transform: translateX(30px);
}
</style>