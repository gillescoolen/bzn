<template>
    <div>
        <select>
            <option v-for="o in municipalities" :key="o.name" v-bind:value="o.value">
                {{ o.name }}
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