<template>
  <div>
    <h2>Ordini</h2>
    <div v-for="element,index in plateToadd" :key="index">
        <div v-for="plate,index in element" :key="index">
            {{plate.name}}

            <img :src="`storage/${plate.image}`" alt="">
        </div>
        {{element.counter}}
    </div>
  </div>
</template>

<script>
export default {
name:'OrderComponent',
props:{
    plateToadd:Array
},
}
</script>

<style>

</style>
