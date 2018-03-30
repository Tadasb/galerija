<template>
    <el-tabs tab-position="top" style="padding-top: 30px" @tab-click="handleClick">
        <el-tab-pane label="Parodos"><parodos v-if="activeTabIndex == 0"></parodos></el-tab-pane>

        <el-tab-pane label="Menininkai"><menininkai  v-if="activeTabIndex == 1"></menininkai></el-tab-pane>

        <el-tab-pane label="Renginiai"><renginiai  v-if="activeTabIndex == 2"></renginiai></el-tab-pane>

        <el-tab-pane label="Dizainas"><dizainas  v-if="activeTabIndex == 3"></dizainas></el-tab-pane>

        <el-tab-pane label="Fotografija"><fotografija  v-if="activeTabIndex == 4"></fotografija></el-tab-pane>

        <el-tab-pane label="Dirbtuvės"><dirbtuves  v-if="activeTabIndex == 5"></dirbtuves></el-tab-pane>

        <el-tab-pane label="Menu / Ledai"><menu-ledai v-if="activeTabIndex == 6"></menu-ledai></el-tab-pane>

        <el-tab-pane label="Kontaktai"><kontaktai  v-if="activeTabIndex == 7"></kontaktai></el-tab-pane>
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
    }
}
</script>