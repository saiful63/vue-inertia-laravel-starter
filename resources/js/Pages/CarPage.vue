<template>
      
      <AdminLayout/>
      <div class="main_body">
            <button>Add Car</button>
            <div class="card">
                  <div class="card_header">
                        Car List
                  </div>
                  <div class="card_body">
                        <table class="table">
                              <thead>
                                    <tr>
                                          <th>Name</th>
                                          <th>Brand</th>
                                          <th>Model</th>
                                          <th>Car type</th>
                                          <th>Daily rent price</th>
                                          <th>Image</th>
                                          <th>Year</th>
                                          <th>Action</th>
                                    </tr>
                              </thead>
                              <tbody>
                                 <tr v-for="car in cars" :id="car.id">
                                       <td>{{car.name}}</td>
                                       <td>{{car.brand}}</td>
                                       <td>{{car.model}}</td>
                                       <td>{{car.car_type}}</td>
                                       <td>{{car.daily_rent_price}}</td>
                                       <td>{{car.image}}</td>
                                       <td>{{car.year}}</td>
                                       <td>
                                            <font-awesome-icon :icon="['fas', 'eye']" size="1x" />
                                            <font-awesome-icon :icon="['fas', 'pen-to-square']" size="1x" />
                                            <font-awesome-icon :icon="['fas', 'trash']" size="1x" />
                                       </td>
                                 </tr>
                              </tbody>
                        </table>
                        
                  </div>
            </div>
      </div>
      
</template>

<script setup>
import AdminLayout from '@/Layout/AdminLayout.vue'
import {defineProps} from 'vue'

const props=defineProps({
      cars:Array
})

console.log(props.cars);
</script>

<style scoped>
.main_body{
     width: cal(100vw - 10vw);
     margin-left: 10vw;
     padding:2vw;
 }
</style>