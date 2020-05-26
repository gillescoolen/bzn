<template>
  <button :class="[this.variant && classObject, {'flat': flat, 'inverse': inverse}]" @click="click">
    <slot />
  </button>
</template>

<script>
export default {
  name: 'Button',
  props: ['variant', 'flat', 'inverse'],

  methods: {
    click (e) {
      this.$emit('click', e);
    }
  },

  computed: {
    classObject () {
      return this.inverse
        ? [this.variant, `border-${this.variant}`]
        : [`bg-${this.variant}`];
    }
  }
};
</script>

<style lang="scss" scoped>
button {
  border: none;
  color: black;
  margin: 1rem 0;
  cursor: pointer;
  font-weight: bold;
  padding: 0.8rem 1rem;
  border-radius: 1rem;
  transition: 0.2s all;
  background: white;
  box-shadow: 0px 0px 2px 0px #0000004d;

  &:hover {
    transition: 0.1s all;
    box-shadow: 0px 0px 4px 0px #0000006e;
  }

  &:focus {
    transition: 0.1s all;
    box-shadow: 0px 0px 1px 0px #0000004d;
  }
}

button.flat {
  box-shadow: none;
}

button.inverse {
  border: 2px solid black;
}
</style>
