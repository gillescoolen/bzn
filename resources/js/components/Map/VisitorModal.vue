<template>
  <transition name="bounce">
    <div v-if="!visitor" class="wrapper">
      <div dusk="modal" class="modal">
        <h3>Wat voor bezoeker bent u?</h3>
        <button dusk="normal" @click="setVisitor('normal')">Ik ben een normale bezoeker!</button>
        <button dusk="special" @click="setVisitor('special')">Ik ben een opdrachtgever!</button>
      </div>
    </div>
  </transition>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';

export default {
  computed: {
    ...mapGetters({
      visitor: 'visitor/get'
    })
  },

  methods: {
    ...mapActions({
      setVisitor: 'visitor/set'
    })
  }
};
</script>

<style lang="scss" scoped>
.wrapper {
    width: 100vw;
    height: 100vh;
    z-index: 9999;
    position: absolute;

    display: flex;
    align-items: center;
    justify-content: center;

    .modal {
        width: 500px;
        height: 250px;
        padding: 1rem;
        z-index: 10000;
        border-radius: 5px;
        background-color: white;
        box-shadow: 0px 4px 4px 1px #0000001c;

        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: center;

        h3 {
            margin: 0;
        }

        button {
            width: 80%;
            border: none;
            padding: 1rem;
            cursor: pointer;
            font-size: 1.2rem;
            border-radius: 5px;
            background-color: white;
            transition: 0.4s all;
            box-shadow: 0px 0px 4px 0px #0000001c;

            &:hover {
                transition: 0.2s all;
                box-shadow: 0px 0px 5px 1px #00000027;
            }

            &:focus {
                transition: 0.2s all;
                box-shadow: 0px 0px 5px 1px #00000027;
            }
        }
    }
}

.bounce-enter-active {
    animation: bounce-in 0.6s;
}

.bounce-leave-active {
    animation: bounce-in 0.4s reverse;
}

@keyframes bounce-in {
    0% {
        transform: scale(0);
    }
    50% {
        transform: scale(1.2);
    }
    100% {
        transform: scale(1);
    }
}
</style>
