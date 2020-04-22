<template>
    <div class="modal" v-if="show">
        <div class="backdrop"></div>
        <div class="container">
            <slot/>
            <button class="close" @click="closeModal">
                <span>X</span>
            </button>
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
        position: fixed;
        top: 0;
        left: 0;
        z-index: 999;
    }
    .container {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        z-index: 1000;
        padding: 50px;
        border-radius: 10px;
        box-shadow: 2px 4px 4px #3e3e3e;

        button.close {
            position: absolute;
            top: 0;
            right: 0;
            margin: 15px;
            border-radius: 10px;
            border: 2px solid #e24141;
            background: white;
            height: 30px;
            width: 30px;
            color: white;
            cursor: pointer;

            span {
                font-size: 19px;
                position: absolute;
                transform: translate(-50%, -50%);
                color: #e24141;
            }
        }
    }
</style>