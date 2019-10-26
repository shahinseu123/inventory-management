<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>VIP Customer's info</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="createModel"><i class="fas fa-user-plus fa-fw"></i> Add Customer</button>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                             <thead>
                                 <tr>
                                     <th>Name</th>
                                     <th>Email</th>
                                     <th>Contact</th>
                                     <th>Company</th>
                                     <th>Registered at</th>
                                     <th>Modify</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr v-for="vipC in vipCustomers.data" :key="vipC.id">
                                     <td>{{vipC.name}}</td>
                                     <td>{{vipC.email}}</td>
                                     <td>{{vipC.contact}}</td>
                                     <td>{{vipC.company}}</td>
                                     <td>{{vipC.created_at|momentTime}}</td>
                                     <td><a @click="editModel(vipC)" href="#"><i class="fas fa-edit fa-fw fontbig blue"></i> </a><a @click="deleteVipCustomer(vipC.id)" href="#"><i class="fas fa-trash-alt fa-fw fontbig red"></i></a> </td>
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
                    <h5 v-show="!editMode" class="modal-title" id="exampleModalLabel">Add VIP Customer</h5>
                     <h5 v-show="editMode" class="modal-title" id="exampleModalLabel">Edit VIP Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editMode ? editVipCustomer() : createVipCustomer()">
                <div class="modal-body">
                    <div class="modal-body">
                    <div class="form-group">
                            <input v-model="form.name" type="text" name="name" placeholder="Enter name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                    </div>
                    <div class="form-group">
                            <input v-model="form.email" type="email" name="email" placeholder="Enter email"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                     </div>
                     <div class="form-group">
                            <input v-model="form.contact" type="number" name="contact" placeholder="Enter contact"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('contact') }">
                            <has-error :form="form" field="contact"></has-error>
                    </div>
                     <div class="form-group">
                            <input v-model="form.company" type="text" name="company" placeholder="Enter company name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('company') }">
                            <has-error :form="form" field="company"></has-error>
                    </div>
                </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button v-show="!editMode" type="submit" class="btn btn-success">Create customer</button>
                    <button v-show="editMode" type="submit" class="btn btn-success">Update customer</button>
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
               editMode: false,
               vipCustomers: {},
               form: new Form({
                   id: '',
                   name: '',
                   email: '',
                   contact: '',
                   company: ''
               })
            }
        },
        methods: {
            editVipCustomer(){
                this.form.put('api/vipcustomer/'+this.form.id)
                    .then(() => {
                        Bus.$emit('rootbus')
                         $('#myModal').modal('hide')

                        swal.fire(
                        'Updated!',
                        'Your file has been updated.',
                        'success'
                        )
                        
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
            createModel(){
                this.editMode = false;
                 $('#myModal').modal('show')

            },
            editModel(vipC){
               this.editMode = true
               this.form.reset()
                $('#myModal').modal('show')
                this.form.fill(vipC)
        },
            deleteVipCustomer(id){
              this.form.delete('api/vipcustomer/'+id)
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
            loadVipCustomer(){
                axios.get('api/vipcustomer')
                     .then(({data}) => {
                         this.vipCustomers = data
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
            createVipCustomer(){
               this.form.post('api/vipcustomer')
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
            this.loadVipCustomer()
            Bus.$on('rootbus', () => { this.loadVipCustomer()})
            console.log('Component mounted.')
        }
    }
</script>