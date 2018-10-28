<template>
    <div>
        <div class="row p-3">
            <div class="col">
                <div class="float-right">
                    <div v-if="status === 'index'">
                        <el-button type="primary" size="medium" round @click="createItem()">+ sukurti</el-button>
                    </div>

                    <div v-else>
                        <el-button type="danger" size="medium" round @click="cancelEditing()">uždaryti</el-button>
                        <el-button v-if="item.name && item.url" type="success" size="medium" round @click="saveItem()">saugoti</el-button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <el-table v-if="items.length && status === 'index'" :data="items">
                    <el-table-column
                        prop="name"
                        label="Pavadinimas">
                    </el-table-column>
                    <el-table-column>
                        <template slot-scope="scope">
                            <el-button type="success" size="mini" round @click="editItem(scope.row)">koreguoti</el-button>
                            <el-button type="danger" size="mini" round @click="handleDelete(scope.row)">trint</el-button>
                        </template>
                    </el-table-column>
                </el-table>
                <item 
                    v-if="status === 'editing'" 
                    :item="item" 
                    :categories="categories" 
                ></item>
            </div>
        </div>
        <el-dialog
            title="trinti?"
            :visible.sync="show_delete_dialog"
            width="30%">
            <div class="p-3">
                {{item_to_delete.name}}
            </div>
            <span slot="footer">
                <el-button type="text" @click="show_delete_dialog = false">uždaryti</el-button>
                <el-button type="danger" size="medium" round @click="deleteItem()">trinti</el-button>
            </span>
        </el-dialog>
    </div>
</template>
<script>
export default {
    props: {

        items_type: {
            type: String,
            default: 'kita'
        },
    },

    data() {
        return {
            items: [],
            status: 'index',
            new_item_template: { id: null, type: this.items_type, name: null, data: { images: [], text: null, og_image: null}, category: null, sub_category: null, url: null, short_description: null, description: null, starts_at: null, ends_at: null },
            item: {},
            editing_item: {},
            item_to_delete: {},
            show_delete_dialog: false
        }
    },

    methods: {

        getItems() {
            axios.get('/admin/items?type=' + this.items_type)
            .then(res => this.items = res.data)
        },

        createItem() {
            this.editing_item = JSON.parse(JSON.stringify(this.new_item_template))
            this.item = JSON.parse(JSON.stringify(this.new_item_template))
            this.status = 'editing'
        },

        editItem(item) {
            this.editing_item = JSON.parse(JSON.stringify(item))
            this.item = item
            this.status = 'editing'
        },

        cancelEditing() {
            this.item = Object.assign(this.item, this.editing_item)
            this.status = 'index'
        },

        saveItem() {
            if (this.item.id) {
                this.updateItem()
            } else {
                this.storeItem()
            }
        },

        storeItem() {
            axios.post('/admin/items/', this.item)
                .then(res => {
                    this.items.push(res.data)
                    this.status = 'index'
                })
                .catch(err => console.log(err))
        },

        updateItem() {
            axios.patch('/admin/items/' + this.item.id, this.item)
                .then(res => {
                    this.item = res.data
                    this.status = 'index'
                })
                .catch(err => console.log(err))
        },

        handleDelete(item) {
            this.item_to_delete = item
            this.show_delete_dialog = true
        },

        deleteItem() {
            axios.delete('/admin/items/' + this.item_to_delete.id)
            .then(res => {
                this.items = this.items.filter(item => item.id != this.item_to_delete.id)
                this.show_delete_dialog = false
            })
        },

        processEditOperation(event) {
            this.item.description = event.api.origElements.innerHTML
        }

    },

    mounted() {
        this.getItems()
    },

    computed: {
        categories() {
            let categories = {}
            this.items.forEach(item => {
                if(item.category) {
                    if(!categories[item.category]) {
                        categories[item.category] = []
                    }

                    if(item.sub_category && categories[item.category].indexOf(item.sub_category) < 0) {
                        categories[item.category].push(item.sub_category)
                    }
                }
            })

            return categories
        },
    }
}
</script>