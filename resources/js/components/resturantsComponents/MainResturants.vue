<template>
    <section id="sec-main">
        <div class="filter"></div>
        <div class="result"></div>
    </section>
</template>


<style scoped lang="scss">
#sec-main{
    width: 100%;
    height: 100vh;
    background-color: rgba(255, 217, 0, 0.445);
    display: flex;

    .filter{
        width: 20%;
        height: 100%;
        background-color: greenyellow;
    }

    .result{
        width: 80%;
        height: 100%;
        background-color: green;
    }
}
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