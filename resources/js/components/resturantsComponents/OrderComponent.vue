<template>
  <div id="sec-main">
    <h2 style="padding:20px;">Il tuo ordine</h2>
    <div class="result">

    <div v-for="element,index in plateToadd" :key="index" class="card">
          <div class="up">
            <img :src="`storage/${element.piatto.image}`" alt="">
          </div>
            <h5 style="text-transform: uppercase;" >{{ element.piatto.name }}</h5>

            <h5>Prezzo articolo:{{ element.piatto.price }} euro</h5>
            <div class="d-flex">
              <button @click="remove(index)" :class="element.counter==1? 'disable': ''" class="btn btn-outline-info mx-2" >-</button>
              <h5 class="m-0 d-flex align-items-center">Quantita': {{ element.counter}}</h5>
              <button @click="add(index)" class="btn btn-outline-info mx-2">+</button>
            </div>
            <h5>Costo: {{element.totalPrice}}</h5>
    </div>
  </div>
  </div>
</template>

<script>
export default {
name:'OrderComponent',
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
  }
}
}
</script>

<style lang="scss" scoped>
.disable{
      opacity: 0.5;
      pointer-events: none;
      cursor: none;
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

</style>
