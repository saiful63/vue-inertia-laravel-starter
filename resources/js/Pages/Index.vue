<template>
      
      
      <h1>From child</h1>
      <button @click="ShowAlert" class="btn btn-primary">Click</button>
      <button @click="successToast" class="btn btn-danger">successToast</button>
      <button @click="errorToast" class="btn btn-primary">errorToast</button>
</template>

<script setup>
import Swal from 'sweetalert2'
import { useToast } from 'vue-toastification'

const toast = useToast()
const ShowAlert = ()=>{
Swal.fire({
    title: 'Success!',
    text: 'Your action was successful.',
    icon: 'success',
    confirmButtonText: 'OK'
  })
}

const successToast=()=>{
   toast.success('Operation Successful!', {
    timeout: 3000, // Auto close after 3 seconds
    position: 'top-right'
  })
}

const errorToast=()=>{
 toast.error('Something went wrong!', {
    timeout: 3000,
    position: 'top-right'
  })
}

</script>

<style scoped>
</style>