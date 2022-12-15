<template>
  <div>


    <h2>Il tuo ordine</h2>
    <div v-for="element,index in plateToadd" :key="index">

            <h5>{{ element.plate.name }}</h5>
            <img :src="`storage/${element.plate.image}`" alt="">
            <h5>{{ element.plate.price }}</h5>

        {{ element.counter}}
    </div>
    <h4>Totale ordine:</h4>
    

  </div>
</template>


<style scoped lang="scss">

</style>


<script>
export default {
name:'OrderComponent',
props:{
    plateToadd:Array
},
}
</script>


