<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Category</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="createCaterogyModal"><i class="fas fa-user-plus fa-fw"></i> Add Category</button>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                             <thead>
                                 <tr>
                                     <th>Category name</th>
                                     <th>Registered at</th>
                                     <th>Modify</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr v-for="category in categories.data" :key="category.id">
                                     <td>{{category.name}} </td>
                                     <td>{{category.created_at}} </td>

                                         <td><a @click="editCategory(category)"  href="#"><i class="fas fa-edit fa-fw fontbig blue"></i> </a><a @click="deleteCategory(category.id)" href="#"><i class="fas fa-trash-alt fa-fw fontbig red"></i></a> </td>
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
                    <h5 v-show="!editMode" class="modal-title" id="exampleModalLabel">Create Category</h5>
                    <h5 v-show="editMode" class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
             <form @submit.prevent="editMode ? updateCategory() : createCategory()">
                <div class="modal-body">
                     <div class="form-group">
                            <input v-model="form.name" type="text" name="name" placeholder="Enter category"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
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
               editMode: false,
               categories: {},
               form: new Form({
                   id: '',
                   name: ''
               })
            }
        },
        methods: {
           updateCategory(){
               this.form.put('api/category/'+this.form.id)
                   .then(() => {
                       swal.fire(
                                    'Updated!',
                                    'Your file has been Updated.',
                                    'success'
                                    )
                             $('#myModal').modal('hide')
                              Bus.$emit('bus-is-on')
                   })
                   .catch((error) => {
                       console.log(error)
                   })
           },
           createCaterogyModal(){
               this.form.reset()
                this.editMode = false
               $('#myModal').modal('show')
           },
           editCategory(category){
               this.form.reset()
               this.editMode = true
               $('#myModal').modal('show')
               this.form.fill(category)
        
           },
           deleteCategory(id){
               this.form.delete('api/category/'+id)
                   .then(() => {
                         swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                        Bus.$emit('bus-is-on')
                   })
                   .catch((error) => {
                       console.log(error)
                   })
           },
           loadCategory(){
               axios.get('api/category')
                    .then(({data}) => {
                        this.categories = data
                    })
           },
           createCategory(){
               this.form.post('api/category')
                   .then(() => {
                        $('#myModal').modal('hide')
                        Bus.$emit('bus-is-on')
                       swal.fire({
                                position: 'top-end',
                                type: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            })
                   })
                   .catch((error) =>{
                      console.log(error)
                   })
           }
        },
        mounted() {
            this.loadCategory()
            Bus.$on('bus-is-on', (() => this.loadCategory()))
            console.log('Component mounted.')
        }
    }

</script>



