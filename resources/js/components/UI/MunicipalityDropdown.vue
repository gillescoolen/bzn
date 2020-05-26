<template>
    <div v-if="municipalities" class="wrapper" :class="{ invert, 'float': menuFloat }">
        <transition name="fade" mode="out-in">
            <span v-if="show" key="on" @click="show = false">Sluiten</span>
            <span v-else key="off" dusk="municipality-button" @click="show = true">
                {{(municipality) ? municipality.name : 'Selecteer een gemeente'}}
                <i class="fas fa-caret-down"></i>
            </span>
        </transition>
        <transition name="dropdown">
            <List
                dusk="municipality-list"
                v-if="show"
                v-on:select="set($event)"
                :items="municipalities"
            />
        </transition>
    </div>
</template>

<script>
import { List } from '../UI';
import { mapGetters, mapActions } from 'vuex';

export default {
  components: {
    List
  },

  props: ['invert', 'menuFloat'],

  data () {
    return {
      show: false,
      municipalities: null
    };
  },

  async mounted () {
    this.municipalities = await this.fetchMunicipalities();
    this.$emit('change_municipality', this.municipalities[0]);
  },

  computed: {
    ...mapGetters({
      municipality: 'municipalities/get'
    })
  },

  methods: {
    ...mapActions({
      setMunicipality: 'municipalities/set'
    }),

    set (item) {
      this.setMunicipality(item);
      this.show = false;
      this.$emit('change_municipality', item);
    },

    async fetchMunicipalities () {
      try {
        const { data: res } = await this.$http.get(
          '/api/municipalities'
        );
        return res;
      } catch (error) {
        console.error('Error fetching questions: ', error);
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.wrapper {
    padding: 1rem;
    margin: 0.5rem;

    span {
        display: flex;
        color: white;
        cursor: pointer;
        font-size: 1rem;
        font-weight: 700;
        user-select: none;
        align-items: center;
        background-color: transparent;

        &:focus {
            outline: none;
        }

        i {
            width: 25px;
            height: 25px;
            filter: invert(1);
        }
    }
}

.wrapper.float {
    .menu {
        padding: 1rem 1rem 1rem 0;
        margin: 0;
        position: relative;
        box-shadow: none;
    }
}

.wrapper.invert {
    span {
        color: black;
    }
    i {
        filter: none;
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
