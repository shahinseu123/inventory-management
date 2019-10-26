<template>
    <div>
      <form @submit.prevent="submitBills">
          <div class="card">
        
             <div class="card-body">
                 <div class="row">
                    <div class="col-md-6">

                   
                       <label for="">Vendor</label>
                           <div class="input-group mb-3">
                            <!-- <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">@</span>
                            </div> -->
                        <!-- <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"> -->
                            <select class="custom-select custom-select-md mb-3" v-model="form.vendor" aria-describedby="basic-addon1" :class="{ 'is-invalid': form.errors.has('vendor') }">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                </select>
                                  <has-error :form="form" field="vendor"></has-error>
                            </div>
                   </div>

                   <div class="col-md-6">
                       <label for="">Currency</label>
                      <div class="input-group mb-3">
                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div> -->
                        <select class="custom-select custom-select-md mb-3" v-model="form.currency" aria-describedby="basic-addon1" :class="{ 'is-invalid': form.errors.has('currency') }" >
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            </select>
                            <has-error :form="form" field="currency"></has-error>
                        <!-- <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"> -->
                        </div>
                   </div>
               </div>

               <div class="row">
                   <div class="col-md-6">
                       <label for="">Bill Date</label>
                      <div class="input-group mb-3">
                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div> -->
                        <input type="date" class="form-control" v-model="form.billdate" placeholder="" aria-label="date" aria-describedby="basic-addon1" :class="{ 'is-invalid': form.errors.has('billdate') }">
                        <has-error :form="form" field="billdate"></has-error>
                        </div>
                   </div>
                   
                   <div class="col-md-6">
                        <label for="">Due Date</label>
                      <div class="input-group mb-3">
                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div> -->
                        <input type="date" class="form-control" v-model="form.duedate" placeholder="" aria-label="date" aria-describedby="basic-addon1" :class="{ 'is-invalid': form.errors.has('duedate') }">
                        <has-error :form="form" field="duedate"></has-error>
                        </div>
                   </div>
               </div>

               <div class="row">
                   <div class="col-md-6">
                       <label for="">Bill Number</label>
                       <div class="input-group mb-3">
                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div> -->
                        <input type="text" class="form-control" v-model="form.billnumber" placeholder="" aria-label="" aria-describedby="basic-addon1" :class="{ 'is-invalid': form.errors.has('billnumber') }">
                        <has-error :form="form" field="billnumber"></has-error>
                        </div>
                   </div>

                   <div class="col-md-6">
                      <label for="">Order Number</label>
                      <div class="input-group mb-3">
                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div> -->
                        <input type="text" class="form-control" v-model="form.ordernumber" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" :class="{ 'is-invalid': form.errors.has('ordernumber') }">
                         <has-error :form="form" field="ordernumber"></has-error>
                        </div>
                   </div>
               </div>


            <label for="items" class="control-label">Items</label>
            <div class="table-responsive">
                <table class="table table-bordered" id="items">
                    <thead>
                        <tr style="background-color: #f9f9f9;">
                            <th class="text-center" width="5%">Actions</th>
                            <th class="text-left" width="40%">Name</th>
                            <th class="text-center" width="5%">Quantity</th>
                            <th class="text-right" width="10%">Price</th>
                            <th class="text-right" width="15%">Tax</th>
                            <th class="text-right" width="10%">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                         <tr id="item-row-0" v-for="(item, index) in rowData" :key="item.index">
                            <td class="text-center" style="vertical-align: middle;">
                                <button type="button" @click="removeRow(index)"  data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                            <td>
                                <input class="form-control typeahead"  placeholder="Enter Item Name" v-model="item.productname" name="productname" type="text" id="item-name-0">
                                <input name="" type="hidden" id="item-id-0">
                            </td>
                            <td>
                                <input class="form-control text-center"  name="quantity" type="text" v-model="item.quantity" id="item-quantity-0">
                            </td>
                            <td>
                                <input class="form-control text-right"  name="" v-model="item.price" type="text" id="item-price-0">
                            </td>
                            <td>
                                <select id="item-tax-0" v-model="item.tax" class="form-control select2 select2-hidden-accessible" name="" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" value="">- Select Tax -</option>
                                    <option value="0">Tax Exempt</option>
                                    <option value="5">Normal Tax</option>
                                    <option value="10">Sales Tax</option>
                               </select>
                                       <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 144px;">
                                        <span class="selection">
                                        <span class="select2-selection__rendered" id="select2-item-tax-0-container"> </span>
                                        <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span>
                                        <span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </td>
                            <td class="text-right" style="vertical-align: middle;">
                                <span id="item-total-0">{{item.linetotal}}</span>
                            </td>
                        </tr>
                         <tr id="addItem">
                            <td class="text-center"><button type="button" @click="addNewRow" data-toggle="tooltip" title="Add" class="btn btn-xs btn-primary" data-original-title="Add"><i class="fa fa-plus"></i></button></td>
                            <td class="text-right" colspan="5"></td>
                        </tr>
                        <tr>
                            <td class="text-right"  colspan="5"><strong>Subtotal</strong></td>
                            <td class="text-right"><span id="sub-total">{{form.subtotal}}</span></td>
                        </tr>
                        <tr>
                            <td class="text-right" colspan="5"><strong>Tax</strong></td>
                            <td class="text-right"><span id="tax-total">{{form.tax}}</span></td>
                        </tr>
                        <tr>
                            <td class="text-right" colspan="5"><strong>Total</strong></td>
                            <td class="text-right"><span id="grand-total">{{form.total}}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
                <label for="notes" class="control-label">Notes</label>
                <textarea class="form-control" v-model="form.details" placeholder="Enter Notes" rows="3" name="notes" cols="50" id="notes" :class="{ 'is-invalid': form.errors.has('details')}"></textarea> 
                <has-error :form="form" field="details"></has-error>
            </div>
              <div class="row container">
                  <div class="col-md-12 my-4">
                    <!-- <label for="attachment" class="control-label">Attachment</label>
                    <div class="fancy-file"><div class="fake-file">
                    <button type="button" class="btn btn-default" style="height: 33.3333px;">
                    <i class="icon-file glyphicon glyphicon-file"></i> Select File</button>
                    </div><input class="form-control" name="attachment" type="file" id="attachment" style="width: 325.333px;">
                    </div> -->
                     <button type="submit" class="btn btn-success mt-1">Save</button>
                  </div>
                </div>
           </div>
       </form>
    </div>
</template>
<script>
export default {
    data() {
            return {
                vendors: {},
                rowData:[],
                form: new Form({
                    id: '',
                    vendor: '',
                    currency: '',
                    billdate: '',
                    duedate: '',
                    billnumber: '',
                    ordernumber: '',
                    subtotal: '',
                    tax: '',
                    details: '',
                    total: '', 
                })
            }
        },
    methods: {
        addNewRow(){
            this.rowData.push({
                id: '',
                productname: '',
                quantity: '',
                price: '',
                tax: '',
                linetotal: '',
            })
        },
         calculateSubtotal(){
                var sub_total
                sub_total = this.rowData.reduce(function(sum, product){
                    var linetotal = parseFloat(product.quantity*product.price)
                       if(!isNaN(linetotal)){
                        //    console.log("line total: "+linetotal)
                          product.linetotal = linetotal.toFixed(2)
                          return sum + linetotal
                       }
                       return linetotal 
                }, 0)
                this.form.subtotal = sub_total.toFixed(2)
            },
         calculateTotal(){
                var total, subtotal, taxall, taxx
               
                    //  ................................................................................................
                subtotal = this.rowData.reduce(function(sum, product){
                    var linetotal = parseFloat(product.quantity*product.price + ((product.tax*product.price*product.quantity)/100))
                       if(!isNaN(linetotal)){
                        //    console.log("line total: "+linetotal)
                        //    product.linetotal = linetotal.toFixed(2)
                          return sum + linetotal
                       }
                       return linetotal 
                }, 0)
                total = subtotal.toFixed(2)
                // this.form.tax = tax.toFixed(2)
                this.form.total = total
                // ---------------------------------------------------------------------------------------------------------------
            },
         calculateTax(){
                var allTax
                allTax = this.rowData.reduce(function(sum, product){
                    var tax = parseFloat((product.tax*product.price*product.quantity)/100)
                       if(!isNaN(tax)){
                        //    console.log("line total: "+linetotal)
                        //    product.linetotal = linetotal.toFixed(2)
                          return sum + tax
                       }
                       return tax 
                }, 0)
                this.form.tax = allTax.toFixed(2)
                // ---------------------------------------------------------------------------------------------------------------
            },
        removeRow(index){
           this.rowData.splice(index, 1)
        },
        getVendor(){
            axios.get('api/vendor')
                 .then(({data}) => {
                     this.vendors = data
                 })
                 .catch((error) => {
                     console.log(error)
                 })
        },
        submitBills(){
            this.rowData.forEach((item) => { 
                 axios.post('api/billproduct', item)
                .then(() => {
                    console.log('success')
                })
                .catch((error) => { console.log(error)}) 
                })
            this.form.post('api/bill')
                .then(() => {
                     swal.fire({
                                position: 'top-end',
                                type: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            })
                })
                .catch((error) => { console.log(error)})
            this.$router.push("/bills")
            console.log("invoice submitted")
        }
    },
    mounted(){
        this.getVendor()
        console.log('mounted')
    },
    updated(){
        this.calculateSubtotal()
        this.calculateTax()
        this.calculateTotal()

    }
}
</script>
<style scoped>
    #basic-addon1{
        max-height: 38px
    }
</style>