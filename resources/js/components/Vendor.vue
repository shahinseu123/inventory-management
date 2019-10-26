                                      
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Vendor's info</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="createUserModal"><i class="fas fa-user-plus fa-fw"></i> Add Vendor</button>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                             <thead>
                                 <tr>
                                     <th>Name</th>
                                     <th>Email</th>
                                     <th>Phone</th>
                                     <th>Registered_at</th>
                                     <th>Modify</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr v-for="vendor in vendors.data" :key="vendor.id">
                                     <td>{{vendor.name}} </td>
                                      <td>{{vendor.email}}</td>
                                       <td>{{vendor.phone}}</td>
                                        <td>{{vendor.created_at}}</td>
                                         <td><a @click="editVendor(vendor)" href="#"><i class="fas fa-edit fa-fw fontbig blue"></i> </a><a href="#"><i @click="deleteVendor(vendor.id)" class="fas fa-trash-alt fa-fw fontbig red"></i></a> </td>
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
                    <h5 v-show="!editMode" class="modal-title" id="exampleModalLabel">Vendor's info</h5>
                    <h5 v-show="editMode" class="modal-title" id="exampleModalLabel"> Edit vendor's info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               <form @submit.prevent="editMode ? updateVendor() : createVendor()">
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
                            <input v-model="form.phone" type="phone" name="phone" placeholder="Enter phone"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }">
                            <has-error :form="form" field="phone"></has-error>
                        </div>
                       
                    </div>
                     <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button v-show="!editMode" type="submit" class="btn btn-primary">Create</button>
                    <button v-show="editMode" type="submit" class="btn btn-primary">Update</button>
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
                vendors: {},
                editMode: false,
                form : new Form({
                    id: '',
                    name: '',
                    email: '',
                    phone: ''
                })
            }
        },
        methods: {
            updateVendor(){
               this.form.put('api/vendor/'+this.form.id)
                   .then(() => {
                        swal.fire(
                        'Updated!',
                        'Your file has been Updated.',
                        'success'
                        )
                         $('#myModal').modal('hide')
                        Bus.$emit('busgoing')
                   })
                   .catch((error) => {
                       console.log(error)
                   })
            },
            createUserModal(){
            this.editMode = false
            this.form.reset()
             $('#myModal').modal('show')
        },
        editVendor(vendor){
            this.editMode = true
            this.form.reset()
            $('#myModal').modal('show')
            this.form.fill(vendor)
        },
            deleteVendor(id){
                this.form.delete('api/vendor/'+id)
                    .then(() => {
                        swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                        Bus.$emit('busgoing')
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
            loadVendor(){
                axios.get('api/vendor')
                     .then(({data}) => {
                         this.vendors = data
                        
                     })
                     .catch((error) => console.log(error))
            },
           createVendor(){
               this.form.post('api/vendor')
                   .then(() => {
                        Bus.$emit('busgoing')
                         $('#myModal').modal('hide')
                       swal.fire({
                                position: 'top-end',
                                type: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            })
                   })
                   .catch((error) => console.log(error))
           }
        },
        mounted() {
            this.loadVendor()
             Bus.$on('busgoing', () => this.loadVendor())
            console.log('Component mounted.')
        }
    }

</script>



