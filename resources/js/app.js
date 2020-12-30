require('./bootstrap');
require('pace');
require('perfect-scrollbar');
require('@coreui/coreui');

require('./src/datatables.js');
require('./src/datetimepicker.js');

import Vue from 'vue'

//Main pages
import LoansDatatable from './components/Loans/LoansDatatable.vue'

const app = new Vue({
    el: '#app',
    components: { 'loans-datatable': LoansDatatable }
});
