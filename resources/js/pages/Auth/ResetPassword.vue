<template>
  <form @submit.prevent="reset">
    <div>
      <h1>Wachtwoord herstellen</h1>
      <span class="error">{{error}}</span>
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
      <router-link to="login">Toch weer herinnerd?</router-link>
    </div>
  </form>
</template>

<script>
import { Input, Button } from '../../components/UI';

export default {
  components: {
    Input,
    Button
  },

  data () {
    return {
      email: null,
      password: null,
      confirmation: null,
      error: null
    };
  },
  methods: {
    async reset () {
      try {
        await this.$http.post('/api/reset-password', {
          token: this.$route.params.token,
          email: this.email,
          password: this.password,
          password_confirmation: this.confirmation
        });

        this.$router.push({ name: 'login' });
      } catch (error) {
        this.error = 'Zorg dat het wachtwoord minimaal 8 tekens is!';
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
