<template>
  <div>
      <headerResturants />
      <div v-if="resturant != undefined">
        <div v-for="plate, index in resturant.plates" :key="index" >{{plate.name}}</div>
      </div>
      <FooterResturants />
  </div>
</template>

<script>
import headerResturants from '../components/resturantsComponents/headerResturants.vue';
import FooterResturants from '../components/resturantsComponents/FooterResturants.vue';
export default {
name:'ResturantMenu',
components: { headerResturants, FooterResturants },
data(){
  return{
    resturant:undefined
  }
},
methods:{
  getResturant(url){
        axios.get(url).then(({data})=>{

            console.log(data)
            this.resturant = data

        })}
},
mounted(){
  const id = this.$route.params.id;
  this.getResturant('api/resturants/' +id);
}
}
</script>

<style>

</style>
