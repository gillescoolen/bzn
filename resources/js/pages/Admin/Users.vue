<template>
    <div>
        <h1>Users</h1>
        <div class="users">
            <div v-for="user in users" :key="user.id" class="user">
                <div class="name">{{user.name}}</div>
                <div class="email">{{user.email}}</div>
                <div @click="approve(user.id)" class="approve">Toelaten</div>
            </div>
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

    async mounted() {
        this.users = await this.fetchUsers();
    },

    methods: {
        async fetchUsers() {
            try {
                const res = await fetch("/api/users");
                return await res.json();
            } catch (error) {
                console.error(error);
            }
        },

        async approve(id) {
            try {
                const res = await fetch(`/api/user/${id}`, {
                    method: "PATCH",
                    body: {
                        //TODO: Add proper request body.
                    }
                });
                return await res.json();
            } catch (error) {
                console.error(error);
            }
        }
    }
};
</script>

<style lang="scss" scoped>
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
</style>