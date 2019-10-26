<template>
 <div>
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                    <h3>Revenue</h3>
                    <div class="card-tools">
                         <router-link class="btn btn-success" to="/addrevenue">Add Revenue</router-link>
                    </div>
                 </div>
                 <div class="card-body">
                     <table class="table table-hover table-bordered">
                         <thead>
                             <tr>
                                 <th>Date</th>
                                 <th>Amount</th>
                                 <th>Customer</th>
                                 <th>Category</th>
                                 <th>Description</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr v-for="rev in revenues.data" :key="rev.id">
                                 <td>{{rev.date}}</td>
                                 <td>{{rev.amount}}</td>
                                 <td>{{rev.customer}}</td>
                                 <td>{{rev.catagory}}</td>
                                 <td>{{rev.description}}</td>
                                 <td>
                                     <a @click.prevent="deleteRevenue(rev.id)" href="">Delete</a>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
   
    


</div>
</template>
<script>
export default {
    data(){
        return {
            revenues: {}
        }
    },
    methods: {
          deleteRevenue(id){
              axios.delete('api/revenue/'+id)
                   .then(() => {
                        swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                        Bus.$emit('rootbus')
                   })
                   .catch((error) => console.log(error))
          },
          loadRevenue(){
              axios.get('api/revenue')
                   .then(({data}) => {
                       this.revenues = data
                   })
                   .catch((error) => { console.log(error)})
          }
    },
    mounted(){
        this.loadRevenue()
        Bus.$on('rootbus', () => { this.loadRevenue() })
    }
}
</script>