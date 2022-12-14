<template>
  <div>
    <h2>Ordini</h2>
<div v-for="plate,index in plateToadd" :key="index">
{{plate.name}}
<img :src="`storage/${plate.image}`" alt="">
</div>
  </div>
</template>

<script>
export default {
name:'OrderComponent',
props:{
    plateToadd:Array
}
}
</script>

<style>

</style>
