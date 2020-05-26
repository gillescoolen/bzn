<template>
    <div class="collapsible">
        <div class="title">
            <slot name="title" />
        </div>
    </div>
</template>

<script>
export default {
  name: 'ContentBox',

  props: {
    municipality: {
      type: Object,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped>
    div.title {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #ebebeb;
    }

    div.title, .content {
        border: 1px solid #e6e6e6;
        box-shadow: 1px 2px 3px #e6e6e6;
    }

    button {
        background-color: transparent;
        border: none;
        width: 100%;
    }

</style>
