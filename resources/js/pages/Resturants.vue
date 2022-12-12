<template>
<div>
<div v-for="ristorante in ristoranti" :key="ristorante.id">
<p>{{ristorante.name}}</p>
</div>
<div v-for="categoria in categorie" :key="categoria.name">
<p>{{categoria.name}}</p>
</div>
</div>

</template>

<script>
export default {
name:"ResturantComponent",
data(){
    return{
        ristoranti:undefined,
        categorie:undefined
    }
},
methods:{
    takeResturantsandCategory(){
        axios.get('api/resturants').then(({data})=>{
            this.ristoranti=data.ristoranti
            this.categorie = data.categorie
        })
    }
},

mounted(){
    this.takeResturantsandCategory()
}
}
</script>

<style>

</style>
