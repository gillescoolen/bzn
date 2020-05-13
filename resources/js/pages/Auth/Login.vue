<template>
  <form @submit.prevent="login">
    <div>
      <h1>Inloggen</h1>
      <span class="error">{{error}}</span>
      <Input v-model="email" label="Email" type="email" name="email" :required="true" />
      <Input
        v-model="password"
        label="Wachtwoord"
        type="password"
        name="password"
        :required="true"
      />
    </div>

    <div>
      <Button class="submit" type="submit">Inloggen</Button>
      <router-link to="register">Nog geen account?</router-link>
      <router-link to="forgot-password">Wachtwoord vergeten?</router-link>
    </div>
  </form>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
import { Input, Button } from '../../components/UI';

export default {
  components: {
    Input,
    Button
  },

  data() {
    return {
      email: null,
      password: null,
      error: null
    };
  },

  computed: {
    ...mapGetters({
      getUser: 'user/get'
    }),

    enabled() {
      return this.email && this.password && this.password === this.confirmation;
    }
  },

  methods: {
    ...mapActions({
      setUser: 'user/set'
    }),

    async login() {
      try {
        const { data: res } = await this.$http.post('/api/login', {
          email: this.email,
          password: this.password
        });

        this.$http.defaults.headers['Authorization'] = `Bearer ${res.token}`;

        await this.setCurrentUser();

        this.$router.push('admin');
      } catch (error) {
        this.error = error.response.data.message;
      }
    },

    async setCurrentUser() {
      try {
        const { data: res } = await this.$http.get('/api/user');

        this.setUser(res);
        console.log(res);
      } catch (error) {
        this.$router.push('/login');
      }
    }
  }
};
</script>

<style lang="scss" scoped>
form {
  height: 100%;

  display: flex;
  flex-direction: column;
  justify-content: space-between;

  .error {
    margin-top: 1rem;
    color: var(--error);
  }

  div {
    display: flex;
    text-align: center;
    flex-direction: column;

    h1 {
      margin: 0;
    }

    a {
      margin-top: 0.3rem;
      color: var(--primary);
      text-decoration: none;
    }
  }

  .submit {
    height: 3rem;
    color: white;
    background-color: var(--primary);
  }
}
</style>