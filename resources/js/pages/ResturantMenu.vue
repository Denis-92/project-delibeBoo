<template>
  <div>
      <headerResturants />
     <div class="d-flex">
      <div v-if="resturant != undefined">
        <div v-for="plate, index in resturant.plates" :key="index" >
                <div v-if="!plate.hidden">

                    <img  :src="`storage/${plate.image}`" alt="">
                    <h5>{{plate.name}}</h5>
                    <p>Descrizione:</p>
                    <p>{{plate.description}} </p>
                    <p>Prezzo:</p>
                    <p>{{plate.price}}</p>
                </div>

                <button @click="order(plate)" type="button" class="btn btn-outline-success mt-1 mb-5">Aggiungi al carrello</button>
        </div>
      </div>
      <OrderComponent :plateToadd="plateOrder"/>
     </div>
      <FooterResturants />
  </div>
</template>

<script>
import headerResturants from '../components/resturantsComponents/headerResturants.vue';
import FooterResturants from '../components/resturantsComponents/FooterResturants.vue';
import OrderComponent from '../components/resturantsComponents/OrderComponent.vue';
export default {
name:'ResturantMenu',
components: { headerResturants, FooterResturants, OrderComponent },
data(){
  return{
    resturant:undefined,
    plateOrder:[]
  }
},
methods:{
  getResturant(url){
        axios.get(url).then(({data})=>{

            console.log(data)
            this.resturant = data

        })},
        order(plate){
          let counter=1
          let data=
            {
              'plate': plate,
              'counter': counter
            }
          this.plateOrder.push(data)
          console.log(this.plateOrder)
          console.log(this.plateOrder[0].counter)
        },
},

mounted(){
  const slug = this.$route.params.slug;
  this.getResturant('api/resturants/' +slug);
}
}
</script>

<style>

</style>
