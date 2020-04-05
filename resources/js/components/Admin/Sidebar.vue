<template>
    <div class="sidebar">
        <div class="items">
            <span class="title">BZN Admin Panel</span>
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
                    name: "Dashboard",
                    path: "/admin"
                },
                {
                    name: "Vragen",
                    path: "/admin/questions"
                },
                {
                    name: "Gemeenten",
                    path: "/admin/municipalities"
                },
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
}
</style>