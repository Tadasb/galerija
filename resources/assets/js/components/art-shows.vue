<template>
    <el-container>
        <el-header>
            <el-col>
                <el-row>
                    <div v-if="status === 'index'" class="has-text-right">
                        <el-button type="primary" size="mini" round @click="addShow()">Pridėti</el-button>
                        
                    </div>
                    <div v-else class="has-text-right">
                        <el-button type="link" size="mini" round @click="closeEditing()">Uždaryti</el-button>
                        <el-button type="primary" size="mini" round @click="saveShow()">Saugoti</el-button>
                    </div>
                </el-row>
            </el-col>
        </el-header>
        <el-main>
            <vue-table 
            v-if="status === 'index'"
            :is-loading="isLoading"
            :tableData="artShows"
            :tableColumns="tableColumns"
            @edit="handleEdit">
            </vue-table>

            <div v-else>
                <div class="columns">
                    <div class="column is-8">
                        <div class="field">
                            Pavadinimas
                            <el-input v-model="active.name"></el-input>
                        </div>
                        <div class="field">
                            Nuoroda
                            <el-input v-model="active.url" placeholder="pvz.: grazi-paroda"></el-input>
                        </div>
                        <div class="field">
                            Trumpas aprašymas
                            <el-input v-model="active.short_description"></el-input>
                        </div>
                        <div class="field">
                            Aprašymas
                            <el-input v-model="active.description" type="textarea" autosize></el-input>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="field">
                            Pradžios data<br>
                            <el-date-picker v-model="active.starts_at" value-format="yyyy-MM-dd" format="yyyy-MM-dd"></el-date-picker>
                        </div>
                        <div class="field">
                            Pabaigos data<br>
                            <el-date-picker v-model="active.ends_at" value-format="yyyy-MM-dd" format="yyyy-MM-dd"></el-date-picker>
                        </div>
                        <div class="field">
                            Pradžios laikas<br>
                            <el-time-picker v-model="active.starting_time" value-format="HH:mm:ss" format="HH:mm"></el-time-picker>
                        </div>
                    </div>
                </div>
                <photo-upload :data="active.data"></photo-upload>
            </div>
        </el-main>
    </el-container>
</template>

<script>
    export default {
    	data() {
    		return {
    			isLoading: true,
    			status: 'index',
    			artShows: [],
    			editing: {},
                active: {},
    			tableColumns: [
    				{ id: 1, label: 'Pavadinimas', prop: 'name' }
    			],
                showTemplate: {
                    name: null,
                    short_description: null,
                    description: null,
                    starts_at: null,
                    ends_at: null,
                    starting_time: null,
                    data: { pictures: []}
                }
    		}
    	},

    	methods: {
    		handleEdit(index) {
                this.editing = JSON.parse(JSON.stringify(this.artShows[index]))
    			this.active = this.artShows[index]
    			this.status = 'editing'
    		},

            addShow() {
                this.editing = JSON.parse(JSON.stringify(this.showTemplate))
                this.active = JSON.parse(JSON.stringify(this.showTemplate))
                this.status = 'editing'
            },


    		saveShow() {
                let bind = this
                if(this.active.id) {
                    this.updateShow()
                    .then(function(response) {
                        bind.active = response.data
                        bind.status = 'index'
                    })
                }
                else {
                    this.storeShow()
                    .then(function(response) {
                        bind.artShows.push(response.data)
                        bind.status = 'index'
                    })
                }

    		},

            storeShow() {
                return axios.post('/admin/art-shows', this.active)
            },

            updateShow() {
                return axios.patch('/admin/art-shows/' + this.active.id, this.active)
            },

            closeEditing() {
                this.active = Object.assign(this.active, this.editing)
                this.status = 'index'
            }
    	},

        mounted() {
        	let bind = this
            axios.get('/admin/art-shows')
            .then(function(response) {
    			bind.artShows = response.data
    			bind.isLoading = false 
    		})

        }
    }
</script>