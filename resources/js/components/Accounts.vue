<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Balance sheet</h3>
                        <p>Company name</p>
                        <p>00-00-0000</p>
                        <div class="card-tools">
                            <button class="btn btn-info" @click="printMe">Print</button>
                        </div>
                    </div>
                        
                    <div class="card-body">
                       <div class="row">
                           <div class="col-md-8">
                              <p class="asset text-bold teal">Assets</p>
                               <ul id="list1" class="text-left">
                                  <li>Equipmemts</li>
                                  <li>Account receiable</li>
                                  <li>Revenue</li>
                                  <li>others</li>
                              </ul>
                              <hr>
                             <p class="total-asset red">Total Assets</p>
                           </div>
                           
                           <div class="col-md-4">
                              <p class="taka text-bold teal">Taka</p>
                              <ul id="list2" class="text-right text-decotation-none">
                                  <li>2000</li>
                                  <li>18888</li>
                                  <li>98888</li>
                                  <li>8765</li>
                              </ul>
                              <hr>
                              <p class="total-taka">Total Taka:<span class="text-right red">23456</span></p>
                           </div>
                       </div>
                    </div>
                </div>
               <div class="card">
                    <div class="card-body">
                        <div class="row">
                           <div class="col-md-8">
                                  <p class="asset text-bold teal">Liabilities & Owner's equity</p>
                                <ul id="list1" class="text-left">
                                  <li>Note payable</li>
                                  <li>Account payable</li>
                                  <li>Owener's capital</li>
                                  <li>others</li>
                               </ul>
                              <hr>
                             <p class="total-asset red">Liabilities & OE</p>
                           </div>
                           <div class="col-md-4">
                                  <p class="taka text-bold teal">Taka</p>
                              <ul id="list2" class="text-right text-decotation-none">
                                  <li>2000</li>
                                  <li>18888</li>
                                  <li>98888</li>
                                  <li>8765</li>
                              </ul>
                              <hr>
                              <p class="total-taka">Total Taka:<span class="text-right red">23456</span></p>
                        </div>
                      </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                capital: 0,
                liability: 0
            }
        },
        methods: {
            printMe(){
                window.print()
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style>
#list1 {
  list-style: none;
  margin-right: 20px;
 
}
#list2 {
  list-style: none;
  margin-left: 50px;
 
}
.taka{
    margin-left: 225px;
}
.asset{
    margin-left: 40px;
}
.total-taka{
    margin-left: 140px
}
.total-asset{
    margin-left: 40px
}
.text-right{
    margin-right: 20px
}
</style>