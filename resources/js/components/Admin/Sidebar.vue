<template>
  <div class="sidebar">
    <div class="items">
      <span class="title">BZN Admin Panel</span>
      <router-link
        v-for="(item, index) in allowed"
        :to="item.path"
        :key="index"
        class="item"
      >{{item.name}}</router-link>
    </div>
    <div class="user">
      <Button dusk="logout" @click="logout" :variant="`darkgray`" :inverse="true">Uitloggen</Button>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
import { Button } from '../UI';

export default {
  components: {
    Button
  },
  data () {
    return {
      items: [
        {
          name: 'Dashboard',
          path: '/admin',
          roles: ['admin', 'moderator']
        },
        {
          name: 'Vragen',
          path: '/admin/questions',
          roles: ['admin', 'moderator']
        },
        {
          name: 'Gemeenten',
          path: '/admin/municipalities',
          roles: ['admin', 'moderator']
        },
        {
          name: 'Gebruikers',
          path: '/admin/users',
          roles: ['admin']
        },
        {
          name: 'Registraties',
          path: '/admin/registrations',
          roles: ['admin']
        }
      ]
    };
  },

  methods: {
    ...mapActions({
      setUser: 'user/set'
    }),

    async logout () {
      try {
        this.setUser(null);
        await this.$http.post('/api/logout');
        this.$http.defaults.headers.Authorization = null;

        this.$router.push('/login');
      } catch (error) {
        console.error(error);
      }
    }
  },

  computed: {
    ...mapGetters({
      user: 'user/get'
    }),

    /**
     * Returns the items the user is allowed to see.
     */
    allowed () {
      return this.items.filter(item =>
        item.roles.some(role => role === this.user.role)
      );
    }
  }
};
</script>

<style lang="scss" scoped>
.sidebar {
  display: flex;
  flex-direction: column;
  justify-content: space-between;

  width: 350px;
  height: 100%;
  background-color: #ffffff;
  box-shadow: 4px 0px 7px 0px #7a7a7a10;

  .items {
    display: flex;
    padding: 1rem;
    flex-direction: column;

    .title {
      font-size: 1.8rem;
      margin-bottom: 2rem;
    }

    .item {
      font-size: 1.2rem;
      color: black;
      padding: 0.8rem 0rem;
      text-decoration: none;
      border-bottom: 1px solid #dde3ee;

      &:last-child {
        border-bottom: none;
      }
    }
  }

  .user {
    display: flex;
    flex-direction: row-reverse;
    margin: 1rem;
  }
}
</style>
