<template>
  <div>
    <h2>Il tuo ordine</h2>
    <div v-for="element,index in plateToadd" :key="index">
        <div v-for="plate,index in element" :key="index">
            <h5>{{ plate.name }}</h5>
            <img :src="`storage/${plate.image}`" alt="">
            <h5>{{ plate.price }}</h5>
        </div>
        {{ element.counter}}
    </div>
    <h4>Totale ordine:</h4>
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
