<template>
  <div>
    <header-menu/>
   <div>
    <div>
      <h1>Riepilogo dell'ordine</h1>
    </div>
    <div v-for="plate, index in plates" :key="index">
      <div class="up">
          <img :src="`storage/${plate.piatto.image}`" alt="">
      </div>
      <h5 style="text-transform: uppercase;" >{{ plate.piatto.name }}</h5>

      <h5>Prezzo base:{{ plate.piatto.price }}€</h5>
      <div class="d-flex">
          <h5 class="m-0 d-flex align-items-center">Quantita': {{ plate.counter}}</h5>
      </div>
          <h5>Costo totale: {{plate.totalPrice}}€</h5>
    </div>
    <div>
      <h2>Prezzo totale :</h2>
      <p>{{totale}}€</p>
    </div>
  </div>
    <footer-resturants/>
  </div>
</template>

<script>
import FooterResturants from '../components/resturantsComponents/FooterResturants.vue'
import headerMenu from '../components/resturantsComponents/headerMenu.vue'
export default {
  components: { headerMenu, FooterResturants },
name:'CarrelloPage',
data(){
  return{
plates:[],
totale:0
  }
},
mounted(){
  this.plates=this.$route.params.plates
  console.log(this.plates)
  this.plates.forEach(element => {
    this.totale += parseInt(element.totalPrice)
  });

},
}

</script>

<style>

</style>
