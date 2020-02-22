<template>
    <div class="wrapper">
        <transition name="fade" mode="out-in">
            <button v-if="show" key="on" @click="show = false">Sluiten</button>
            <button
                v-else
                key="off"
                @click="show = true"
            >{{(getMunicipality) ? getMunicipality.name : 'Selecteer een gemeente'}}</button>
        </transition>
        <transition name="dropdown">
            <Dropdown v-if="show" v-on:select="set($event)" :items="items" />
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

    props: {
        items: null
    },

    data() {
        return {
            show: false,
            selected: null
        }
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
        }
    },
}
</script>

<style lang="scss" scoped>
.wrapper {
    padding: 1rem;
    margin: 0.5rem;

    button {
        color: white;
        cursor: pointer;
        font-size: 1rem;
        font-weight: 700;
        border: 1px solid transparent;
        background-color: transparent;

        &:focus {
            outline: none;
        }

        .icon {
            width: 1.65rem;
            height: 1.65rem;
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