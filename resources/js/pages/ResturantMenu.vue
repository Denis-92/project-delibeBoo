<template>
  <div >
    <headerMenu />
    <infoResturants :resturant = 'resturant'/>
    <barraProdotti />
    <div class="d-flex ">



      <div v-if="resturant != undefined"  class="main">
        <div  v-for="plate, index in resturant.plates" :key="index" class="card">
          <div v-if="!plate.hidden" >
            <!-- img piatti -->
            <div class="card-img">
              <img :src="`storage/${plate.image}`" alt="">
            </div>
            <!-- ------------------------ -->

            <!-- info -->
            <h5 style="text-transform:uppercase;" class="mt-3" >{{ plate.name }}</h5>
            <p>Descrizione:</p>
            <p>{{ plate.description }} </p>
            <p>Prezzo:</p>
            <p>{{ plate.price }}€</p>
            <!-- ------------ -->

            <!-- ------------------Bottone--------------------------- -->
            <button @click="order(plate)" type="button" class="btn btn-outline-success mt-1 mb-5">Aggiungi al carrello</button>
            <!-- --------------------------------------------------------------- -->

          </div>


          <div v-else >
            <div class="hidden">

                  <!-- img piatti -->
                  <div class="card-img ">
                      <img :src="`storage/${plate.image}`" alt="">
                  </div>
                  <!-- ------------------------ -->

                  <!-- info -->
                      <h5 style="text-transform:uppercase;" class="mt-3" >{{ plate.name }}</h5>
                      <p>Descrizione:</p>
                      <p>{{ plate.description }} </p>
                      <p>Prezzo:</p>
                      <p>{{ plate.price }}€</p>
                      <!-- ------------ -->

            </div>


            
            <div class="soldout">
                 <h2 class="text-danger">SOLD OUT</h2>
            </div>



          </div>
        </div>
      </div>



      <OrderComponent :plateToadd="plateOrder"/>
    </div>



    <FooterResturants />
  </div>
</template>


<style scoped lang="scss">
.card-img {
  width: 300px;
}

img {
  width: 100%;
  height: auto;
}
.hidden{
  opacity: 0.5;
  position: relative;

}
.soldout{
  width:100%;
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50% ,-50%) ;
  z-index: 800;
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

<style lang="scss" scoped>
img{
  width: 100%;
  height: 100%;
}
.main{
  width: 60%;
  margin: 0 auto;
  display: flex;
  flex-wrap: wrap;

}
.card{
    width: calc(100% / 4 - 20px);
    padding: 10px 30px;
    margin: 10px 10px;
    border: 1px solid black;
  }
.card-img {
  width: 100%;
  height: 230px;
}


</style>
