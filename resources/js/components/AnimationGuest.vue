<template>
    <section>


        <div class="container-animate">
            <div class="card-preview">
                <img src="images/HeaderGuest/Carrefour.png" alt="">
            </div>
            <!-- <div class="card-preview">
                <img src="images/HeaderGuest/ciambella-rosa.png" alt="">
            </div>
            <div class="card-preview">
                <img src="images/HeaderGuest/delhop.png" alt="">
            </div>
            <div class="card-preview">
                <img src="images/HeaderGuest/drinkB.png" alt="">
            </div>
            <div class="card-preview">
                <img src="images/HeaderGuest/gelato.png" alt="">
            </div>
            <div class="card-preview">
                <img src="images/HeaderGuest/king.png" alt="">
            </div>
            <div class="card-preview">
                <img src="images/HeaderGuest/Mc.png" alt="">
            </div>
            <div class="card-preview">
                <img src="images/HeaderGuest/megaSuperPanino.png" alt="">
            </div>
            <div class="card-preview">
                <img src="images/HeaderGuest/old-wild-west.png" alt="">
            </div>
            <div class="card-preview">
                <img src="images/HeaderGuest/patate.png" alt="">
            </div>
            <div class="card-preview">
                <img src="images/HeaderGuest/piatto.png" alt="">
            </div>
            <div class="card-preview">
                <img src="images/HeaderGuest/pizzaY.png" alt="">
            </div>
            <div class="card-preview">
                <img src="images/HeaderGuest/sushi-mini.png" alt="">
            </div>
            <div class="card-preview">
                <img src="images/HeaderGuest/sushiPlate.png" alt="">
            </div>
            <div class="card-preview">
                <img src="images/HeaderGuest/vegan.png" alt="">
            </div>
            <div class="card-preview">
                <img src="images/HeaderGuest/kfc.png" alt="">
            </div>
            <div class="card-preview">
                <img src="images/HeaderGuest/mega-busta.png" alt="">
            </div> -->
           
        </div>


    </section>
</template>
    
    
    <style lang="scss" scoped>
        .container-animate{
            width: 100%;
            height: 25vh;
            background-color: rgba(255, 0, 0, 0.521);
            position: relative;
            bottom: 50px;
            z-index: 800;
            display: flex;
            justify-content: start;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            .card-preview{
                // width: 10%;
                 height: 45%;
                background-color: rgb(124, 0, 196);
                img{
                    max-height: 100%;
                }
            }




        }

        .card-preview {
            position: relative;
            animation-name: example;
            animation-duration: 5s;  
            animation-fill-mode: forwards;
            animation-iteration-count: infinite;
        }

        @keyframes example {
            from {left: 0%;}
            to {left: 100%; background-color: blue;}
        }


    </style>
    
    
    
    





    <script>
        export default {
            mounted() {
                console.log('Component mounted.')
            }
        }
    </script>
    