<template>
    <div class="back" @click="$router.go(-1)">
        <div class="txt">
            <i class="fas fa-arrow-left"></i>
            <p>Terug</p>
        </div>
        <img src="/assets/BIO_logo.png" alt="Biodiversiteitsstresstest logo">
    </div>
</template>

<style lang="scss" scoped>
.back {
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    padding: 5px;

    .txt {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-right: 10px;

        i {
            color: #66a930;
        }

        p {
            margin: 0;
            padding: 0;
            color: #66A930;
            font-weight: bold;
        }
    }

    > img {
        width: 50px;
    }
}

.back:hover {
    box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.2);
} 
</style>