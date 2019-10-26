<template>
    <div>
      <form @submit.prevent="submitInvoice">
          <div class="card">
        
             <div class="card-body">
                 <div class="row">
                    <div class="col-md-6">

                        <label for="">Customer</label>
                        <div class="form-group">
                        <select name="customer" v-model="form.customer" id="customer" class="form-control" :class="{ 'is-invalid': form.errors.has('customer') }">
                            <option value="">Select customer</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                            <option value="author">Author</option>
                        </select>
                        <has-error :form="form" field="customer"></has-error>
                    </div>
                   </div>

                   <div class="col-md-6">
                       <label for="">Currency</label> 
                        <div class="form-group">
                        <select name="type" v-model="form.currency" id="currency" class="form-control" :class="{ 'is-invalid': form.errors.has('currency') }">
                            <option value="">Select currency</option>
                            <option value="doller">Doller</option>
                            <option value="euro">Euro</option>
                            <option value="taka">Taka</option>
                        </select>
                        <has-error :form="form" field="currency"></has-error>
                    </div>
                   </div>
               </div>

               <div class="row">
                   <div class="col-md-6">
                       <label for="">Invoice Date</label>
                       <div class="form-group"> 
                            <input v-model="form.invoicedate" type="date" name="invoicedate" placeholder="Enter Invoice date"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('invoicedate') }">
                            <has-error :form="form" field="invoicedate"></has-error>
                    </div>
                   </div>

                   
                   <div class="col-md-6">
                        <label for="">Due Date</label>
                       <div class="form-group"> 
                            <input v-model="form.duedate" type="date" name="invoicedate" placeholder="Enter Due date"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('duedate') }">
                            <has-error :form="form" field="duedate"></has-error>
                    </div>
                   </div>
               </div>

               <div class="row">
                   <div class="col-md-6">
                       <label for="">Invoice Number</label>
                      <div class="form-group"> 
                            <input v-model="form.invoicenumber" type="number" name="invoicenumber" placeholder="Enter Invoice number"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('invoicenumber') }">
                            <has-error :form="form" field="invoicenumber"></has-error>
                    </div>
                   </div>

                   <div class="col-md-6">
                      <label for="">Order Number</label>
                       <div class="form-group"> 
                            <input v-model="form.ordernumber" type="number" name="ordernumber" placeholder="Enter order number"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('ordernumber') }">
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
                                <button @click="removeElement(index)" type="button"  data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                           
                            <td>
                                <input class="form-control typeahead" v-model="item.productname"  placeholder="Enter Item Name" type="text" id="item-name-0">
                                <!-- <input name="productName" type="hidden" id="item-id-0"> -->
                                 <!-- <has-error :form="form" field="productName"></has-error> -->
                            </td>
                            <td>
                                <input  class="form-control text-center" v-model="item.quantity" name="quantity" type="text" id="item-quantity-0">
                                 <!-- <has-error :form="form" field="quantity"></has-error> -->
                            </td>
                            <td>
                                <input  class="form-control text-right" v-model="item.price" name="price" type="text" id="item-price-0">
                          
                            </td>
                            <!-- hidden  -->
                               
                                <input v-model="$data[latestInvoice.id ? item.invoice_id = latestInvoice.id : '0']" class="form-control text-right"  name="price" type="hidden" id="item-price-0">
                          
                            

                            <td>
                                <select id="item-tax-0" class="form-control select2 select2-hidden-accessible" v-model="item.tax" name="tax" tabindex="-1" aria-hidden="true">
                                    <option selected value="">- Select Tax -</option>
                                    <option value="0">Tax Exempt</option>
                                    <option value="5">Normal Tax</option>
                                    <option value="10">Sales Tax</option>
                              </select>
                               <!-- <has-error :form="form" field="tax"></has-error> -->
                                    <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 144px;">
                                    <span class="selection"><span class="select2-selection__rendered" id="select2-item-tax-0-container"></span><span class="select2-selection__arrow" 
                                         role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span>
                            </td>
                            <td class="text-right" style="vertical-align: middle;">
                        <span id="item-total-0">{{item.linetotal}}</span>
                            </td>
                             
                        </tr>
                         <tr id="addItem">
                            <td class="text-center"><button @click="addItem" type="button"  data-toggle="tooltip" title="Add" class="btn btn-xs btn-primary" data-original-title="Add"><i class="fa fa-plus"></i></button></td>
                            <td class="text-right" colspan="5"></td>
                        </tr>
                        <tr>
                            <td class="text-right" colspan="5"><strong>Subtotal</strong></td>
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
                <textarea class="form-control" v-model="form.details" placeholder="Enter Notes" rows="3" name="notes" cols="50" id="notes"  :class="{ 'is-invalid': form.errors.has('details') }"></textarea> 
                 <has-error :form="form" field="details"></has-error>
            </div>
              <div class="row container">
                  <div class="col-md-12 my-4">
                    <label for="attachment" class="control-label">Attachment</label>
                    <div class="fancy-file"><div class="fake-file">
                    <button type="button" class="btn btn-default" style="height: 33.3333px;">
                    <i class="icon-file glyphicon glyphicon-file"></i> Select File</button>
                    </div><input class="form-control" name="attachment" type="file" id="attachment" style="width: 325.333px;">
                    </div>
                     <button type="submit" class="btn btn-success mt-4">Save</button>
                  </div>
                </div>
           </div>
       </form>
       <!-- <button class="btn btn-danger" @click="calculateTotal()">click</button> -->
    </div>
</template>
<script>
export default {
    data() {
            return {
                 latestInvoice: {},
                 rowData: [],
               
                 form: new Form({
                    id: '',
                    customer: '',
                    currency: '',
                    invoicedate: '',
                    duedate: '',
                    invoicenumber: '',
                    ordernumber: '',
                    subtotal: '',
                    tax: '',
                    details: '',
                    total: '', 
                   
                })
            }
        },
    
    methods: {
            calculateTotal(){
                var total, subtotal, taxall, taxx
               
                    //  ................................................................................................
                subtotal = this.rowData.reduce(function(sum, product){
                    var linetotal = parseFloat(product.quantity*product.price + ((product.tax*product.price*product.quantity)/100))
                       if(!isNaN(linetotal)){
                        //    console.log("line total: "+linetotal)
                           product.linetotal = linetotal.toFixed(2)
                          return sum + linetotal
                       }
                       return linetotal 
                }, 0)
                total = subtotal.toFixed(2)
                // this.form.tax = tax.toFixed(2)
                this.form.total = total
                // ---------------------------------------------------------------------------------------------------------------
            },
            calculateSubtotal(){
                var sub_total
                sub_total = this.rowData.reduce(function(sum, product){
                    var linetotal = parseFloat(product.quantity*product.price)
                       if(!isNaN(linetotal)){
                        //    console.log("line total: "+linetotal)
                        //    product.linetotal = linetotal.toFixed(2)
                          return sum + linetotal
                       }
                       return linetotal 
                }, 0)
                this.form.subtotal = sub_total.toFixed(2)
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
            addItem(){
                // var invoiceid = this.latestInvoice.id
                this.rowData.push({
                    invoice_id: '' ,
                    productname : '',
                    quantity :'',
                    price : '',
                    tax : '',
                    linetotal : ''
                })},
            removeElement: function (index) {
            this.rowData.splice(index, 1);
        },
        submitInvoice(){
            // let invoiceProduct = { data: this.rowData}
            // this.rowData.forEach((item) => { 
            //      axios.post('api/invoice-product', item)
            //     .then(() => {
            //         console.log('success')
            //     })
            //     .catch((error) => { console.log(error)}) 
            //     })
           
            this.form.post('api/invoice')
                 .then(() => {
                       swal.fire({
                                position: 'top-end',
                                type: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            })
                    //  this.$router.push("/invoice")
                 })
                 .catch((error) => {
                     console.log(error)
                 })
            setTimeout(() =>  {this.getLatestInvoice()}, 1000)
            // setTimeout(() =>  {this.getLatestInvoice()}, 3000);

            setTimeout(() => {
                 this.rowData.forEach((item) => { 
                 axios.post('api/invoice-product', item)
                    .then(() => {
                        console.log('success')
                        this.$router.push("/invoice")
                    })
                    .catch((error) => { console.log(error)}) 
                })
            }, 2000); 
            // this.rowData.forEach((item) => { 
            //      axios.post('api/invoice-product', item)
            //         .then(() => {
            //             console.log('success')
            //             this.$router.push("/invoice")
            //         })
            //         .catch((error) => { console.log(error)}) 
            //     })
        },
        getLatestInvoice(){
            axios.get('api/invoice-product')
                 .then(({data}) => {
                      this.latestInvoice = data
                 })
        }

    },
    
    mounted(){
        // this.getLatestInvoice()
        // Bus.$on('hello-bus', () => this.getLatestInvoice())
        console.log('mounted')
    },
    updated(){
        this.calculateTotal()
        // this.getLatestInvoice()
        this.calculateSubtotal()
        this.calculateTax()
        
        console.log('Updated hook')
    },
    // created(){
    //     console.log('created hook')
    // },
    // destroyed(){
    //     console.log('destroyed hook')
    // }
}

</script>
<style scoped>
    #basic-addon1{
        max-height: 38px
    }
</style>