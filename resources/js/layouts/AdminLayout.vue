<template>
  <div class="main">
    <Sidebar />
    <div class="wrapper">
      <div class="content">
        <transition name="fade" mode="out-in">
          <slot />
        </transition>
      </div>
    </div>
  </div>
</template>

<script>
import { Sidebar } from '../components/Admin';
import { mapGetters } from 'vuex';

export default {
  components: {
    Sidebar
  },

  computed: {
    ...mapGetters({
      user: 'user/get'
    })
  },

  created () {
    !this.user && this.$router.push('/login');

    this.$http.defaults.headers.Authorization = `Bearer ${this.user.api_token}`;
  }
};
</script>

<style lang="scss" scoped>
.main {
  display: flex;
  flex-direction: row;
  background-color: #dde3ee;

  width: 100vw;
  height: 100vh;
  max-width: 100%;
  max-height: 100%;

  .wrapper {
    width: 100%;
    height: 100vh;

    .content {
      margin: 4rem;
      padding: 2rem;
      min-height: 50vh;
      border-radius: 15px;
      background-color: #ffffff;
      box-shadow: 0px 0px 4px 0px #7a7a7a10;
    }
  }
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>
