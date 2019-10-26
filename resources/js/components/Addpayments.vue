<template>
    <div class="card">
    <form @submit.prevent="createPayments">
      <div class="card-body">
         <div class="row">
                   <div class="col-md-6">
                       <label for=""> Date</label>
                      <div class="input-group mb-3">
                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div> -->
                        <input type="date" v-model="form.date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" :class="{ 'is-invalid': form.errors.has('date')}">
                         <has-error :form="form" field="date"></has-error>
                        </div>
                   </div>
                   
                   <div class="col-md-6">
                        <label for="">Amount</label>
                      <div class="input-group mb-3">
                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div> -->
                        <input type="text" v-model="form.amount" class="form-control" placeholder="Amount" aria-label="Username" aria-describedby="basic-addon1" :class="{ 'is-invalid': form.errors.has('amount')}">
                         <has-error :form="form" field="amount"></has-error>
                        </div>
                   </div>
             </div>

             <div class="row">
                   <div class="col-md-6">
                       <label for="">Account</label>
                      <div class="input-group mb-3">
                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div> -->
                        <input type="text" v-model="form.account" class="form-control" placeholder="Account" aria-label="Username" aria-describedby="basic-addon1" :class="{ 'is-invalid': form.errors.has('account')}">
                         <has-error :form="form" field="account"></has-error>
                        </div>
                   </div>
                   
                   <div class="col-md-6">
                        <label for="">Currency</label>
                      <div class="input-group mb-3">
                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div> -->
                        <select v-model="form.currency" class="custom-select custom-select-md mb-3" aria-describedby="basic-addon1" :class="{ 'is-invalid': form.errors.has('currency')}">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                             <has-error :form="form" field="currency"></has-error>
                        </div>
                   </div>
             </div>
             <div class="row">
                <div class="col-md-12">
                     <label for="">Description</label>
                     <textarea v-model="form.description" placeholder="Description....." class="form-control mb-3" name="" id="" cols="30" rows="3" :class="{ 'is-invalid': form.errors.has('description')}"></textarea>
                     <has-error :form="form" field="description"></has-error>
                </div>
             </div>
             <div class="row">
                 <div class="col-md-6">
                      <label for="">Vendor</label>
                           <div class="input-group mb-3">
                            <!-- <div class="input-group-prepend">
                                <span class="input-group-text mb-3" id="basic-addon1">@</span>
                            </div> -->
                        <!-- <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"> -->
                            <select v-model="form.vendor" class="custom-select custom-select-md mb-3" aria-describedby="basic-addon1" :class="{ 'is-invalid': form.errors.has('vendor')}">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                             <has-error :form="form" field="vendor"></has-error>
                       </div>
                   </div>

                    <div class="col-md-6">
                       <label for="">Category</label>
                      <div class="input-group mb-3">
                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text mb-3" id="basic-addon1">@</span>
                        </div> -->
                        <select v-model="form.category" class="custom-select custom-select-md mb-3" aria-describedby="basic-addon1" :class="{ 'is-invalid': form.errors.has('category')}">
                            <option selected>--Select category--</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                         </select>
                          <has-error :form="form" field="category"></has-error>
                        <!-- <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"> -->
                        </div>
                   </div>

                 </div>

                  <div class="row">
                   <div class="col-md-6">
                       <label for="">Payment Method</label>
                      <div class="input-group mb-3">
                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div> -->
                        <input v-model="form.paymentmethod" type="text" class="form-control" placeholder="Payment Method" aria-label="Username" aria-describedby="basic-addon1" :class="{ 'is-invalid': form.errors.has('paymentmethod')}" >
                        <has-error :form="form" field="paymentmethod"></has-error>
                        </div>
                   </div>
                   
                   <div class="col-md-6">
                        <label for="">Refarance</label>
                      <div class="input-group mb-2">
                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div> -->
                        <input v-model="form.refarence" type="text" class="form-control" placeholder="Refarance" aria-label="Username" aria-describedby="basic-addon1" :class="{ 'is-invalid': form.errors.has('refarence')}" >
                         <has-error :form="form" field="refarence"></has-error>
                        </div>
                   </div>
             </div>
              <div class="row">
                  <div class="col-md-12">
                    <!-- <label for="attachment" class="control-label">Attachment</label>
                    <div class="fancy-file"><div class="fake-file">
                    <button type="button" class="btn btn-default" style="height: 33.3333px;">
                    <i class="icon-file glyphicon glyphicon-file"></i> Select File</button>
                    </div><input class="form-control" name="attachment" type="file" id="attachment" style="width: 325.333px;">
                    </div> -->
                     <button type="submit" class="btn btn-success mt-4">Save</button>
                  </div>
                </div>
             </div>
          </form>
         </div>
    
</template>
<script>
export default {
    data(){
        return {
            vendors: {},
            categorys: {},
            form: new Form({
                id: '',
                date: '',
                amount: '',
                account: '',
                currency: '',
                description: '', 
                vendor: '',
                category: '',
                paymentmethod: '',
                refarence: ''
            })
        }
    },
    methods: {
        createPayments(){
            this.form.post('api/payment')
                .then(() => {
                     swal.fire({
                                position: 'top-end',
                                type: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            })
                })
                .catch((error) => {
                     console.log(error)
                })
                this.$router.push("/payments")
        },
    
     loadVendor(){
            axios.get('api/vendor')
                 .then(({data}) => {
                     this.vendors = data
                 })
        },
     loadCategory(){
            axios.get('api/category')
                 .then(({data}) => {
                     this.categorys = data
                 })
        },
    },
    mounted(){
      this.loadVendor()
      this.loadCategory()
    }
}
</script>