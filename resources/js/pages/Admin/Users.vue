<template>
    <div>
        <h1>Gebruikers</h1>
        <div class="users" v-if="users.length > 0">
            <div v-for="user in users" :key="user.id" class="user">
                <div class="name">{{user.name}}</div>
                <div class="email">{{user.email}}</div>
                <div @click="approve(user.id)" class="approve">Toelaten</div>
            </div>
        </div>
        <div v-else class="none-found">
            <h1>Geen gebruikers gevonden...</h1>
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
                const res = await fetch("/api/users/unapproved");

                return await res.json();
            } catch (error) {
                console.error(error);
            }
        },

        async approve(id) {
            try {
                const res = await fetch(`/api/users/${id}`, {
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

.none-found {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;

    h1 {
        opacity: 0.3;
    }
}
</style>