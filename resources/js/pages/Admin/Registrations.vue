<template>
  <div class="container">
    <h1>Gebruikers in afwachting van toelating</h1>

    <div v-if="showFetchingUsersSpinner">
      <Spinner stroke="#744144" />
    </div>
    <div v-else>
      <div dusk="users" class="users" v-if="users && users.length > 0">
        <div class="user header">
          <div class="name">Naam</div>
          <div class="email">Email</div>
          <div>Rol</div>
          <div>Toelaten?</div>
        </div>
        <div v-for="(user, index) in users" :key="index" :dusk="`user-${index}`" class="user">
          <div :dusk="`name-${index}`" class="name">{{user.name}}</div>
          <div :dusk="`email-${index}`" class="email">{{user.email}}</div>
          <div :dusk="`role-${index}`" class="role">{{user.role}}</div>
          <div class="action">
            <Button
              :dusk="`approve-${index}`"
              @click="approve(user.id)"
              class="approve"
              :variant="`secondary`"
              :inverse="true"
            >Toelaten</Button>
            <Button
              :dusk="`decline-${index}`"
              @click="decline(user.id)"
              class="decline"
              :variant="`error`"
              :inverse="true"
            >Weigeren</Button>
          </div>
        </div>
      </div>
      <div v-else class="message">
        <h2>Geen gebruikers gevonden.</h2>
      </div>
    </div>
  </div>
</template>


<script>
import { Role } from "../../mixins";
import { Spinner, Button } from "../../components/UI";

export default {
  mixins: [Role],

  components: {
    Spinner,
    Button
  },

  data() {
    return {
      users: null,
      showFetchingUsersSpinner: true,
      roles: ["admin"]
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
        const { data: res } = await this.$http.get("/api/users/unapproved");

        return res;
      } catch (error) {
        console.error(error);
      } finally {
        this.showFetchingUsersSpinner = false;
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

    async decline(user_id) {
      this.$http
        .delete(`/api/users/${user_id}`)
        .then(res => {
          res.status === 200 && this.loadUsers();
        })
        .catch(e => {
          console.error(`Error declining user with id ${user_id}: ${e}`);
        });
    }
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

      .action {
        display: flex;

        .approve,
        .decline {
          cursor: pointer;
          font-weight: 700;
          user-select: none;
          width: 100%;
        }

        .approve {
          color: #3ba549;
        }

        .decline {
          color: #c53c53;
          margin-left: 10px;
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
}
</style>
