<template>
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <h3>Invoice</h3>
                  <div class="card-tools">
                      <router-link class="btn btn-success" to="/addinvoice">Add Invoice</router-link>
                  </div>
              </div>
                  <div class="card-body">
                      <table class="table table-hover table-bordered">
                           <thead>
                               <tr>
                                   <th>Number</th>
                                   <th>Customer</th>
                                   <th>Amount</th>
                                   <th>Invoice Date</th>
                                   <th>Due Date</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr v-for="invo in invoices" :key="invo.id">
                                   <td>{{invo.invoicenumber}}</td>
                                   <td>{{invo.customer}}</td>
                                   <td>{{invo.total}}</td>
                                   <td>{{invo.invoicedate}}</td>
                                   <td>{{invo.duedate}}</td>
                                   
                                   <td>
                                      <a href="#"><i class="fas fa-edit fa-fw fontbig blue"></i> </a>
                                      <a @click="deleteInvoice(invo.id)" href="#"><i class="fas fa-trash-alt fa-fw fontbig red"></i> </a> 
                                      <router-link  :to="`/showinvoice/${invo.id}`"><i class="fas fa-eye fa-fw fonnpm run watchtbig yellow"></i></router-link> 
                                      <!-- <router-link  to="/showinvoice"><i @click="send(invo.id)" class="fas fa-eye fa-fw fonnpm run watchtbig yellow"></i></router-link>  -->
                                   </td>      
                               </tr>
                           </tbody>
                      </table>
                  </div>
            
          </div>
      </div>
  </div>

</template>
<script>
export default {
    data(){
        return {
            invoices: {}
        }
    },
    methods: {
        deleteInvoice(id){
            axios.delete('api/invoice/'+id)
                 .then(() => {
                     console.log('success delete')
                 })
                 .catch((error) => { console.log(error)})
        }, 
        send(id){
            // console.log('id is here: '+id)
            // console.log('clickes')
            Bus.$emit('buswithid', id)
        },
        loadInvoice(){
            axios.get('api/invoice')
             .then(({data}) => {
                 this.invoices = data
             })
             .catch((error) => {
                 console.log(error)
             })
       }
    },
    mounted(){
       this.loadInvoice()
    }
}
</script>