import { createApp } from 'vue'
import CustomTable from '../components/CustomTable.vue'
import axios from 'axios'
import { ref , watch , computed } from 'vue'
// import router from '../router/index.js'

const app = createApp({
    setup(){
        const module = "category"
        const refListTable = ref(null)
        let items = ref([]);
        const perPage = ref(10)
        const total = ref(0)
        const currentPage = ref(1)
        const searchQuery = ref('')
        const sortBy = ref('id')
        const isSortDirDesc = ref(true)


        const tableColumns = [
            { key: 'id', label: 'Id',},
            { key: 'name', label: 'Name', sortable: true },
            { key: 'parent_id', label: 'Parent Category', sortable: true },
            { key: 'section_id', label: 'Section', sortable: true },
            { key: 'status',  sortable: true },
            { key: 'action' },
        ]

        const dataMeta = computed(() => {
            const localItemsCount = refListTable.value ? refListTable.value.localItems.length : 0
            return {
                from: perPage.value * (currentPage.value - 1) + (localItemsCount ? 1 : 0),
                to: perPage.value * (currentPage.value - 1) + localItemsCount,
                of: total.value,
            }
        })

        const refreshData = () => {
            console.log( "heleo2")

            refListTable.value.refresh()
        }

        axios
            .get('/api/get-category', { 
                params: { 
                    search: searchQuery.value,
                    length: perPage.value,
                    page: currentPage.value,
                    column: sortBy.value,
                    dir: isSortDirDesc.value? 'desc': 'asc',
                } 
            })
            .then((response) => {
                if(response.status == 200){
                    const { data, meta } = response.data;
                    items.value = data;
                     total.value = meta.total
                }
            })
            
            watch([currentPage, perPage, searchQuery], () => {
            console.log( "heleo1")

                refreshData()
            })

        return{
            items,
            tableColumns,
            perPage,
            currentPage,
            total,
            dataMeta,
            searchQuery,
            sortBy,
            isSortDirDesc,
            refListTable,
            refreshData,
            module
        }
    }
})

app.component('custom-table', CustomTable)

app.mount('#app')
// app.use(router)