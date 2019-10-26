import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
      
      state: {
        users: [ ],
        countUsers : null,
        product: [
          { name: 'Milk', price:20 },
          { name: 'Tea', price:40 },
          { name: 'Bean', price:60 },
          { name: 'Bread', price:10 }
        ],
        todo: [
          { name: 'Milk', done:true },
          { name: 'Tea', done:false },
          { name: 'Bean', done:true },
          { name: 'Bread', done:false }
        ]
              
      },
      getters: {
        sellProduct:(state) => {
            return state.product
        
        },
        todos: state => { 
            return state.todo.filter(elelemt => elelemt.done)
        },
        userCount: state => {
          return state.countUser
        }
      },
      mutations: {
        loadUsers(state, users){
            state.users.push(users.data)
        },

      //   userLength(state, totalUsers){
      //     state.countUser = totalUsers.data
      // }
      },
  
    })