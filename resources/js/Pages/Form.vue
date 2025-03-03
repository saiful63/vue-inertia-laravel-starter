<template>
      
      <AdminLayout/>
      <div class="main_body">
            <Link href="/admin/rental_page" class="btn btn-primary mb-2">View rentals</Link>
            <div class="card">
                  <div class="card_header">
                        <h4>Create Rental</h4>
                  </div>
                  <div class="card_body">
                        
                        <form @submit.prevent="submit">
                         <select class="form-control" v-model="formData.customer">
                               <option value="" disabled selected>Select Customer</option>
                               <option v-for="customer in customerData.customers" :key="customer.id" :value="customer.id">{{customer.name}}</option>
                         </select>
                         <br>
                         <select class="form-control" v-model="formData.car">
                               <option value="" disabled selected>Select Car</option>
                               <option v-for="car in carData.cars" :key="car.id" :value="car.id">{{car.name}}</option>
                         </select>
                         <br>
                         <input type="date" v-model="formData.start_date" class="form-control">
                         <br>
                         <input type="date" v-model="formData.end_date" class="form-control">
                         <br>
                         <span v-if="errors.end_date" class="text-danger">{{errors.end_date[0]}}</span>
                         <input type="text" v-model="formData.daily_rent_price" class="form-control" placeholder="Enter Daily Rent">
                         <br>
                         <select class="form-control" v-model="formData.status">
                               <option value="" disabled selected>Select Status</option>
                               <option value="Pending">Pending</option>
                               <option value="Ongoing">Ongoing</option>
                               <option value="Completed">Completed</option>
                               <option value="Canceled">Canceled</option>
                         </select>
                         <br>
                         <button class="btn btn-primary btn-sm" type="submit">Create</button>
                        </form>
                  </div>
            </div>
      </div>
      
</template>

<script setup>
import AdminLayout from '@/Layout/AdminLayout.vue'
import{Link} from '@inertiajs/vue3'
import{reactive,onMounted,ref} from 'vue'
import axios from 'axios'
import {useToast} from 'vue-toastification'


const toast = useToast();

const customerData = reactive({
      customers:[]
})
const carData = reactive({
      cars:[]
})
const getCars = async()=>{
      let res = await axios.get('/admin/car_list');
      carData.cars = res.data
}
const getCustomers = async()=>{
      let res = await axios.get('/admin/customer_list');
      customerData.customers = res.data
}

onMounted(getCustomers)
onMounted(getCars)

const formData = reactive({
  car:'',
  customer:'',
  start_date:'',
  end_date:'',
  status:'',
  daily_rent_price:''
})

const defaultFormData = reactive({
  car:'',
  customer:'',
  start_date:'',
  end_date:'',
  status:'',
  daily_rent_price:''
})

const errors = ref({})

const submit = async()=>{
      errors.value = {}
      let data = new FormData()
      data.append('car_id',formData.car)
      data.append('user_id',formData.customer)
      data.append('start_date',formData.start_date)
      data.append('end_date',formData.end_date)
      data.append('status',formData.status)
      data.append('daily_rent_price',formData.daily_rent_price)
      try{
        let res = await axios.post('/admin/create_rental',data)
        toast.success(res.data.message)
      //   Object.assign(formData,defaultFormData);
      }catch(error){
            console.log(error)
        if(error.response && error.response.data.errors){
            errors.value = error.response.data.errors;
            console.log(errors.value)
        }
      }
      
}

</script>

<style scoped>
.main_body{
     width: cal(100vw - 10vw);
     margin-left: 10vw;
     padding:2vw;
 }
</style>