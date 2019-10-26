<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3>Product's info</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="createModal"><i class="fas fa-user-plus fa-fw"></i> Add Product</button>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                             <thead>
                                 <tr>
                                     <th>Product code</th>
                                     <th>Name</th>
                                     <th>Vendor</th>
                                     <th>Model</th>
                                     <th>Company</th>
                                     <th>Quantity</th>
                                     <th>Registered at</th>
                                     <th>Modify</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr v-for="elec in electronics.data" :key="elec.id">
                                     <td>{{elec.code}}</td>
                                     <td>{{elec.name}}</td>
                                     <td>Mukles</td>
                                     <td>{{elec.model}}</td>
                                     <td>{{elec.quality}}</td>
                                     <td>{{elec.quality}}</td>
                                     <td>{{elec.created_at}}</td>
                                     <td><a @click="editModal(elec)" href="#"><i class="fas fa-edit fa-fw fontbig blue"></i> </a><a @click="deleteElectronic(elec.id)" href="#"><i class="fas fa-trash-alt fa-fw fontbig red"></i></a> </td>
                                 </tr>
                             </tbody>
                             <!-- <div class="card-footer"></div> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal  -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 v-show="!editMode" class="modal-title" id="exampleModalLabel">Add product info</h5>
                     <h5 v-show="editMode" class="modal-title" id="exampleModalLabel">Edit product info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editMode ? editElectronic() : createProduct()">
                <div class="modal-body">
                    <div class="form-group">
                            <input v-model="form.code" type="number" name="code" placeholder="Enter product code"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('code') }">
                            <has-error :form="form" field="code"></has-error>
                    </div>
                    <div class="form-group">
                            <input v-model="form.name" type="text" name="name" placeholder="Enter product name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                     </div>
                     <!-- <div class="form-group">
                        <select v-for="vendor in vendors.data" :key="vendor.id" name="vendor" v-model="form.vendor" id="vendor" class="form-control" :class="{ 'is-invalid': form.errors.has('vendor') }">
                            <option value="">Select vendor</option>
                            <option value="{{vendor.name}}">{{vendor.name}}</option>
                        </select>
                        <has-error :form="form" field="vendor"></has-error>
                    </div> -->
                     <div class="form-group"> 
                            <input v-model="form.model" type="text" name="model" placeholder="Enter product model"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('model') }">
                            <has-error :form="form" field="model"></has-error>
                    </div>
                      <div class="form-group">
                            <input v-model="form.quality" type="text" name="quality" placeholder="Enter product quality"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('quality') }">
                            <has-error :form="form" field="quality"></has-error>
                    </div>
                     <div class="form-group">
                            <input v-model="form.company" type="text" name="company" placeholder="Enter product company name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('company') }">
                            <has-error :form="form" field="company"></has-error>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button v-show="!editMode" type="submit" class="btn btn-success">Add Product</button>
                    <button v-show="editMode" type="submit" class="btn btn-success">Update Customer</button>
                </div>
                </form>
                </div>
                
               
            </div>
            </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                electronics: {},
                editMode: false,
                vendors: {},
                totalProducts: null,
                form: new Form({
                    id: '',
                    code: '',
                    name: '',
                    vendor:'',
                    model: '',
                    quality: '',
                    company: ''
                })
            }
        },
        methods: {
            getVendors(){
                axios.get('api/vendor')
                     .then(({data}) => {
                           this.vendors = data
                     })
                     .catch((error) => {
                        console.log(error)
                     })
            },
            editElectronic(){
                 this.form.put('api/electronic/'+ this.form.id)
                     .then(() => {
                         swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                             $('#myModal').modal('hide');
                             Bus.$emit('rootbus')
                     })
                     .catch(() => {
                          swal.fire({
                                    type: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                    footer: '<a href>Why do I have this issue?</a>'
                                    })
                     })
            },
            createModal(){
                  this.editMode = false
                  this.form.reset();
                  $('#myModal').modal('show');
            },
            editModal(elec){
                this.editMode = true;
                this.form.reset();
                $('#myModal').modal('show')
                this.form.fill(elec)

            },
            deleteElectronic(id){
                this.form.delete('api/electronic/'+id)
                    .then(() => {
                        swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                        Bus.$emit('rootbus')
                    })
                    .catch(() => {
                           swal.fire({
                                    type: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                    footer: '<a href>Why do I have this issue?</a>'
                                    })
                    })
            },
            loadProduct(){
                axios.get('api/electronic')
                     .then(({data}) => {
                         this.electronics = data;
                         this.totalProducts = data.data.length
                         Bus.$emit('passProduct', this.totalProducts)
                     })
                     .catch(() => {
                         swal.fire({
                                    type: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                    footer: '<a href>Why do I have this issue?</a>'
                                    })
                     })
            },
            createProduct(){
                 this.form.post('api/electronic')
                     .then(() => {
                          Bus.$emit('rootbus')
                          $('#myModal').modal('hide')
                         swal.fire({
                                position: 'top-end',
                                type: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            })
                           
                     })
                     .catch(() => {
                          swal.fire({
                                    type: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                    footer: '<a href>Why do I have this issue?</a>'
                                    })
                    })
                     
            }
        },
        mounted() {
            this. getVendors()
            this.loadProduct()
            Bus.$on('rootbus', () => { this.loadProduct()})
            console.log('Component mounted.')
        }
    }
</script>