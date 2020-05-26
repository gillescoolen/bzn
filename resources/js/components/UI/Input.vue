<template>
  <div class="wrapper">
    <input
      class="input"
      @input="input"
      :type="type"
      :name="name"
      :placeholder="label"
      :required="required"
    />
    <label :for="label" class="label">{{label}}</label>
  </div>
</template>

<script>
export default {
  props: {
    label: {
      default: 'Naam',
      required: false
    },
    name: {
      default: 'name',
      required: false
    },
    type: {
      default: 'text',
      required: false
    },
    required: {
      default: false,
      required: false
    }
  },

  methods: {
    input (event) {
      this.$emit('input', event.target.value);
    }
  }
};
</script>

<style lang="scss" scoped>
.wrapper {
  width: 100%;
  padding: 1rem 0 0;
  position: relative;
  margin-top: 1rem;
}

.input {
  border: 0;
  outline: 0;
  width: 100%;
  color: black;
  padding: 7px 0;
  transition: 0.2s;
  user-select: none;
  background: transparent;
  border-bottom: 2px solid gray;

  &::placeholder {
    color: transparent;
  }

  &:placeholder-shown ~ .label {
    cursor: text;
    top: 20px;
  }
}

.label {
  position: absolute;
  top: -3px;
  user-select: none;
  pointer-events: none;
  display: block;
  transition: 0.2s;
  color: gray;
}

.input:focus {
  ~ .label {
    position: absolute;
    top: -3px;
    display: block;
    transition: 0.2s;
    font-size: 1rem;
    color: var(--primary);
    font-weight: 700;
  }

  font-weight: normal;
  border-image: linear-gradient(to right, var(--primary), var(--secondary));
  border-image-slice: 1;
}

.input {
  &:required,
  &:invalid {
    box-shadow: none;
  }
}
</style>
