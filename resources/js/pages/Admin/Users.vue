<template>
  <div class="container">
    <h1>Gebruikers</h1>
    <div v-if="showUsersSpinner">
      <Spinner stroke="#744144" />
    </div>
    <div v-else-if="users && users.length > 0" dusk="users" class="users">
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
        <div class="municipality-container">
          <p v-if="user.municipalityname" class="municipality-name">{{user.municipalityname}}</p>
          <Button
            :dusk="`edit-municipality-${index}`"
            v-on:click="showAddMunicipalityModal(user.id)"
            :variant="`primary`"
            :inverse="user.municipalityname"
            :flat="user.municipalityname"
          >{{ user.municipalityname ? 'Wijzigen' : 'Gemeente toewijzen' }}</Button>
        </div>
      </div>
    </div>
    <div v-else class="message">
      <h2>Geen gebruikers gevonden.</h2>
    </div>

    <Modal :show="showModal" v-on:close="showModal = false" dusk="municipality-modal">
      <div v-if="editing_user" class="modal-content">
        <h3>
          Voeg een gemeente toe aan
          <i>{{editing_user.name}}</i>
        </h3>
        <MunicipalityDropdown
          v-on:change_municipality="changeMunicipality"
          :invert="true"
          :menuFloat="true"
        />

        <div v-if="showModalSpinner" class="spinner-container">
          <Spinner stroke="#744144" />
        </div>
        <div v-else>
          <Button
            :dusk="`add-municipality-button`"
            class="add_municipality"
            @click="addMunicipalityToUser()"
            :variant="`secondary`"
            :inverse="true"
          >Kies deze gemeente</Button>
          <Button
            v-if="editing_user.municipality_id"
            :dusk="`remove-municipality-button`"
            class="remove_municipality"
            @click="removeMunicipalityFromUser()"
            :variant="`error`"
            :inverse="true"
          >Gemeente weghalen</Button>
        </div>
      </div>
    </Modal>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';
import { Role } from '../../mixins';
import {
  Modal,
  MunicipalityDropdown,
  Spinner,
  Button
} from '../../components/UI';

export default {
  name: 'Users',

  components: {
    Modal: Modal,
    MunicipalityDropdown: MunicipalityDropdown,
    Spinner: Spinner,
    Button: Button
  },

  mixins: [Role],

  data () {
    return {
      users: null,
      showUsersSpinner: true,
      roles: ['admin'],

      showModal: false,
      showModalSpinner: true,
      municipalities: [],
      editing_user: null
    };
  },

  async mounted () {
    this.users = await this.fetchUsers();
    this.municipalities = await this.fetchMunicipalities();
    this.users.map(u =>
      this.addMunicipalityNameToUser(u.id, u.municipality_id)
    );
    this.showUsersSpinner = false;
  },

  methods: {
    async fetchUsers () {
      try {
        const { data: res } = await this.$http.get('/api/users/approved');

        return res;
      } catch (error) {
        console.error(error);
      }
    },

    async approve (id) {
      try {
        const res = await this.$http.patch(`/api/users/${id}/approve`, {
          method: 'PATCH',
          body: {
            approved: 1
          }
        });

        res.status === 200 && this.loadUsers();
      } catch (error) {
        console.error(error);
      }
    },

    async fetchMunicipalities () {
      try {
        const { data: res } = await this.$http.get('/api/municipalities');
        return res;
      } catch (error) {
        console.error('Error fetching questions: ', error);
      }
    },

    showAddMunicipalityModal (userId) {
      this.showModalSpinner = true;
      this.showModal = true;
      this.editing_user = this.users.find(u => u.id === userId);
    },

    changeMunicipality () {
      this.showModalSpinner = false;
    },

    async addMunicipalityToUser () {
      this.showModal = false;

      const municipalityId = this.selectedMunicipality.id;
      this.editing_user.municipalityId = municipalityId;
      this.addMunicipalityNameToUser(this.editing_user.id, municipalityId);

      const uri = `/api/users/${this.editing_user.id}/addmunicipality/${municipalityId}`;
      try {
        await this.$http.patch(uri);
      } catch (error) {
        console.error('Error adding municipality to user: ', error);
      }
    },

    async removeMunicipalityFromUser () {
      this.showModal = false;
      this.addMunicipalityNameToUser(this.editing_user.id, null);
      const uri = `/api/users/${this.editing_user.id}/removemunicipality`;
      try {
        await this.$http.patch(uri);
      } catch (error) {
        console.error('Error removing municipality from user: ', error);
      }
    },

    addMunicipalityNameToUser (userId, municipalityId) {
      const user = this.users.find(u => u.id === userId);
      if (municipalityId) {
        const municipality = this.municipalities.find(
          m => m.id === municipalityId
        );
        user.municipalityname = municipality ? municipality.name : null;
      } else {
        user.municipalityId = '';
        user.municipalityname = '';
      }
    }
  },
  computed: {
    ...mapGetters({
      selectedMunicipality: 'municipalities/get'
    })
  }
};
</script>

<style lang="scss" scoped>
.container {
  min-height: 50vh;
  position: relative;

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

      .municipality-container {
        display: flex;
        align-items: center;
        justify-content: space-between;

        .municipality-name {
          display: inline;
          margin: 0;
        }
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

  .modal-content {
    h3 {
      margin: 0;
    }

    .spinner-container {
      position: relative;
      height: 100px;
    }
  }
}
</style>
