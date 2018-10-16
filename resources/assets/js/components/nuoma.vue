<template>
    <div class="">
        <div class="row p-3">
            <div class="col">
                <el-button class="float-right" type="primary" round @click="savePage()">saugoti</el-button>
            </div>
        </div>
        <div class="row p-3">
            <div class="col">
                <el-input type="textarea" autosize v-model="page.data.text"></el-input>
            </div>
        </div>
        <div class="row p-3">
            <div class="col">
                <multiple-image-upload :images="page.data.images" :image_type="'nuoma'"></multiple-image-upload>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            page: { id: null, name: null, data: { images: [], text: null } }
        }
    },

    methods: {
        getPage() {
            axios.get('/admin/pages?name=nuoma')
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
                .then(res => this.page = res.data)
                .catch(err => console.log(err))
        }
    },

    mounted() {
        this.getPage()
    }
}
</script>