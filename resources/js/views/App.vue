<template>
    <div>
        <NavigationBar/>

        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import { NavigationBar } from "../components/Navigation";

export default {
    components: {
        NavigationBar
    }
}
</script>

<style lang="scss">
$primary: #297536;
$secondary: #3e9c4e;
$accent: #478f53;

body {
    margin: 0;
    font-family: 'Arial';
}
</style>
