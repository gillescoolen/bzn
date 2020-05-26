<template>
  <form @submit.prevent="reset">
    <div>
      <h1>Wachwoord vergeten?</h1>
      <span class="error">{{error}}</span>
      <Input v-model="email" label="Email" type="email" name="email" :required="true" />
    </div>

    <div>
      <Button class="submit" type="submit">Herstel je wachtwoord</Button>
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
      error: null
    };
  },

  methods: {
    async reset () {
      try {
        const { data: res } = await this.$http.post('/api/forgot-password', {
          email: this.email
        });
        console.log(res);

        this.error = res.message;
      } catch (error) {
        console.error(error);
        this.error = error.response.data.message;
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
