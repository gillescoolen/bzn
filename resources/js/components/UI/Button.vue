<template>
  <button :class="[variant, {'flat': flat, 'inverse': inverse}]" @click="handleClick">
    <slot />
  </button>
</template>

<script>
export default {
  name: 'Button',
  props: ['variant', 'flat', 'inverse'],
  methods: {
    handleClick (e) {
      this.$emit('click', e);
    }
  }
}
</script>

<style lang="scss" scoped>
@import "./resources/sass/app.scss";

button {
  font-weight: bold;
  padding: 5px 15px;
  box-shadow: 1px 2px 3px rgba(0, 0, 0, 0.2);
  border-radius: 5px;
  border: none;
  cursor: pointer;
}

button.flat {
  box-shadow: none;
}

button.primary {
  color: white;
  background-color: $primary;
}

button.secondary {
  color: white;
  background-color: $secondary;
}

button.disabled {
  color: white;
  background-color: $disabled;
}

button.darkgray {
  color: white;
  background-color: $darkgray;
}

button.primary.inverse {
  color: $primary;
  background-color: white;
  border: 2px solid $primary;
}

button.secondary.inverse {
  color: $secondary;
  background-color: white;
  border: 2px solid $secondary;
}

button.disabled.inverse {
  color: $disabled;
  background-color: white;
  border: 2px solid $disabled;
}

button.darkgray.inverse {
  color: $darkgray;
  background-color: white;
  border: 2px solid $darkgray;
}

</style>