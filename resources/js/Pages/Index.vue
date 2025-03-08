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
const currentRental = async (id) => {
  Swal.fire({
    title: 'Are you sure?',
    text: 'You won’t be able to revert this!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then(async (result) => {
    if (result.isConfirmed) {
      try {
        let res = await axios.post('/admin/delete_current_rental', { id });

        if (res.data.status === 200) {
          toast.success(res.data.message);

          Swal.fire({
            title: 'Deleted!',
            text: res.data.message,
            icon: 'success',
            confirmButtonText: 'OK'
          });
        } else {
          Swal.fire({
            title: 'Error!',
            text: 'Failed to delete rental.',
            icon: 'error',
            confirmButtonText: 'OK'
          });
        }
      } catch (error) {
        Swal.fire({
          title: 'Error!',
          text: 'Something went wrong. Please try again.',
          icon: 'error',
          confirmButtonText: 'OK'
        });
      }
    }
  });
};


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
