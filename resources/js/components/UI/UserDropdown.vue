<template>
    <div class="wrapper">
        <span>{{ user.name() }}</span>
    </div>
</template>

<script>

    export default {
        name: "UserDropdown",
        components: {
        },

        data() {
            return {
                show: false,
                user: null
            }
        },

        async mounted() {
            this.user = await this.fetchAuthUser();
        },

        methods: {
            set(item) {
                this.setMunicipality(item);
                this.show = false;
            },

            async fetchAuthUser() {
                try {
                    const res = await fetch('api/user');
                    return await res.json()
                } catch (error) {
                    console.error('Error fetching user: ', error);
                }
            }
        },
    }
</script>

<style scoped>

.wrapper {
    width:200px!important;
}

</style>
