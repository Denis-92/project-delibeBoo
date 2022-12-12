<template>

<body>
    <div>


        <HeaderGuest />
        <AnimationGuest />
        <FixAnimat />
        <MainMap />
        <Offert />
        <footerDeli />


    </div>
</body>

  </template>

  <script>

  import HeaderGuest from '../components/HeaderGuest.vue';
  import AnimationGuest from '../components/AnimationGuest.vue';
  import FixAnimat from '../components/FixAnimat.vue';
  import MainMap from '../components/MainMap.vue';
  import Offert from '../components/Offert.vue';
  import footerDeli from '../components/footerDeli.vue';



  export default {
      name: 'app',
      components: { HeaderGuest, AnimationGuest, FixAnimat, MainMap, Offert, footerDeli },

      }
  </script>

  <style scoped lang="scss">
  *{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
}



  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap');


  </style>
