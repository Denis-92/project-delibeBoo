<template>
  <div >
    <headerMenu />
    <infoResturants :resturant = 'resturant'/>
    <barraProdotti />
    


    <section id="sec">
      <div v-if="resturant != undefined" class="Mastro">
        <div  v-for="plate, index in resturant.plates" :key="index" class="card-visible">
          <div v-if="!plate.hidden">

            
            <!-- info card e card -->
            
              <div class="foto">
                <img :src="`storage/${plate.image}`" alt="">
              </div>



              <h5>{{ plate.name }}</h5>
              <p>Descrizione:</p>
              <p>{{ plate.description }} </p>
              <p>Prezzo:</p>
              <p>{{ plate.price }}€</p>
            
            <!-- ------------ -->

            <!-- ------------------Bottone--------------------------- -->
            <button @click="order(plate)" type="button">Aggiungi al carrello</button>
            <!-- --------------------------------------------------------------- -->

          </div>


          <div v-else >
            <div class="card-nonVisible">

               <!-- img piatti -->
               <div>
                  <img :src="`storage/${plate.image}`" alt="">
               </div>
               <!-- ------------------------ -->

               <!-- info -->
               <h5>{{ plate.name }}</h5>
               <p>Descrizione:</p>
               <p>{{ plate.description }} </p>
               <p>Prezzo:</p>
               <p>{{ plate.price }}€</p>
               <!-- ------------ -->

            </div>


            
            <!-- <div class="soldout">
              <h2 class="text-danger">SOLD OUT</h2>
            </div> -->



          </div>
        </div>
      </div>




        <OrderComponent :plateToadd="plateOrder"/>

      
    </section>



    <FooterResturants />
  </div>
</template>


<style scoped lang="scss">

#sec{
  display: flex;
  width: 75%;
  height: 100%;
  background-color: rgba(0, 255, 157, 0.336);
  .Mastro{
    width: 100%;
    .card-visible{
      width: 25%;
      background-color: bisque;
      border-radius: 10px;
      .foto{
        img{
          max-width: 100%;
        }
      }
    }
  }
}




</style>








<script>
import headerMenu from '../components/resturantsComponents/headerMenu.vue';
import FooterResturants from '../components/resturantsComponents/FooterResturants.vue';
import OrderComponent from '../components/resturantsComponents/OrderComponent.vue';
import infoResturants from '../components/resturantsComponents/infoResturants.vue';
import barraProdotti from '../components/resturantsComponents/barraProdotti.vue';


export default {
name:'ResturantMenu',
components: { headerMenu, FooterResturants, OrderComponent, infoResturants, barraProdotti },
data(){
  return{
    resturant:undefined,
    plateOrder:[],
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
              'piatto': plate,
              'counter': counter,
              'totalPrice': plate.price
            }
          if(this.plateOrder.length>0){
            const array = this.plateOrder.find(element => element.piatto.name == data.piatto.name);
            if(array == undefined){
              this.plateOrder.push(data)
            }else{
              this.plateOrder.forEach(element => {
                if(element.piatto.name === array.piatto.name){
                  element.counter++
                  let price = element.piatto.price * element.counter
                  element.totalPrice=(Math.round(price * 100) / 100).toFixed(2);
                }
              });
            }
          }else{
            this.plateOrder.push(data)
          }}
},

  mounted() {
    const slug = this.$route.params.slug;
    this.getResturant('api/resturants/' + slug);
  },
}
</script>

