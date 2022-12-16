<template>
  <div >
    <headerMenu />
    <infoResturants :resturant = 'resturant'/>
    <barraProdotti />
    


    <section id="sec">
      <div v-if="resturant != undefined" class="Mastro">
        <div  v-for="plate, index in resturant.plates" :key="index" class="card-visible">
          <div v-if="!plate.hidden">


              <!-- info Card visible (influisce anche per le NON) -->
              <img :src="`storage/${plate.image}`" alt="">


              <div class="prova">
                <h5>{{ plate.name }}</h5>
                <p>Descrizione:</p>
                <p>{{ plate.description }} </p>
                <p>Prezzo:</p>
                <p>{{ plate.price }}€</p>
                <button @click="order(plate)" type="button">Aggiungi al carrello</button>
              </div>

          </div>


          <div v-else >
            <div class="card-nonVisible">

               <!-- info Card non visible -->
               <img :src="`storage/${plate.image}`" alt="">
               <div class="prova">
                <h5>{{ plate.name }}</h5>
                <p>Descrizione:</p>
                <p>{{ plate.description }} </p>
                <p>Prezzo:</p>
                <p>{{ plate.price }}€</p>
                <button>Non permetterti a cliccarmi </button>
              </div>
               
            </div>

          </div>
        </div>
      </div>




        <OrderComponent :plateToadd="plateOrder"/>

      
    </section>



    <FooterResturants />
  </div>
</template>


<style scoped lang="scss">

*{
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}


#sec{
  display: flex;
  width: 100%;
  height: 100%;
  // background-color: rgba(0, 255, 157, 0.336);
  .Mastro{
    width: 80%;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-left: 5%;
    margin-top: 5%;

    .card-visible{
      width: 25%;
      // height: 45%;
      // background-color: rgba(0, 255, 42, 0.342);
      border-radius: 5px;
      position: relative;
      .prova{
        width: 65%;
        background-color: rgba(0, 140, 255, 0.493);
        h5{
        font-weight: 700;
        font-size: 1.4rem;
      }
      }

      img{
        max-width: 29%;
        height: 80%;
        position: absolute;
        right: 17px;
        bottom: 14px;
      }
    }

    .card-nonVisible{
      width: 100%;
      
      // background-color: rgba(255, 0, 0, 0.815);
      border-radius: 5px;
      position: relative;
      .prova{
        width: 65%;
        background-color:  rgba(0, 140, 255, 0.493);
        h5{
        font-weight: 700;
        font-size: 1.4rem;
      }
      }
      img{
        max-width: 29%;
        height: 80%;
        position: absolute;
        right: 17px;
        bottom: 14px;
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

