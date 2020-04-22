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
                <div>
                    <button :dusk="`add-municipality-${index}`" @click="showAddMunicipalityModal(user.id)">Gemeente toevoegen</button>
                </div>
            </div>
        </div>
        <div v-else class="message">
            <h2>Geen gebruikers gevonden.</h2>
        </div>

        <Modal :show="showModal" v-on:close="showModal = false">
            <div>
                <h1>Dit is een modal</h1>
                <MunicipalityDropdown v-on:change_municipality="changeMunicipality"/>
                <button @click="addMunicipalityToUser()">Kies deze gemeente</button>
            </div>
        </Modal>
    </div>
</template>


<script>
import { Role } from "../../mixins";
import { Modal, MunicipalityDropdown } from '../../components/UI'

export default {
    components: {
        'Modal': Modal,
        'MunicipalityDropdown': MunicipalityDropdown
    },

    mixins: [
        Role
    ],

    data() {
        return {
            users: null,
            roles: ["admin"],
            showModal: false,
            municipalities: [],

            editing_user_id: null,
            selected_municipality_id: null
        };
    },

    async mounted() {
        this.loadUsers();
        this.municipalities = await this.fetchMunicipalities();
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

        async fetchMunicipalities() {
            try {
                const { data: res } = await this.$http.get(
                    "api/municipalities"
                );
                return res;
            } catch (error) {
                console.error("Error fetching questions: ", error);
            }
        },

        showAddMunicipalityModal (user_id) {
            this.showModal = true
            this.editing_user_id = user_id
        },

        changeMunicipality(new_municipality) {
            this.selected_municipality_id = new_municipality.id
        },

        async addMunicipalityToUser() {
            
            const uri = `/api/users/${this.editing_user_id}/addmunicipality/${this.selected_municipality_id}`
            console.warn(uri)
             try {
                const { data: res } = await this.$http.get(
                    uri
                );
                console.warn(res)
                return res;
            } catch (error) {
                console.error("Error adding municipality to user: ", error);
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