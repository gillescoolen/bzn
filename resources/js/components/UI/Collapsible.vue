<template>
    <div class="collapsible">
        <div class="title" @click="open = !open">
            <slot name="title" />
            <i class="fas fa-chevron-right" :class="open ? 'rotate' : ''"></i>
        </div>
        <div class="content" v-if="open">
            <slot name="content" />
        </div>
    </div>
</template>

<script>
export default {
  name: 'Collapsible',
  data () {
    return {
      open: false
    };
  }
};
</script>

<style lang="scss" scoped>
div.title {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #ebebeb;

    i {
        width: 20px;
        height: 20px;
        transition: transform 0.2s ease-in-out;
    }
    i.rotate {
        transform: rotate(90deg);
    }
}

div.title, .content {
    border: 1px solid #e6e6e6;
    padding: 0 10px;
    box-shadow: 1px 2px 3px #e6e6e6;
}

.content {
    margin-top: 5px;
    padding: 15px;
}
</style>
