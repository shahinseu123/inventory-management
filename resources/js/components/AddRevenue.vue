<template>
         <div class="card">
             <form @submit.prevent="createRevenue">
                    <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="paid_at" class="control-label">Date</label>
                            <div class="input-group">
                                <!-- <div class="input-group-addon mt-1"><i class="fa fa-calendar pink fa-fw"></i></div> -->
                                <input type="date" v-model="form.date" class="form-control" placeholder="Enter Date" id="paid_at" required="required" :class="{ 'is-invalid': form.errors.has('date')}">
                                <has-error :form="form" field="date"></has-error>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <label for="amount" class="control-label">Amount</label>
                            <div class="input-group">
                                <!-- <div class="input-group-addon"><i class="fa fa-money"></i></div> -->
                                <input class="form-control" v-model="form.amount" placeholder="Enter Amount" required="required" autofocus="autofocus" name="amount" type="text" id="amount" :class="{ 'is-invalid': form.errors.has('amount')}">
                                <has-error :form="form" field="amount"></has-error>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                            <label for="description" class="control-label">Description</label>
                            <textarea class="form-control" v-model="form.description" placeholder="Enter Description" rows="3" name="description" cols="50" id="description" :class="{ 'is-invalid': form.errors.has('description')}"></textarea>
                            <has-error :form="form" field="description"></has-error>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="catagory" class="control-label">Catagory</label>
                        <div class="input-group mb-3">
                            <!-- <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                            </div> -->
                            <select name="type" v-model="form.catagory" id="category" class="form-control" :class="{ 'is-invalid': form.errors.has('catagory')}">
                            <option selected value="">--Select category--</option>
                            <option value="doller">Doller</option>
                             <option value="euro">Euro</option> -->
                             <option value="taka">Taka</option> 
                        </select>
                        <has-error :form="form" field="catagory"></has-error>
                            </div>
                    </div>
                    <div class="col-md-6">
                            <label for="customer" class="control-label">Customer</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group"></span>
                            </div>
                                <!-- <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div> -->
                            <select name="type" v-model="form.customer" id="customer" class="form-control" :class="{ 'is-invalid': form.errors.has('customer')}">
                                <option selected value="">--Select Customer--</option>
                                <option value="doller">Doller</option>
                                <option value="euro">Euro</option>
                                <option value="taka">Taka</option>
                           </select>
                            <has-error :form="form" field="customer"></has-error>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="paymentMethod" class="control-label">Payment</label>
                        <div class="input-group mb-3">
                            <!-- <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                            </div> -->
                            <input type="text" v-model="form.payment" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Enter payment" :class="{ 'is-invalid': form.errors.has('payment')}">
                             <has-error :form="form" field="payment"></has-error>
                            </div>
                    </div>
                    <div class="col-md-6">
                            <label for="reference" class="control-label">Reference</label>
                            <div class="input-group">
                                <!-- <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div> -->
                            <input type="text" v-model="form.reference" class="form-control" placeholder="Referance" aria-label="reference" aria-describedby="basic-addon1" :class="{ 'is-invalid': form.errors.has('reference')}">
                            <has-error :form="form" field="reference"></has-error>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-12">         
                            <!-- <div class="fancy-file"><div class="fake-file">
                            <button type="button" 
                            class="btn btn-default"><i class="icon-file glyphicon glyphicon-file"></i> Select File
                            </button></div><input class="form-control" name="attachment" type="file" id="attachment" style="width: 325.333px;">
                            </div> -->
                            <button type="submit" class="btn btn-success mt-4" >Submit</button>
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
          categorys: {},
          customers: {},
          form: new Form({
            date: '',
            amount: '',
            description: '',
            catagory: '',
            customer: '',
            payment: '',
            reference: '',
        })
       }
   },
   methods: {
      getCatagory(){
          axios.get('api/category')
               .then(({data}) => {
                    this.categorys = data
               })
      },
      getCustomer(){
          axios.get('api/rootcustomer')
               .then(({data}) => {
                    this.customers = data
               })
      },
      createRevenue(){
          this.form.post('api/revenue')
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
          this.$router.push("/revenue")
      }
   },
   mounted(){
        this.getCatagory()
        this.getCustomer()
   },
   updated(){

   }
}
</script>