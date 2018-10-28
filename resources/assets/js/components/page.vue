<template>
    <div class="">
        <div class="row p-3">
            <div class="col">
                <el-button v-if="!editing" class="float-right" type="primary" round size="medium" @click="editing = true">koreguoti</el-button>
                <el-button v-else class="float-right" type="success" round size="medium" @click="savePage()">saugoti</el-button>
            </div>
        </div>
        <div class="row p-3">
            <div class="col">
                <label for=""><strong>Tekstas</strong></label>
                <medium-editor v-if="editing" :text='page.data.text' @edit="processEditOperation($event, page.data)"/>
                <div v-else v-html="page.data.text"></div>
            </div>
        </div>
        <div class="row p-3">
            <div class="col">
                <label for=""><strong>Trumpas aprašymas (būtina dėl SEO)</strong></label>
                <el-input v-if="editing" v-model="page.data.short_description" size="medium" class="pb-2"></el-input>
                <div v-else>
                    <div v-if="page.data.short_description">{{page.data.short_description}}</div>
                    <div v-else>-</div>
                </div>
            </div>
        </div>
        <div class="row p-3">
            <div class="col">
                <label for=""><strong>Nuotraukos</strong></label>
                <multiple-image-upload v-if="editing" :images="page.data.images" :image_type="page_name"></multiple-image-upload>
                <div v-else class="row">
                    <div v-for="image in page.data.images" class="col-sm-3">
                        <img class="img-fluid" v-img :src="image.url" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-3">
            <div class="col">
                <label for=""><strong>FB nuotrauka (1200x630px)</strong></label>
                <image-upload v-if="editing" class="pb-2" 
                    :image_type="page_name + '_fb'" 
                    :image="page.data.og_image" 
                    @updated="updateOgImage" 
                    @deleted="deleteOgImage">
                </image-upload>
                <div v-else class="row">
                    <div v-if="page.data.og_image" class="col-sm-3">
                        <img class="img-fluid" v-img :src="page.data.og_image.url" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        page_name: {
            type: String
        }
    },

    data() {
        return {
            page: { id: null, name: null, data: { images: [], text: null, og_image: null, short_description: null } },
            editing: false,
        }
    },

    methods: {
        getPage() {
            axios.get('/admin/pages?name=' + this.page_name)
                .then(res => {

                    this.page.id = res.data.id
                    this.page.name = res.data.name

                    if(res.data.data) {
                        this.page.data = res.data.data
                        this.page = res.data
                    }

                    if(!this.page.data.images) {
                        this.page.data.images = []
                    }

                })
        },

        savePage() {
            axios.patch('/admin/pages/' + this.page.id, this.page)
                .then(res => {
                    this.page = res.data
                    this.editing = false
                })
                .catch(err => console.log(err))
        },

        processEditOperation(event, data) {

            data.text = event.api.origElements.innerHTML
        },

        updateOgImage(image) {
            this.page.data.og_image = image
        },

        deleteOgImage() {
            this.page.data.og_image = null
        },
    },

    mounted() {
        this.getPage()
    }
}
</script>