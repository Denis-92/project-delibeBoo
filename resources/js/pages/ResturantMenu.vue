<template>
  <div>
    <headerResturants />
    <infoResturants />

      <div v-if="resturant != undefined">
        <div v-for="plate, index in resturant.plates" :key="index">
          <div v-if="!plate.hidden">

            <!-- ---------IMG--------- -->
            <div class="card-img">
              <img :src="`storage/${plate.image}`" alt="">
              <img :src="`storage/${resturant.image}`" alt="">
            </div>
            <!-- --------------------------------- -->

            <!-- -----------Descrizione prodotto--------- -->
            <h5>{{ plate.name }}</h5>
            <p>Descrizione:</p>
            <p>{{ plate.description }} </p>
            <p>Prezzo:</p>
            <p>{{ plate.price }}</p>
            <!-- ----------------------------------------------- -->
            
            <!-- ------------------Bottone--------------------------- -->
            <button @click="order(plate)" type="button" class="btn btn-outline-success mt-1 mb-5">Aggiungi al carrello</button>

            <!-- --------------------------------------------------------------- -->
          </div>


        </div>
      </div>
      <OrderComponent :plateToadd="plateOrder" />

    <FooterResturants />
  </div>
</template>

<script>
import headerResturants from '../components/resturantsComponents/headerResturants.vue';
import FooterResturants from '../components/resturantsComponents/FooterResturants.vue';
import OrderComponent from '../components/resturantsComponents/OrderComponent.vue';
import infoResturants from '../components/resturantsComponents/infoResturants.vue';

export default {
name:'ResturantMenu',
components: { headerResturants, FooterResturants, OrderComponent },
data(){
  return{
    resturant:undefined,
    plateOrder:[],
    totale:0
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
          if(this.plateOrder.length>0){
            const array = this.plateOrder.find(element => element.plate.name == data.plate.name);
            console.log('const',array)
            if(array == undefined){
              this.plateOrder.push(data)
            }else{
              this.plateOrder.forEach(element => {
                if(element.plate.name === array.plate.name){
                  element.counter++
                }
              });
            }
          }else{
            this.plateOrder.push(data)
          }
        },
},

  mounted() {
    const slug = this.$route.params.slug;
    this.getResturant('api/resturants/' + slug);
  }
}
</script>

<style scoped lang="scss">
.card-img {
  width: 300px;
}

img {
  width: 100%;
  height: auto;
}
</style>
