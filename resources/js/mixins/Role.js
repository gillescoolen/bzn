
import { mapGetters } from 'vuex';

export default {

    mounted() {
        this.user.role === '' && this.$router.go('/login');
        !this.roles.some(role => role === this.user.role) && this.$router.push('/admin');
    },

    computed: {
        ...mapGetters({
            user: 'user/get'
        })
    }
}