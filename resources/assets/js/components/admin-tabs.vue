<template>
    <el-tabs tab-position="top" style="padding-top: 30px" @tab-click="handleClick">
        <el-tab-pane label="Pradinis">
            <page :page_name="'pradinis'" :show_images="false"></page>
        </el-tab-pane>

        <el-tab-pane label="Parodos">
            <page :page_name="'parodos'" :show_images="false"></page>
            <item-list :page_name="'parodos'"/>
        </el-tab-pane>

        <el-tab-pane label="Menininkai">
            <page :page_name="'menininkai'" :show_images="false"></page>
            <item-list :page_name="'menininkai'"/>
        </el-tab-pane>

        <el-tab-pane label="Renginiai">
            <page :page_name="'renginiai'" :show_images="false"></page>
            <item-list :page_name="'renginiai'"/>
        </el-tab-pane>

        <el-tab-pane label="Dizainas">
            <page :page_name="'dizainas'" :show_images="false"></page>
            <item-list :page_name="'dizainas'"/>
        </el-tab-pane>

        <el-tab-pane label="Fotografija">
            <page :page_name="'fotografija'"></page>
        </el-tab-pane>

        <el-tab-pane label="Dirbtuvės">
            <page :page_name="'dirbtuves'" :show_images="false"></page>
            <item-list :page_name="'dirbtuves'"/>
        </el-tab-pane>

        <el-tab-pane label="Meniu">
            <page :page_name="'meniu'"></page>
        </el-tab-pane>

        <el-tab-pane label="Ledai">
            <page :page_name="'ledai'"></page>
        </el-tab-pane>

        <el-tab-pane label="Nuoma">
            <page :page_name="'nuoma'"></page>
        </el-tab-pane>

        <el-tab-pane label="Kontaktai">
            <page :page_name="'kontaktai'" :show_images="false"></page>
        </el-tab-pane>
        
    </el-tabs>
</template>

<script>
export default {
	data() {
		return {
			activeTabIndex: 0
		}
	},

    methods: {
      	handleClick(tab, event) {
      		this.activeTabIndex = tab.index
      	}
    },

    mounted() {

    }

}
</script>