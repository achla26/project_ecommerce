<template>
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-4 d-flex align-items-center mb-1">
          <label class="me-1">Show</label>
          <select v-model="perPage" class="form-control w-25 me-1">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>
          <label>entries</label>
        </div>
        <div class="col-md-8">
          <input type="text" v-model="searchQuery" class="form-control" placeholder="Search Here..." />
        </div>
      </div>
    </div>
    <hr/>  
    <div class="card-body">
      <table class="table dt-responsive nowrap table-striped w-100" ref="refListTable">
        <thead>
          <tr>
            <th v-for="field in columns" :key='field.key'>
              <span v-if="field.label">{{ field.label }}</span>
              <span v-else>{{ field.key.charAt(0).toUpperCase() + field.key.slice(1) }}</span>
            </th>
          </tr>
        </thead>
        <tbody>
          
          <tr v-for="item in items" :key="item">
            <td v-for="field in columns" :key='field.key'>
              <div v-if="field.key === 'status'">
                <button type="button" 
                  @click="updateStatus(item.id, item.status)"
                  class="btn  btn-sm"
                  v-bind:class="item.status == 'active' ? 'btn-success' : 'btn-warning' " >
                  {{ item.status }}
                </button>
              </div>

              <div v-if="field.key === 'action'">
               <a :href="updateLink.replace('__', item.id)" class="btn btn-primary btn-sm action-icon me-2"><i 
                    class="mdi mdi-square-edit-outline"></i></a>

                <button type="button" @click="deleteItem(item.id)" class="btn btn-danger btn-sm action-icon"><i
                    class="mdi mdi-delete"></i></button>
              </div>

              <div v-if="field.key !== 'action' && field.key !== 'status'">
                <span v-if="typeof item[field.key] === 'object' && item[field.key] !== null">
                  {{ item[field.key].name }}</span>
                <span v-else>{{ item[field.key] }}</span>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="row">
        <div  class="d-flex align-items-center justify-content-between ">
            <span class="text-muted">Showing {{ paginateData.from }} to {{ total }} of {{ total }} entries</span>
            
            <div class="paginate">
              <ul class="d-flex justify-content-end list-unstyled">
                <a 
                  v-for="link in paginateData.links"  :key="link" 
                  class="d-flex" 
                   @click.prevent="getTableData(link.url)" >
                   <li  class="border px-3 py-1" v-if="link.active" v-html="link.label"></li>
                </a>
              </ul>
            </div>
        </div>
      </div>
    </div> <!-- end tab-content-->
  </div> <!-- end card body-->
</template>
<script>
import axios from 'axios'
import { ref, watch, computed } from 'vue'
export default {
  props: {
    items: {
      type: Object,
    },
    columns: {
      type: Array,
    },
    perPage: {
      type: Number,
    },
    updateLink: {
      type: String,
    },
    deleteLink:{
      type: String,
    },
    module: {
      type: String,
    }
  },

  setup(props) {
    
    let url = `/backend/${props.module}/status`;
    
    let apiGetUrl = `/api/get-${props.module}?page=1`
    
    let items = ref([]);
    let paginateData = ref([]);

    const refListTable = ref(null)
    const perPage = ref(50)
    const total = ref(0)
    const currentPage = ref(1)
    const searchQuery = ref('')
    const sortBy = ref('id')
    const isSortDirDesc = ref(true)

    const updateStatus = (id, status) => {
      status = (status == 'active' ? 'deactive' : 'active')
      axios
        .post(url, { id, status })
        .then((response) => {
          if (response.status) {
            getTableData(apiGetUrl)
          }
        })
    }

    const deleteItem = (id) => {
      let deleteUrl = props.deleteLink.replace('__',id);
      axios
      .delete(deleteUrl)
      .then((response) => {
        getTableData(apiGetUrl)
      })
    }
    
    watch([currentPage, perPage, searchQuery], () => {
      getTableData(apiGetUrl)
    })

    const getTableData = (apiGetUrl) => { 
      axios
      .get(apiGetUrl, { 
              params: { 
                  search: searchQuery.value,
                  length: perPage.value,
                  // page: currentPage.value,
                  column: sortBy.value,
                  dir: isSortDirDesc.value? 'desc': 'asc',
              } 
          })
      .then((response) => {
          if(response.status == 200){
              const { data, meta } = response.data;
              items.value = data;
              paginateData.value = meta;
              total.value = meta.total
          }
      })
    }

    computed: {
      getTableData(`/api/get-${props.module}`)
    }
    return {
      updateStatus,
      perPage,
      currentPage,
      total,
      searchQuery,
      sortBy,
      isSortDirDesc,
      refListTable,
      items,
      paginateData,
      getTableData,
      deleteItem
    }
  }
}
</script>
