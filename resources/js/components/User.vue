<template>
 
    <div class="container">
        <div class="row justify-content-center">
            <!-- <button class="btn btn-danger" @click="countUser" >send</button> -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>User's info</h3>
                        <!-- <p class="teal"><span>Total User's: </span>{{totalUsers}}</p> -->
                        <div class="card-tools">
                            <button class="btn btn-success" @click="createModel"><i class="fas fa-user-plus fa-fw"></i> Add User</button>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                             <thead>
                                 <tr>
                                     <th>Name</th>
                                     <th>Email</th>
                                     <th>Bio</th>
                                     <th>Type</th>
                                     <th>Registared at</th>
                                     <th>Modify</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr v-for="user in users.data" :key="user.id">
                                     <td>{{user.name}}</td>
                                     <td>{{user.email}}</td>
                                     <td>{{user.bio}}</td>
                                     <td>{{user.type|upText}}</td>
                                     <td>{{user.created_at|momentTime}}</td>
                                     <td><a @click="editModel(user)" href="#"><i class="fas fa-edit fa-fw fontbig blue"></i> </a><a @click="deleteUser(user.id)" href="#"><i class="fas fa-trash-alt fa-fw fontbig red"></i></a> </td>
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
                    <h5 class="modal-title" v-show="!editMode" id="exampleModalLabel">Add user's info</h5>
                    <h5 class="modal-title" v-show="editMode" id="exampleModalLabel">Edit user's info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form @submit.prevent="editMode ? editUser() : createUser()">
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
                            <textarea v-model="form.bio" name="bio" id="bio"
                            placeholder="Short bio for user (Optional)"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
                            <has-error :form="form" field="bio"></has-error>
                        </div>
                        <div class="form-group">
                        <select name="type" v-model="form.type" id="type" class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                            <option value="">Select User Role</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                            <option value="author">Author</option>
                        </select>
                        <has-error :form="form" field="type"></has-error>
                    </div>
                        <div class="form-group">
                            <input v-model="form.password" type="password" name="password" placeholder="Enter password"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                            <has-error :form="form" field="password"></has-error>
                        </div>

                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" v-show="editMode" class="btn btn-primary"><i class="fas fa-user-plus fa-fw"></i> Update</button>
                    <button type="submit" v-show="!editMode" class="btn btn-primary"><i class="fas fa-user-plus fa-fw"></i> Create</button>
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
                users: {},
                totalUsers: null,
                form: new Form({
                   id: '',
                   name: '',
                   email: '',
                   type: '',
                   bio: '',
                   password: '',
                   photo: ''
               })
            }
        },
        methods: { 
            //   countUser(){
            //       console.log('clicked user')
            //       Bus.$emit('datapassing', this.totalUsers)
            //       console.log(this.totalUsers)
            //  },
          
            editUser(){
               this.form.put('api/user/'+this.form.id)
                   .then(() => {
                         swal.fire(
                                    'Updated!',
                                    'Your file has been Updated.',
                                    'success'
                                    )
                             $('#myModal').modal('hide')
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
            editModel(user){
                 
                 this.form.reset()
                 this.editMode = true
                 $('#myModal').modal('show')
                 this.form.fill(user)
            },
            deleteUser(id){
               this.form.delete('api/user/'+id)
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
            loadUsers(){
                axios.get('api/user')
                     .then(({data})=>{
                        this.users = data
                        this.totalUsers = data.data.length
                        // Bus.$emit('datapassing', this.totalUsers)
                        // console.log(this.totalUsers)
                        this.$store.commit('loadUsers', this.users)
                        // this.$store.commit('userLength', this.totalUsers)
                     })
                     .catch(()=>{
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
                this.form.reset()
                 $('#myModal').modal('show')
            },
            createUser(){
                this.form.post('api/user')
                        .then(()=>{
                             $('#myModal').modal('hide')
                            swal.fire({
                                position: 'top-end',
                                type: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            Bus.$emit('rootbus')
                             })
                        .catch(()=>{
                            swal.fire({
                                    type: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                    footer: '<a href>Why do I have this issue?</a>'
                                    })
                             })
            }
         },
        created() {
            // this.countUser()
            this.loadUsers()
            Bus.$on('rootbus', ()=>{ this.loadUsers() })
            console.log('Component created.')
            
            
        },
        // mounted(){ 
        //     this.countUser()
        //     console.log('component mounted')
        // }
    }
</script>