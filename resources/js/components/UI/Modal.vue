<template>
    <div class="modal" v-if="show">
        <div class="backdrop"></div>
        <div class="container">
            <slot/>
            <button @click="closeModal">x</button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Modal',
    props: ['show'],
    methods: {
        closeModal() {
            this.$emit('close')
        }
    }
}
</script>

<style lang="scss" scoped>
    .backdrop {
        width: 100vw;
        height: 100vh;
        background: rgba(0,0,0,.5);
        position: absolute;
        top: 0;
        left: 0;
        z-index: 999;
    }
    .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        z-index: 1000;
        padding: 50px;
        border-radius: 10px;
        box-shadow: 2px 4px 4px #3e3e3e;

        button {
            position: absolute;
            top: 0;
            right: 0;
            margin: 15px;
            border-radius: 10px;
            border: none;
            background: #e24141;
            height: 30px;
            width: 30px;
            color: white;
            font-weight: bold;
        }
    }
</style>