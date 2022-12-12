<template>

<body>
    <div>

        <headerResturants />
        <MainResturants />
        <FooterResturants />
        
    </div>
</body>
</template>



<script>

import headerResturants from '../components/resturantsComponents/headerResturants.vue';
import MainResturants from '../components/resturantsComponents/MainResturants.vue';
import FooterResturants from '../components/resturantsComponents/FooterResturants.vue';




export default {
      name: 'app',
      components: { headerResturants, MainResturants, FooterResturants },

      }
</script>




<style>

</style>
