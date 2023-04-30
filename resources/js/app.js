// require('./bootstrap')

import { createApp } from 'vue'
import CustomTable from './components/CustomTable.vue'

const app = createApp({})

app.component('custom-table', CustomTable)

app.mount('#app')