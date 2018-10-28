<template>
    <el-tabs tab-position="top" style="padding-top: 30px" @tab-click="handleClick">

        <el-tab-pane label="Parodos">
            <item-list :items_type="'parodos'" v-if="activeTabIndex == 0"/>
        </el-tab-pane>

        <el-tab-pane label="Menininkai">
            <item-list :items_type="'menininkai'" v-if="activeTabIndex == 1"/>
        </el-tab-pane>

        <el-tab-pane label="Renginiai">
            <item-list :items_type="'renginiai'" v-if="activeTabIndex == 2"/>
        </el-tab-pane>

        <el-tab-pane label="Dizainas">
            <item-list :items_type="'dizainas'" v-if="activeTabIndex == 3"/>
        </el-tab-pane>

        <el-tab-pane label="Fotografija">
            <page  v-if="activeTabIndex == 4" :page_name="'fotografija'"></page>
        </el-tab-pane>

        <el-tab-pane label="Dirbtuvės">
            <item-list :items_type="'dirbtuves'" v-if="activeTabIndex == 5"/>
        </el-tab-pane>

        <el-tab-pane label="Meniu">
            <page v-if="activeTabIndex == 6" :page_name="'meniu'"></page>
        </el-tab-pane>

        <el-tab-pane label="Ledai">
            <page v-if="activeTabIndex == 7" :page_name="'ledai'"></page>
        </el-tab-pane>

        <el-tab-pane label="Nuoma">
            <page v-if="activeTabIndex == 8" :page_name="'nuoma'"></page>
        </el-tab-pane>

        <el-tab-pane label="Kontaktai"><kontaktai  v-if="activeTabIndex == 9"></kontaktai></el-tab-pane>
        
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