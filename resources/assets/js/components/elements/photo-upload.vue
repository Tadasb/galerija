<template>

<section>
    <div class="columns">
        <div class="column is-12">
            <label>
                <span class="button is-white">pridėti nuotrauką</span>
                <input class="file-input" type="file" @change="onFileChange($event)">
            </label>
            <div class="show-pictures">
                <div v-for="(pic,i) in data.pictures" :key="i" style="width: 200px; padding: 12px">
                    <img :src="pic.url" class="image">
                    <p class="button is-white" @click="removeUploadedImage(pic.id)">šalinti</p>
                </div>
            </div>
        </div>
    </div>
</section>
</template>

<style>
    .show-pictures {
        display: flex;
        flex-wrap: wrap;
    }

</style>
<script>
    export default {
        props: {
            data: { default() { return { pictures: [] }}, type: Object }
        },
        data () {
            return {
                upload: null,
            }
        },

        methods: {

            onFileChange(event) {
                this.upload = 'loading'
                var files = event.target.files || event.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },

            createImage(file) {
                var image = new Image();
                var reader = new FileReader();
                var bind = this;

                reader.onload = (event) => {
                    let picture = event.target.result;
                    bind.saveImage(picture);
                };

                reader.readAsDataURL(file);
            },

            saveImage(picture) {
                let bind = this;
                axios.post('/admin/pictures', { image: picture })
                    .then(function(res){
                        bind.data.pictures.push(res.data)
                        bind.upload = null
                    })
                    .catch(error => console.log(error))
            },

            removeUploadedImage(id) {
                let bind = this
                this.deletePicture(id)
                .then(res => bind.data.pictures = bind.data.pictures.filter(pic => pic.id != id))
            },

            deletePicture(id) {
                return axios.delete('/admin/pictures/' + id)
            },

        }
    }
</script>