<template>
    <div class="sidebar">
        <div class="items">
            <span class="title">BZM Admin Panel</span>
            <router-link
                v-for="(item, index) in items"
                :key="index"
                :to="item.path"
                class="item"
            >{{item.name}}</router-link>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            items: [
                {
                    name: "Gebruikers",
                    path: "/admin/users"
                }
            ]
        };
    }
};
</script>

<style lang="scss" scoped>
.sidebar {
    width: 350px;
    height: 100%;
    background-color: #ffffff;
    box-shadow: 4px 0px 7px 0px #7a7a7a10;

    .items {
        display: flex;
        padding: 1rem;
        flex-direction: column;

        .title {
            font-size: 24px;
            margin-bottom: 2rem;
        }

        .item {
            color: black;
            text-decoration: none;
        }
    }
}
</style>