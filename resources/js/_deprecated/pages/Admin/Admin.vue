<template>
    <div>
        <h1 v-if="user.role !== 'gebruiker'">Dashboard</h1>
        <div v-else class="message">
            <h1>Uw account is nog niet toegelaten.</h1>
            <h2>Wacht tot een administrator uw account toelaat.</h2>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    computed: {
        ...mapGetters({
            user: "user/get"
        })
    }
};
</script>

<style lang="scss" scoped>
.message {
    height: 300px;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
}
</style>