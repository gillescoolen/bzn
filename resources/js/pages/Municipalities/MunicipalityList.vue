<template>
    <div class="container">
        <h2>Selecteer een gemeente</h2>
        <div class="municipality-list">
            <div class="municipality" v-for="municipality in this.municipalities" v-bind:key="municipality.id">
                <ContentBox v-bind:municipality="municipality">
                    <template v-slot:title>
<!--                        <button @click="setMunicipalityID(municipality.id), $router.push('tasks'), setColor(municipality.hexcolor)">-->
<!--                                <h3 class="title">{{`Gemeente ${municipality.name}`}}</h3>-->
<!--                        </button>-->
                        <button @click="setMunicipality(municipality), $router.push('tasks'), setColor(municipality.hexcolor)">
                            <h3 class="title">{{`Gemeente ${municipality.name}`}}</h3>
                        </button>
                    </template>
                </ContentBox>
            </div>
        </div>
    </div>
</template>

<script>
    import { ContentBox } from "../../components/UI"
    import Button from "../../components/UI/Button";
    import {mapActions} from "vuex";
    export default {
        name: "MunicipalityList",

        components: {
            Button,
            ContentBox,
        },

        data() {
            return {
                municipalities: []
            }
        },

        async mounted() {
            this.municipalities = await this.fetchMunicipalities()
        },

        methods: {
            async fetchMunicipalities() {
                try {
                    const { data: res } = await this.$http.get(
                        "/api/municipalities"
                    );
                    console.log(`BOOP! : ${JSON.stringify(res)}`);
                    return res;
                } catch (error) {
                    console.error("Error fetching questions: ", error);
                }
            },

            ...mapActions({
                setColor: 'steps/setColor',
                setMunicipalityID: 'steps/setMunicipalityID',
                setMunicipality: 'municipalities/set',
            })

        }
    };
</script>

<style lang="scss" scoped>
    .container {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    h2 {
        text-align: center;
    }

    .municipality-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;

        .municipality {
            margin: 10px;
            width: calc(50% - 20px);
            .title {
                padding: 5px;
                cursor: pointer;
                text-align: left;
                font-style: italic;
                font-weight: normal;
            }

            .desc {
                padding: 0;
                margin: 0 0 10px 0;
            }

            .read-more {
                color: green;
                cursor: pointer;
            }
        }
    }



</style>
