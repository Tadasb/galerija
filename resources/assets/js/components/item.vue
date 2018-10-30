<template>
    <div class="">
        <div class="row p-3">
            <div class="col-sm-6">
                <label for=""><strong>Pavadinimas*</strong></label>
                <el-input v-model="item.name" size="medium" class="pb-2"></el-input>
            </div>
            <div class="col-sm-6">
                <label for=""><strong>Nuoroda* (url)</strong></label>
                <el-input v-model="item.url" size="medium" class="pb-2"></el-input>
            </div>
        </div>
        <div class="row p-3">
            <div class="col-sm-6">
                <label for=""><strong>Kategorija</strong></label><br>
                <el-select class="pb-2"
                    v-model="item.category" 
                    placeholder="kategorija" 
                    allow-create 
                    filterable>
                    <el-option 
                        v-for="(cat, ci) in cats"
                        :key="ci"
                        :label="cat"
                        :value="cat"
                    ></el-option>
                </el-select>
            </div>
            <div class="col-sm-6">
                <label for=""><strong>Sub kategorija</strong></label><br>
                <el-select v-model="item.sub_category" placeholder="sub kategorija" allow-create filterable class="pb-2">
                    <el-option v-for="(sub_cat, sci) in subs"
                        :key="sci"
                        :label="sub_cat"
                        :value="sub_cat">
                    </el-option>
                </el-select>
            </div>
        </div>
        <div class="row p-3">
            <div class="col">
                <label for=""><strong>Trumpas aprašymas (būtina dėl SEO)</strong></label>
                <el-input v-model="item.short_description" size="medium" class="pb-2"></el-input>
            </div>
        </div>
        <div class="row p-3">
            <div class="col">
                <label for=""><strong>Aprašymas</strong></label>
                <medium-editor style="boder: 1px solid #222" :text='item.description' @edit="processEditOperation($event, item.data)" class="pb-2" />
            </div>
        </div>
        <div v-if="item.type === 'parodos'" class="row p-3">
            <div class="col-sm-6">
                <label for=""><strong>Pradžios data</strong></label><br>
                <el-date-picker class="pb-2"
                    v-model="item.starts_at" 
                    type="date" 
                    placeholder=""
                    :value-format="'yyyy-MM-dd'"
                ></el-date-picker>
            </div>
            <div class="col-sm-6">
                <label for=""><strong>Pabaigos data</strong></label><br>
                <el-date-picker class="pb-2"
                    v-model="item.ends_at" 
                    type="date" 
                    placeholder=""
                    :value-format="'yyyy-MM-dd'"
                ></el-date-picker>
            </div>
        </div>
        <div class="row p-3">
            <div class="col">
                <label for=""><strong>Nuotraukos</strong></label>
                <multiple-image-upload :images="item.data.images" :image_type="item.type" class="pb-2"
                ></multiple-image-upload>
            </div>
        </div>
        <div class="row p-3">
            <div class="col">
                <label for=""><strong>FB nuotrauka (1200x630px)</strong></label>
                <image-upload class="pb-2" 
                    :image_type="item.type + '_fb'" 
                    :image="item.data.og_image" 
                    @updated="updateOgImage" 
                    @deleted="deleteOgImage">
                </image-upload>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        disabled_fields: {
            type: Array
        },

        item: {
            type: Object,
        },

        categories: {
            type: Object
        },
    },

    data() {
        return {
            
        }
    },

    methods: {

        processEditOperation(event) {

            this.item.description = event.api.origElements.innerHTML
        },

        updateOgImage(image) {
            this.item.data.og_image = image
        },

        deleteOgImage() {
            this.item.data.og_image = null
        },
    },

    computed: {
        cats() {
            return Object.keys(this.categories)
        },

        subs() {
            if(this.item.category && this.categories[this.item.category]) {
                return this.categories[this.item.category]
            }

            else return []
        }
    }
}
</script>