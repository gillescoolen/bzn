<template>
  <button :class="[classObject, {'flat': flat, 'inverse': inverse}]" @click="handleClick">
    <slot />
  </button>
</template>

<script>
export default {
  name: "Button",
  props: ["variant", "flat", "inverse"],
  methods: {
    handleClick(e) {
      this.$emit("click", e);
    }
  },
  computed: {
    classObject() {
      if (!this.variant) return [];
      const classlist = [];

      if (this.inverse) {
        classlist.push(this.variant);
        classlist.push(`border-${this.variant}`);
      } else {
        classlist.push(`bg-${this.variant}`);
      }

      return classlist;
    }
  }
};
</script>

<style lang="scss" scoped>
button {
  font-weight: bold;
  padding: 5px 15px;
  box-shadow: 1px 2px 3px rgba(0, 0, 0, 0.2);
  border-radius: 5px;
  border: none;
  cursor: pointer;
  color: white;
  background-color: white;
}

button.flat {
  box-shadow: none;
}

button.inverse {
  border: 2px solid black;
}
</style>