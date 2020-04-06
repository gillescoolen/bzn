<template>
    <button dusk="pdf" @click="create" class="show">PDF</button>
</template>

<script>
import jsPDF from "jspdf";

export default {
    methods: {
        create() {
            const doc = new jsPDF();
            doc.text('Dit is een PDF gegenereerd op onze site!', 10, 10);
            doc.save('bzn.pdf');
        }
    }
};
</script>

<style lang="scss" scoped>
button {
    right: 0;
    bottom: 0;
    margin: 1rem;
    color: black;
    padding: 0.8rem;
    cursor: pointer;
    z-index: 1000000;
    font-weight: 700;
    user-select: none;
    font-size: 0.8rem;
    position: absolute;
    border-radius: 5px;
    transition: all 0.2s;
    background-color: white;
    box-shadow: 0px 4px 4px 1px #0000001f;

    &:focus {
        outline: none;
    }

    &:hover {
        transition: all 0.1s;
        box-shadow: 0px 4px 4px 1px #0000003d;
    }
}
</style>