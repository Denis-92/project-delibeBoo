<template>
  <div >
    <headerMenu />
    <infoResturants :resturant = 'resturant'/>
    <barraProdotti />
    
<hr>

    <section id="sec">
      <div v-if="resturant != undefined" class="Mastro">
        <div  v-for="plate, index in resturant.plates" :key="index" class="card-visible">
          <div class="non-disp" v-if="!plate.hidden">


              <!-- info Card visible (influisce anche per le NON) -->
              <img :src="`storage/${plate.image}`" alt="">


              <div class="prova">
                <h5>{{ plate.name }}</h5>
                

                    <p id="margin-p">{{ plate.description }} </p>
                    <p> Prezzo:  {{ plate.price }}€</p>


                
                  <button @click="order(plate)" type="button"></button>
                
                
              </div>

          </div>


          <div v-else  class="non-disp">
            <div class="non-disp">
              <div class="card-nonVisible Hsorry">

                  <!-- info Card non visible -->
                  <img :src="`storage/${plate.image}`" alt="">
                  <div class="prova">
                  <h5>{{ plate.name }}</h5>
                  
                    <p id="margin-p">{{ plate.description }} </p>
                  
                  
                  <p> Prezzo:  {{ plate.price }}€</p>
                  
                  

                    <!-- <button @click="order(plate)" type="button"></button> -->

                    <div class="sorry">
                      <h3>Attualmente non disponibile</h3>
                    </div>
                    


                  </div>

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

.Hsorry:hover .sorry{
  display: flex;
}

.Hsorry{
  width: 100%;
  height: 100%;
}

#margin-p{
  margin: 15px 0px;
  display: flex;

}

.sorry{
  width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5019607843);
    position: absolute;
    top: -5px;
    right: 0;
    display: none;
    justify-content: center;
    align-items: center;
    border-radius: 5px;
        
        h3{
          color: white;
        }
      }


*{
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}


#sec{
  display: flex;
  width: 100%;
  // height: 100%;
  // background-color: rgba(0, 255, 157, 0.336);
  .Mastro{
    width: 80%;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-left: 5%;
    margin-top: 5%;
    margin-bottom: 5%;

    .card-visible{
      width: 30%;
      // max-height: 45%;
      // background-color: rgba(0, 255, 42, 0.342);
      border-radius: 5px;
      position: relative;
      background-color: #ffff;
      box-shadow: #0000000a -4px 4px 5px 0px;
      border: 1px solid #00000012;
      .prova{
        width: 65%;
        // background-color: rgba(0, 140, 255, 0.493);
        margin-left: 5px;
        margin-top: 5px;
        
        h5{
        font-weight: 700;
        font-size: 1.4rem;
        }
        p{
          font-size: 0.8rem;
          margin-bottom: 5px;
        }
        button{
          width: 100%;
          height: 100%;
          position: absolute;
          top: 0;
          background-color: rgba(255, 0, 0, 0);
          border: none;
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


    .non-disp{
      position: relative;
      height: 100%;
      
      .card-nonVisible{
      width: 100%;
      
      
      // background-color: rgba(255, 0, 0, 0.815);
      border-radius: 5px;
      position: relative;
      .prova{
        width: 65%;
        // background-color:  rgba(0, 140, 255, 0.493);
        h5{
        font-weight: 700;
        font-size: 1.4rem;
        p{
          font-size: 0.8rem;
          margin-bottom: 5px;
          margin-top: 25px;
        }
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
components: { headerMenu, FooterResturants, OrderComponent, infoResturants,  }, 
// barraProdotti
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

