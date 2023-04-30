<template>
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-3">
          <label>Show</label>
          <select v-model="perPage">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>
          <label>entries</label>
        </div>
        <div class="col-md-4">
          <input type="text" class="form-control" placeholder="Search Here..." />
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
                <button type="button" @click="updateStatus(item.id, item.status)"
                  class="btn  btn-sm" v-bind:class="item.status == 'active' ? 'btn-success' : 'btn-warning' " >{{ item.status }}</button>
              </div>

              <div v-if="field.key === 'action'">
                <a :href="updateLink.replace('__', item.id)" class="btn btn-primary btn-sm action-icon me-2"><i
                    class="mdi mdi-square-edit-outline"></i></a>

                <button type="button" @click="deleteItem(item.id)" class="btn btn-danger btn-sm action-icon"><i
                    class="mdi mdi-delete"></i></button>
              </div>
              <div v-if="field.key !== 'action' && field.key !== 'status'">{{ item[field.key] }}</div>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="row">
        
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
    module: {
      type: String,
    }
  },

  setup(props) {
    let url = `/backend/${props.module}/status`;
    const updateStatus = (id, status) => {
      status = (status == 'active' ? 'deactive' : 'active')
      axios
        .post(url, { id, status })
        .then((response) => {
          if (response.status) {
            console.log(response)
          }
        })
    }

    return {
      updateStatus
    }
  }
}
</script>
