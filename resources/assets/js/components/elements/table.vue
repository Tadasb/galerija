<template>
      <el-table
        v-if="!isLoading"
        :data="tableData"
        style="width: 100%">
        <el-table-column
          v-for="col in tableColumns"
          :key="col.id"
          :label="col.label"
          :prop="col.prop">
        </el-table-column>

        <el-table-column
          label="Veiksmai">
          <template slot-scope="scope">
            <el-button
              size="mini"
              round
              type="success"
              @click="handleEdit(scope.$index, scope.row)">Koreguoti</el-button>
            <el-button
              size="mini"
              round
              type="danger"
              @click="handleDelete(scope.$index, scope.row)">Trinti</el-button>
          </template>
        </el-table-column>
      </el-table>
</template>

<script>
    export default {
      props: {
        isLoading: { type: Boolean, default: true },
        tableData: { type: Array, default: [] },
        tableColumns: { type: Array, default: [] },
      },
    	data() {
    		return {
          tableStatus: 'index'
    		}
    	},

      methods: {
        handleDelete(index, item) {
          this.$emit('delete', index)
        },

        handleEdit(index, item) {
          this.$emit('edit', index)
        }
      },
    }
</script>