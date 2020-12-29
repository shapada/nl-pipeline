require('./bootstrap');
require('pace');
require('perfect-scrollbar');
require('@coreui/coreui');

require('./src/datatables.js');
require('./src/datetimepicker.js');

import Vue from 'vue'

//Main pages
import DataTable from './components/Datatable/Datatable.vue'

const app = new Vue({
    el: '#app',
    components: { DataTable }
});
