/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { store } from './store';

import VueRouter from 'vue-router'

import Dashboard from './components/Dashboard.vue'
import User from './components/User.vue'
import RootUser from './components/RootUser.vue'
import Reseller from './components/Reseller.vue'
import VipCustomer from './components/VipCustomer.vue'
import Electronics from './components/Electronics.vue'
import Networking from './components/Networking.vue'
import HardWire from './components/HardWire.vue'
import Others from './components/Others.vue'
import Accounts from './components/Accounts.vue'
import Catagory from './components/Catagory.vue'
import Revenue from './components/Revenue.vue'
import Invoice from './components/Invoice.vue'
import AddInvoice from './components/AddInvoice.vue'
import Vendor from './components/Vendor.vue'
import ShowInvoice from './components/ShowInvoice.vue'
import Bills from './components/Bills.vue'
import Payments from './components/Payments.vue'
import Addbills from './components/Addbills.vue'
import Addpayments from './components/Addpayments.vue'
import Category from './components/Catagory.vue'
import AddRevenue from './components/AddRevenue.vue'

import moment from 'moment'
import VueProgressBar from 'vue-progressbar'

Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '2px'
})

// ES6 Modules or TypeScript
import Swal from 'sweetalert2'

// CommonJS
window.Bus = new Vue()

window.swal = Swal;

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
window.toast = toast

import { Form, HasError, AlertError } from 'vform'
window.Form = Form

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.filter('upText', (value)=>{
  return value.charAt(0).toUpperCase() + value.slice(1)
})
Vue.filter('momentTime', (time)=>{
  return moment(time).format("MMM Do YY")
})

Vue.use(VueRouter)


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('User', User);
Vue.component('Dashboard', Dashboard);
Vue.component('Accounts', Accounts);
Vue.component('Catatory', Catagory);
Vue.component('Revenue', Revenue);
Vue.component('Invoice', Invoice);
Vue.component('AddInvoice', AddInvoice);
Vue.component('Vendor', Vendor);
Vue.component('ShowInvoice', ShowInvoice);
Vue.component('Bills', Bills);
Vue.component('Payments', Payments);
Vue.component('Addbills', Addbills);
Vue.component('Addpayments', Addpayments);
Vue.component('Category', Catagory);
Vue.component('AddRevenue', AddRevenue);

const routes = [
    { path: '/dashboard', component: Dashboard },
    { path: '/user', component: User },
    { path: '/rootuser', component: RootUser },
    { path: '/reseller', component: Reseller },
    { path: '/vipcustomer', component: VipCustomer },
    { path: '/electronics', component: Electronics },
    { path: '/networking', component: Networking },
    { path: '/hardwire', component: HardWire },
    { path: '/others', component: Others },
    { path: '/accounts', component: Accounts },
    { path: '/catagory', component: Catagory },
    { path: '/revenue', component: Revenue },
    { path: '/invoice', component: Invoice },
    { path: '/showinvoice/:invoice_id', component: ShowInvoice },
    // { path: '/showinvoice', component: ShowInvoice },
    { path: '/addinvoice', component: AddInvoice},
    { path: '/vendor', component: Vendor},
    { path: '/bills', component: Bills},
    { path: '/payments', component: Payments},
    { path: '/addbills', component: Addbills},
    { path: '/addpayments', component: Addpayments},
    { path: '/category', component: Catagory},
    { path: '/addrevenue', component: AddRevenue},
  ]

  const router = new VueRouter({
    mode:'history',
    routes // short for `routes: routes`
  })



const app = new Vue({
    store: store,
    el: '#app',
    router
});
