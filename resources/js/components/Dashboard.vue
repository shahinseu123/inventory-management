<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                

            <!-- small box -->
            
            <!-- small box -->
            <div class="small-box back-pink">
              <div class="inner">
                <h3>{{totalusers}}</h3>

                <p>Total User</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          
            </div>
            <div class="col-md-3">

            <!-- small box -->
            <div class="small-box back-teal">
              <div class="inner">
                <h3>{{totalCustomerCount}}</h3>

                <p>Total Customer</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          
            </div>
            <div class="col-md-3">

            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          
            </div>
            <div class="col-md-3">

            <!-- small box -->
            
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          
          
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'
    export default {
        data(){
            return {
                totalusers: null,
                totalProduct: null,
                totalReseller: null,
                totalRootCustomer: null,
                totalVipCustomer: null,
                // totalCustomer: null
            }

        },
        computed: {
            totalCustomerCount(){
                 return this.totalReseller + this.totalRootCustomer + this.totalVipCustomer
            }
        },
        methods: {
          //  totalCustomerCount(){
          //        this.totalCustomer = this.totalReseller + this.totalRootCustomer + this.totalVipCustomer
          //   },
           getUserLength(){
               axios.get('api/user')
                    .then(({data}) => {
                       this.totalusers = data.data.length
                     
                       
                    })
           },
            getResellerLength(){
               axios.get('api/reseller')
                    .then(({data}) => {
                       this.totalReseller = data.data.length
                  
                       
                    })
           },
            getViprLength(){
               axios.get('api/vipcustomer')
                    .then(({data}) => {
                       this.totalVipCustomer = data.data.length
                     
                       
                    })
           },
            getRootLength(){
               axios.get('api/rootcustomer')
                    .then(({data}) => {
                       this.totalRootCustomer = data.data.length
                     
                       
                    })
           },
           
        },
       
        created(){
            this.getUserLength()
            this.getResellerLength()
            this.getViprLength()
            this.getRootLength()

            //  Bus.$on('datapassing', (v) => {
            // //    this.totalusers = v
            // }),
            //  Bus.$on('passProduct', (v1) => {
            // //    this.productCount = v1 
            //    alert(v1)
            // })
            
            // this.totalCustomerCount()
        } 
       
    }
</script>