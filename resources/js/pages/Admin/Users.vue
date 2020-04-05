<template>
    <div class="container">
        <h1>Gebruikers</h1>
        <div dusk="users" class="users" v-if="users && users.length > 0">
            <div v-for="(user, index) in users" :key="index" :dusk="`user-${index}`" class="user">
                <div :dusk="`name-${index}`" class="name">{{user.name}}</div>
                <div :dusk="`email-${index}`" class="email">{{user.email}}</div>
                <div :dusk="`approve-${index}`" @click="approve(user.id)" class="approve">Toelaten</div>
            </div>
        </div>
        <div v-else class="message">
            <h2>Geen gebruikers gevonden.</h2>
        </div>
    </div>
</template>


<script>
export default {
    data() {
        return {
            users: null
        };
    },

    mounted() {
        this.loadUsers();
    },

    methods: {
        async loadUsers() {
            this.users = await this.fetchUsers();
        },

        async fetchUsers() {
            try {
                const { data: res } = await this.$http.get(
                    "/api/users/unapproved"
                );

                return res;
            } catch (error) {
                console.error(error);
            }
        },

        async approve(id) {
            try {
                const res = await this.$http.patch(`/api/users/${id}/approve`, {
                    method: "PATCH",
                    body: {
                        approved: 1
                    }
                });

                res.status === 200 && this.loadUsers();
            } catch (error) {
                console.error(error);
            }
        }
    }
};
</script>

<style lang="scss" scoped>
.container {
    min-height: 50vh;

    .users {
        display: flex;
        flex-direction: column;

        .user {
            display: flex;
            padding: 0.5rem;
            align-items: center;
            flex-direction: row;
            justify-content: space-between;
            border-bottom: 1px solid #dde3ee;

            &:first-child {
                border-top: 1px solid #dde3ee;
            }

            .name {
                width: 20%;
            }

            .email {
                width: 20%;
            }

            .approve {
                cursor: pointer;
                color: #3ba549;
                font-weight: 700;
                user-select: none;
            }
        }
    }

    .message {
        width: 100%;
        height: 30vh;
        opacity: 0.3;
        display: flex;
        align-items: center;
        justify-content: center;
    }
}
</style>