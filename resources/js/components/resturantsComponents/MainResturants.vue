<template>
    <div>

         
        <h2>
            sono il main
        </h2>

        <div v-for="ristorante in ristoranti" :key="ristorante.id">
            <h2>{{ ristorante.name }}</h2>
        </div>

        <div v-for="categoria in categorie" :key="categoria.id">
            <h4>{{ categoria.name }}</h4>
        </div>


    </div>
</template>


<style scoped lang="scss">

</style>


<script>
 export default {
    name:"MainResturants",
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
                this.categorie= data.categorie
            })
        }
    },

    mounted(){
        this.takeResturantsandCategory()
    }
    }
</script>