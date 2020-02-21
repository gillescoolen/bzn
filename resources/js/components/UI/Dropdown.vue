<template>
    <div>
        <select>
            <option v-for="m in municipalities" :key="m.name" v-bind:value="m.name">
                {{ m.name }}
            </option>
        </select>
    </div>
</template>

<script>
export default {
    props: ['municipalities']
}
</script>

<style lang="scss" scoped>
</style>