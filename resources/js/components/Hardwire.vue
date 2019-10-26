<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>User's info</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-user-plus fa-fw"></i> Add User</button>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                             <thead>
                                 <tr>
                                     <th>Name</th>
                                     <th>Email</th>
                                     <th>Bio</th>
                                     <th>Type</th>
                                     <th>Password</th>
                                     <th>Modify</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>Jhon </td>
                                      <td>jhon@me.com </td>
                                       <td>He is good </td>
                                        <td>admin </td>
                                         <td>2012000 </td>
                                         <td><a  href="#"><i class="fas fa-edit fa-fw fontbig blue"></i> </a><a href="#"><i class="fas fa-trash-alt fa-fw fontbig red"></i></a> </td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>