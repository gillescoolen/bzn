<template>
  <form @submit.prevent="register">
    <div>
      <h1>Registreren</h1>
      <span class="error">{{error}}</span>
      <Input v-model="name" label="Naam" type="name" name="name" :required="true" />
      <Input v-model="email" label="Email" type="email" name="email" :required="true" />
      <Input
        v-model="password"
        label="Wachtwoord"
        type="password"
        name="password"
        :required="true"
      />
      <Input
        v-model="confirmation"
        label="Bevestig wachtwoord"
        type="password"
        name="confirmation"
        :required="true"
      />
    </div>

    <div>
      <Button :disabled="enabled" class="submit" type="submit">Registreren</Button>
      <router-link to="login">Al een account?</router-link>
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

  data () {
    return {
      name: null,
      email: null,
      password: null,
      confirmation: null,
      error: null
    };
  },

  computed: {
    ...mapGetters({
      getUser: 'user/get'
    })
  },

  methods: {
    ...mapActions({
      setUser: 'user/set'
    }),

    async register () {
      try {
        if (this.password !== this.confirmation) { throw new Error({ response: { data: { message: 'De wachtwoorden komen niet overeen.' } } }); }

        const { data: res } = await this.$http.post('/api/register', {
          name: this.name,
          email: this.email,
          password: this.password
        });

        this.$http.defaults.headers.Authorization = `Bearer ${res.token}`;

        await this.setCurrentUser();

        this.$router.push('admin');
      } catch (error) {
        this.error = error.response.data.message;
      }
    },

    async setCurrentUser () {
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
      margin-bottom: -0.9rem;
      text-decoration: none;
      color: var(--primary);
    }
  }

  .submit {
    height: 3rem;
    color: white;
    background-color: var(--primary);
  }
}
</style>
