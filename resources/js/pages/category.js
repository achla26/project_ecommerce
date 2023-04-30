import { createApp } from 'vue'
import CustomTable from '../components/CustomTable.vue'
import axios from 'axios'
import { ref , watch , computed } from 'vue'
// import router from '../router/index.js'

const app = createApp({
    setup(){
        const module = "category"

        const tableColumns = [
            { key: 'id', label: 'Id',},
            { key: 'name', label: 'Name', sortable: true },
            { key: 'parent_category', label: 'Parent Category', sortable: true },
            { key: 'section', label: 'Section', sortable: true },
            { key: 'status',  sortable: true },
            { key: 'action' },
        ] 

        return{
            tableColumns,
            module
        }
    }
})

app.component('custom-table', CustomTable)

app.mount('#app')
// app.use(router)