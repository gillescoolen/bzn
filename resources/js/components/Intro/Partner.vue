<template>
    <a class="partner" :href="partner.website_url">
        <img :src="`/assets/partners/${partner.image_path}`" :alt="partner.image_path">
    </a>
</template>

<script>
export default {
    name: "Partner",

    props: {
        partner: {
            type: Object,
            required: true
        }
    }
}
</script>

<style lang="scss" scoped>
.partner {
    margin: 0 10px 10px 0;

    img {
        border: 1px solid #e3e3e3;
        box-shadow: 1px 2px 3px rgba(0, 0, 0, 0.2);
        transition: transform 0.1s ease-in-out;
    }

    img:hover {
        transform: scale(1.1);
    }
}
</style>