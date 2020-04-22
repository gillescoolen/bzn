<template>
    <div class="container">
        <h1>Gebruikers</h1>
        <div dusk="users" class="users" v-if="users && users.length > 0">
            <div class="user header">
                <div class="name">Naam</div>
                <div class="email">Email</div>
                <div>Rol</div>
                <div>Gemeente</div>
            </div>
            <div v-for="(user, index) in users" :key="index" :dusk="`user-${index}`" class="user">
                <div :dusk="`name-${index}`" class="name">{{user.name}}</div>
                <div :dusk="`email-${index}`" class="email">{{user.email}}</div>
                <div :dusk="`role-${index}`" class="role">{{user.role}}</div>
                <!-- TODO: Add municipality -->
                <div>
                    <button @click="openAddMunicipalityModal">Gemeente toevoegen</button>
                </div>
            </div>
        </div>
        <div v-else class="message">
            <h2>Geen gebruikers gevonden.</h2>
        </div>

        <Modal :show="showModal" v-on:close="showModal = false">
            <div>
                <h1>Dit is een modal</h1>
            </div>
        </Modal>
    </div>
</template>


<script>
import { Role } from "../../mixins";
import { Modal } from '../../components/UI'

export default {
    components: {
        'Modal': Modal
    },

    mixins: [
        Role
    ],

    data() {
        return {
            users: null,
            roles: ["admin"],
            showModal: false
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
                    "/api/users/approved"
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
        },

        openAddMunicipalityModal() {
            console.log('users.vue openaddmunicipalitymodal')
            this.showModal = true
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

        .header {
            font-weight: 700;
        }

        .user {
            display: flex;
            padding: 0.5rem;
            align-items: center;
            flex-direction: row;
            border-bottom: 1px solid #dde3ee;

            .role {
                text-transform: capitalize;
            }

            .approve {
                cursor: pointer;
                color: #3ba549;
                font-weight: 700;
                user-select: none;
            }

            div {
                width: 100%;
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