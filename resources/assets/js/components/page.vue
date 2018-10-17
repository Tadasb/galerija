<template>
    <div class="">
        <div class="row p-3">
            <div class="col">
                <el-button v-if="!editing" class="float-right" type="primary" round @click="editing = true">koreguoti</el-button>
                <el-button v-else class="float-right" type="success" round @click="savePage()">saugoti</el-button>
            </div>
        </div>
        <div class="row p-3">
            <div class="col">
                <el-input v-if="editing" type="textarea" autosize v-model="page.data.text"></el-input>
                <h5 v-else>{{page.data.text}}</h5>
            </div>
        </div>
        <div class="row p-3">
            <div class="col">
                <multiple-image-upload v-if="editing" :images="page.data.images" :image_type="page_name"></multiple-image-upload>
                <div v-else class="row">
                    <div v-for="image in page.data.images" class="col-sm-3">
                        <img class="img-fluid" v-img :src="image.url" alt="">
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
            page: { id: null, name: null, data: { images: [], text: null } },
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
        }
    },

    mounted() {
        this.getPage()
    }
}
</script>