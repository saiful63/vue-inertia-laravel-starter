<template>
      <div class="sidenav">
       <div class="items">
         <h1>Admin</h1>
       </div>
      </div>
      
          <slot/>
      
</template>

<script setup>

</script>

<style scoped>
 .sidenav{
     position: fixed;
     width: 10vw;
     height: 100vh;
     top: 0;
     left: 0;
     background-color: rgb(51, 48, 48);
     padding-left: 2vw;
     padding-top: 2vw;
 }

 .items{
     display: flex;
     flex-direction: column;
     font-size:20px;
     gap: 10px;
     margin: 0 auto;
 }

 .items a{
     color: white;
     text-decoration: none;
 }
 
</style>