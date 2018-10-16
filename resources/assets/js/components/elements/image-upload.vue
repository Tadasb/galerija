<template>
    <div class="image-upload__box mb-2 mr-2 p-1">
        <div v-if="!image && status != 'loading'">
            <label class="image-upload">
                <div class="image-upload__placeholder p-2">
                    <small>+ įkelti</small>
                </div>
                <input class="file-input" type="file" @change="onFileChange($event)">
            </label>
        </div>

        <div v-if="status === 'loading'" class="text-center m-5"><i class="pns pns-circle-04 pns-is-spinning"></i></div>

        <transition name="height">
            <div v-if="image" class="mb-2 d-block">
                <img class="img-responsive pb-1" :src="image.url"/>
                <div class="delete-text text-center" @click="removeImage(image.id)">trinti</div>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        props: {
            image_type: {
                default: 'other',
                type: String
            },
            image: {
                type: Object,
                default: null
            }

        },

        data() {
            return {
                newImage: null,
                status: null
            }
        },

        methods: {
            onFileChange(event) {
                this.status = 'loading'
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

            saveImage(image) {
                let bind = this;
                axios.post('/admin/uploads/pictures', { image: image, type: this.image_type })
                    .then(function(res) {
                        bind.$emit('updated', res.data)
                        bind.status = 'loaded'
                    })
                    .catch()
            },

            removeImage(id) {
                let bind = this
                this.deleteImage(id)
                .then(function(res) {
                    bind.$emit('deleted')
                })
            },

            deleteImage(id) {
                return axios.delete('/admin/uploads/' + id)
            },
        },

        computed: {

        }
    }
</script>

<style>

    .image-upload__box {
        cursor: pointer;
        width: 120px;
    }

    .image-upload__placeholder {
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px dashed #666;
    }

    .delete-text {
        color: red;
        cursor: pointer;
    }
</style>