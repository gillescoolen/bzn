<template>
    <div>
        <select v-model="selected">
            <option v-for="municipality in municipalities" :key="municipality.name" v-bind:value="municipality.value">
                {{ municipality.name }}
            </option>
        </select>
    </div>
</template>

<script>
export default {
    data () {
        return {
            selected: 'Horn',
            municipalities: [
                { name: 'Horn' },
                { name: 'Tilburg' },
                { name: 'Weert' }
            ]
        }
    }
}
</script>

<style lang="scss" scoped>
</style>