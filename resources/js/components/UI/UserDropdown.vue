<template>
    <div class="wrapper" v-if="username">
        <span v-if="show" @click="show = false">Sluiten</span>
        <span v-else @click="show = true">Welkom {{ user.name }} !</span>
        <a href="#" @click.prevent="logout">Uitloggen</a>
    </div>
    <div class="wrapper" v-else>
        <a href="/login/">Inloggen</a>
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
                user: null,
                username: null,
            }
        },

        async mounted() {
            this.user = await this.fetchAuthUser();
            this.username = await this.fetchAuthUsername();
        },

        methods: {
            async fetchAuthUser() {
                try {
                    const res = await fetch('api/user');
                    return await res.json()
                } catch (error) {
                    console.error('Error fetching user: ', error);
                }
            },
            async fetchAuthUsername() {
                try {
                    const res = await fetch('api/username');
                    return await res.json()
                } catch (error) {
                    console.error('Error fetching username: ', error);
                }
            },
            logout(evt) {
                if (confirm("Are you sure you want to log out?")) {
                    axios.get('api/logout').then(response => {
                        localStorage.removeItem('auth_token');

                        // remove any other authenticated user data you put in local storage

                        // Assuming that you set this earlier for subsequent Ajax request at some point like so:
                        // axios.defaults.headers.common['Authorization'] = 'Bearer ' + auth_token ;
                        delete axios.defaults.headers.common['Authorization'];

                        // If using 'vue-router' redirect to login page
                        this.$router.go('/login');
                    })
                }
            }
        },
    }
</script>

<style lang="scss" scoped>

.wrapper {
    width:200px!important;
    text-align: right;
    font-weight: bold;
    padding:20px;

    a {
        color:white;
        text-decoration: none;
    }
}

</style>
