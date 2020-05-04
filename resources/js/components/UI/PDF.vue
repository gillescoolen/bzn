<template>
  <button :disabled="downloaded" dusk="pdf" @click="create" class="show">{{text}}</button>
</template>

<script>
import pdfMake from 'pdfmake';
import domtoimage from 'dom-to-image';

export default {
    data() {
        return {
            downloaded: false,
            text: 'Download PDF'
        };
    },

    methods: {
        async create() {
            this.text = 'Bezig...';
            // this.downloaded = true;
            const image = await this.generateMapImage();
            const dimensions = await this.getImageDimensions(image);

            const document = {
                pageOrientation: 'landscape',
                pageMargins: 0,
                pageSize: {
                    width: dimensions.width,
                    height: dimensions.height
                },

                content: [
                    {
                        image: image
                    }
                ]
            };

            pdfMake.createPdf(document).open();

            this.text = 'Gedownload!';
        },

        async generateMapImage() {
            const map = document.getElementById('map');

            return await domtoimage.toPng(map);
        },

        async getImageDimensions(url) {
            return new Promise(resolve => {
                const image = new Image();
                image.onload = () =>
                    resolve({ width: image.width, height: image.height });
                image.src = url;
            });
        }
    }
};
</script>

<style lang="scss" scoped>
button {
    right: 0;
    bottom: 0;
    border: none;
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