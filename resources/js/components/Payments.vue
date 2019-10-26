<template>
    <div class="row mt-4">
        <div class="col-md-12">
           <div class="card">
               <div class="card-header">
                   <h3>Payment's</h3>
                   <div class="card-tools">
                       <router-link class="btn btn-success" to="/addpayments">Add Payment</router-link>
                   </div>
               </div>
               <div class="card-body">
                    <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Vendor</th>
                        <th>Category</th>
                        <th>Account</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="pay in payments.data" :key="pay.id">
                        <th>{{pay.date}}</th>
                        <th>{{pay.amount}}</th>
                        <th>{{pay.vendor}}</th>
                        <th>{{pay.category}}</th>
                        <th>{{pay.account}}</th>
                        
                        <th>
                            <a href="">Delete</a>
                        </th>
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
            payments: {}
        }
    },
    methods: {
       
        loadPayments(){
            axios.get('api/payment')
                 .then(({data}) => {
                     this.payments = data
                 })
                 .catch((error) => {
                     console.log(error)
                 })
        }
    },
    mounted(){
        this.loadPayments()
       
    }
}
</script>