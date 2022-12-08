<template>
    <section>


        <div class="container-animate">

            <div class="animate-1">

                <img src="Images/HeaderGuest/Carrefour.png" alt=""> 
                <img src="Images/HeaderGuest/gelato.png" alt="">
                <img src="Images/HeaderGuest/ciambella-rosa.png" alt="">
                <img src="Images/HeaderGuest/delhop.png" alt="">
                <img src="Images/HeaderGuest/mega-busta.png" alt="">
                <img src="Images/HeaderGuest/kfc.png" alt="">
                <img src="Images/HeaderGuest/king.png" alt="">
                <img src="Images/HeaderGuest/Mc.png" alt="">
                <img src="Images/HeaderGuest/megaSuperPanino.png" alt="">
                <img src="Images/HeaderGuest/old-wild-west.png" alt="">
                <img src="Images/HeaderGuest/patate.png" alt="">
                <img src="Images/HeaderGuest/pizzaY.png" alt="">
                <img src="Images/HeaderGuest/vegan.png" alt="">
                <img src="Images/HeaderGuest/piatto.png" alt="">

                <!-- ---------------lop2------------------- -->

                <img src="Images/HeaderGuest/Carrefour.png" alt=""> 
                <img src="Images/HeaderGuest/gelato.png" alt="">
                <img src="Images/HeaderGuest/ciambella-rosa.png" alt="">
                <img src="Images/HeaderGuest/delhop.png" alt="">
                <img src="Images/HeaderGuest/mega-busta.png" alt="">
                <img src="Images/HeaderGuest/kfc.png" alt="">
                <img src="Images/HeaderGuest/king.png" alt="">
                <img src="Images/HeaderGuest/Mc.png" alt="">
                <img src="Images/HeaderGuest/megaSuperPanino.png" alt="">
                <img src="Images/HeaderGuest/old-wild-west.png" alt="">
                <img src="Images/HeaderGuest/patate.png" alt="">
                <img src="Images/HeaderGuest/pizzaY.png" alt="">
                <img src="Images/HeaderGuest/vegan.png" alt="">
                <img src="Images/HeaderGuest/piatto.png" alt="">
                
                

                <!-- ---------------------------------------------------- -->



            </div>

            <div class="animate-2">
                <img src="Images/HeaderGuest/piatto.png" alt="">
                <img src="Images/HeaderGuest/vegan.png" alt="">s
                <img src="Images/HeaderGuest/pizzaY.png" alt="">
                <img src="Images/HeaderGuest/patate.png" alt="">
                <img src="Images/HeaderGuest/old-wild-west.png" alt="">
                <img src="Images/HeaderGuest/megaSuperPanino.png" alt="">
                <img src="Images/HeaderGuest/Mc.png" alt="">
                <img src="Images/HeaderGuest/king.png" alt="">
                <img src="Images/HeaderGuest/kfc.png" alt="">
                <img src="Images/HeaderGuest/mega-busta.png" alt="">
                <img src="Images/HeaderGuest/delhop.png" alt="">
                <img src="Images/HeaderGuest/ciambella-rosa.png" alt="">
                <img src="Images/HeaderGuest/gelato.png" alt="">
                <img src="Images/HeaderGuest/Carrefour.png" alt=""> 


                <img src="Images/HeaderGuest/piatto.png" alt="">
                <img src="Images/HeaderGuest/vegan.png" alt="">
                <img src="Images/HeaderGuest/pizzaY.png" alt="">
                <img src="Images/HeaderGuest/patate.png" alt="">
                <img src="Images/HeaderGuest/old-wild-west.png" alt="">
                <img src="Images/HeaderGuest/megaSuperPanino.png" alt="">
                <img src="Images/HeaderGuest/Mc.png" alt="">
                <img src="Images/HeaderGuest/king.png" alt="">
                <img src="Images/HeaderGuest/kfc.png" alt="">
                <img src="Images/HeaderGuest/mega-busta.png" alt="">
                <img src="Images/HeaderGuest/delhop.png" alt="">
                <img src="Images/HeaderGuest/ciambella-rosa.png" alt="">
                <img src="Images/HeaderGuest/gelato.png" alt="">
                <img src="Images/HeaderGuest/Carrefour.png" alt=""> 
            </div>

        </div>


    </section>
</template>
    
    
<style lang="scss" scoped>






.container-animate{
    width: 100%;
    height: 30vh;
    // background-color: rgba(0, 255, 0, 0.603);
    position: absolute;
    top: 52%;
    z-index: 800;
    overflow-x: hidden;
    .animate-1{
        display: flex;
        gap: 25px;
        justify-content: center;
        img{
            max-height: 130px;
            border-radius: 12px;
        }
    }


    .animate-2{
        display: flex;
        gap: 25px;
        justify-content: center;
        position: absolute;
        bottom: 0;
        left: -50%;
        img{
            max-height: 130px;
            border-radius: 12px;
        }
    }
}

.animate-1 > img {

  position: relative;
  animation-name: slider;
  animation-duration: 35s;
  animation-timing-function: ease;
  animation-iteration-count: infinite;
  animation-direction: alternate;  
}


.animate-2 > img {

position: relative;
animation-name: slider;
animation-duration: 35s;
animation-timing-function: ease;
animation-iteration-count: infinite;
animation-direction: alternate;  
}

@keyframes slider {
  0%   {right:0px; top:0px;}
  100%  {right:1200px; top:0px;}

}

</style>
    
    
    
    





    <script>
        export default {
            mounted() {
                console.log('Component mounted.')
            }
        }
    </script>
    