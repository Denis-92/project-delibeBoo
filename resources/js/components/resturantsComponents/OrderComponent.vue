<template>


  <div id="sec-main" v-if='plate.length > 0' >
    <h2 id="order">Il tuo ordine</h2>
    <div class="mini-conteiner">

    <div v-for="element,index in plate" :key="index">
      
      <div class="content">

        
        <div class="sx">
          <h5>{{ element.piatto.name }}</h5>
        </div>
        <div class="dx">
          <div>
            <button id="remove" @click="plateToRemove(index)">Rimuovi</button> 
              <button class="meno" @click="remove(index)" v-if="element.counter ==1? '': 'disabled' " >-</button>
              <span>{{ element.counter}}</span>
              <button class="più" @click="add(index)">+</button>
          </div>
            <h5>{{element.totalPrice}}€</h5>
        </div>
      </div>

          


           



             
    </div>
  </div>
  <router-link id="cart"  :to="{ name: 'cart', params: { plates: plateToadd }}">Vai al Carrello</router-link>
  </div>


</template>


<style scoped lang="scss">
#order{
  margin-left: 25px;
  margin-top: 15px;
}

#cart{
  margin-left: 25px;
}



#sec-main{
  width: 35%;
    min-height: 300px;
    height: 100%;
    background-color: rgb(255 255 255 / 56%);
    display: flex;
    gap: 10px;
    flex-direction: column;
    align-items: flex-start;
    border-radius: 7px;
    border: 1px solid #00000012;
    box-shadow: #0000000a -4px 5px 9px 0px;


    margin-right: 30px;
    margin-top: 5%;
    .mini-conteiner{
      width: 90%;
      height: 100%;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 20px;
      .content{
        width: 100%;
        height: 100%;
        // background-color: rgba(43, 226, 150, 0.377);
        display: flex;
        align-items: center;
        .sx{
          width: 30%;
          height: 100%;
          // background-color: burlywood;
        }
        .dx{
          width: 70%;
          height: 100%;
          // background-color: rgb(222, 135, 210);
          display: flex;
          justify-content: flex-end;
          gap: 15px;
        }
        #remove{
          margin-right: 5px;
          margin-right: 5px;
          background-color: #ff000080;
          border: 2px solid #00000021;
          border-radius: 7px;
        }
        .più{
          background-color: #00dd008c;
          margin-left: 10px;
          border: 2px solid rgba(0, 0, 0, 0.1294117647);
          border-radius: 7px;
        }
        .meno{
          background-color: #00dd008c;
          margin-right: 10px;
          border: 2px solid rgba(0, 0, 0, 0.1294117647);
          border-radius: 7px;
        }
      }
    }
}


</style>















<script>
export default {
name:'OrderComponent',
data(){
  return{
    plate:[]
  }
},
props:{
    plateToadd:Array
},
methods:{
  add(index){
    console.log(this.plateToadd[index])
    console.log(index)
    this.plateToadd[index].counter = this.plateToadd[index].counter + 1
    let price = this.plateToadd[index].counter * this.plateToadd[index].piatto.price
    this.plateToadd[index].totalPrice=(Math.round(price * 100) / 100).toFixed(2);
  },
  remove(index){
    console.log(this.plateToadd[index])
    console.log(index)
    this.plateToadd[index].counter = this.plateToadd[index].counter - 1
    let price = this.plateToadd[index].counter * this.plateToadd[index].piatto.price
    this.plateToadd[index].totalPrice=(Math.round(price * 100) / 100).toFixed(2);
  },
  plateToRemove(i){
   this.plate.forEach((element,index) => {
    if(index == i){
      this.plate.splice(index, 1);
    }
   });
   console.log(this.plate)
  }
},
mounted(){
  this.plate = this.plateToadd
}



}
</script>

<style lang="scss" scoped>
button.disabilita{
      opacity: 0.5!important;
      pointer-events: none !important;
      cursor: none!important;
}
#sec-main{
  width: 20%;
    display: flex;
    flex-direction: column;
  }
.result{
        width: 82%;
        // height: 100%;
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding: 20px;
        // background-color: green;
        .card{
            width: 100%;
            border: 10px;
            position: relative;
            img{
              width: 100%;
              height: 100%;
            }

            .up{
                width: 100%;
                height: 270px;
                flex-grow: 1;
                border-radius: 10px 10px 0px 0px;
                border: 1px solid #00000017;
                border-bottom: none;
            }


            }}

