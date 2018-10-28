<template>
	<div>
	    <div class="row p-3">
	        <div class="col">
	            <el-button v-if="!editing" class="float-right" type="primary" round @click="editing = true">koreguoti</el-button>
	            <el-button v-else class="float-right" type="success" round @click="savePage()">saugoti</el-button>
	        </div>
	    </div>
	    <div class="row">
	    	<div class="col-md-6">
		        <div class="row p-3">
		            <div class="col">
		            	<label for=""><strong>Tekstas</strong></label>
		                <el-input v-if="editing" type="textarea" autosize v-model="page.data.text"></el-input>
		                <h5 v-else>{{page.data.text}}</h5>
		            </div>
		        </div>
		        <div class="row p-3">
		            <div class="col">
		            	<label for=""><strong>Telefono nr.</strong></label>
		                <el-input v-if="editing" type="text" size="medium" v-model="page.data.phone"></el-input>
		                <h5 v-else>{{page.data.phone}}</h5>
		            </div>
		        </div>
		        <div class="row p-3">
		            <div class="col">
		            	<label for=""><strong>El. paštas</strong></label>
		                <el-input v-if="editing" type="text" size="medium" v-model="page.data.email"></el-input>
		                <h5 v-else>{{page.data.email}}</h5>
		            </div>
		        </div>
		        <div class="row p-3">
		            <div class="col">
		            	<label for=""><strong>Adresas</strong></label>
		                <el-input v-if="editing" type="text" size="medium" v-model="page.data.address"></el-input>
		                <h5 v-else>{{page.data.address}}</h5>
		            </div>
		        </div>
		        <div class="row p-3">
		            <div class="col">
		            	<label for=""><strong>Instagram nuoroda</strong></label>
		                <el-input v-if="editing" type="text" size="medium" v-model="page.data.instagram"></el-input>
		                <h5 v-else>{{page.data.instagram}}</h5>
		            </div>
		        </div>
		        <div class="row p-3">
		            <div class="col">
		            	<label for=""><strong>Facebook nuoroda</strong></label>
		                <el-input v-if="editing" type="text" size="medium" v-model="page.data.facebook"></el-input>
		                <h5 v-else>{{page.data.facebook}}</h5>
		            </div>
		        </div>
	    	</div>
	    </div>
	</div>
</template>
<script>
export default {
    data() {
        return {
            page: { id: null, name: null, data: { text: null, phone: null, email: null, address: null, instagram: null, facebook: null, google_maps_url: null } },
            editing: false,
        }
    },

    methods: {
        getPage() {
            axios.get('/admin/pages?name=kontaktai')
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