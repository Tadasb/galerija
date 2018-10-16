<template>
    <div class="container">
        
    </div>
</template>

<script>
    export default {
    	data() {
    		return {
    			page: { id: null, name: null, data: { pictures: [], text: null }}
    		}
    	},

    	methods: {
    		getPage() {
    			axios.get('/admin/pages?name=nuoma')
    			.then(res => this.page = Object.assign(this.page, res.data))
    		},

    		savePage() {
    			axios.patch('/admin/pages/')
    		}
    	},

        mounted() {
        	this.getPage()
        }
    }
</script>
