<template>
    <section id="sec-main">
        <div class="filter">
            <div class="container-filter">

                <!-- ------Categorie Titolo----- -->
                <div class="categorie-solo">
                    <h4>Categorie</h4>

                    <button id="Freccia-cat">
                        <img  src="images/ResturantImage/Freccia.png" alt="">
                    </button>
                    
                </div>

                 <!-- --------Categorie Tendina a scomparsa---------- -->
                <div id="tendina-categorie">
                    <div v-for="categoria in categorie" :key="categoria.id">                 
                        <ol >
                          <li>{{ categoria.name }}</li>
                         </ol> 
                    </div>
                </div>




                <!-- -------- ristoranti Titolo----- -->
                <div class="ristoranti-solo">
                    <h4>Ristoranti</h4>

                    <button id="Freccia-risto">
                        <img  src="images/ResturantImage/Freccia.png" alt="">
                    </button>
                </div>


                <!-- -----------ristoranti Tendina a scomparsa---------- -->
                <div id="tendina-ristoranti">
                    <div v-for="ristorante in ristoranti" :key="ristorante.id">                 
                        <ol >
                          <li>{{ ristorante.name }}</li>
                        </ol> 
                    </div>
                </div>


            </div>
        </div>


        <div class="result"></div>
    </section>
</template>

<!-- ------------------------------- -->

<script>
 export default {
    name:"MainResturants",
    data(){
        return{
            ristoranti:undefined,
            categorie:undefined
        }
    },


    methods:{
        takeResturantsandCategory(){
            axios.get('api/resturants').then(({data})=>{
                this.ristoranti=data.ristoranti
                this.categorie= data.categorie
                
                

            })

            // ------------Script tendina categorie---------
            console.log("Finalmente il console log")
            let buttonCat = document.getElementById("Freccia-cat")
            let dropdownCat = document.getElementById("tendina-categorie")


            let buttonRisto = document.getElementById("Freccia-risto")
            let dropdownRisto = document.getElementById("tendina-ristoranti")



            buttonCat.addEventListener("click", function(){
                if (dropdownCat.style.display === "block") {
                    dropdownCat.style.display = "none";
                } else {
                    dropdownCat.style.display = "block";
                }
                
            })

            buttonRisto.addEventListener("click", function(){
                if (dropdownRisto.style.display === "block") {
                    dropdownRisto.style.display = "none";
                } else {
                    dropdownRisto.style.display = "block";
                }
                
            })
            // ------------Script tendina categorie 2---------

        }
    },

    mounted(){
        this.takeResturantsandCategory()
    },
}  
</script>








<style scoped lang="scss">


#tendina-categorie{
    display: none;
}
#tendina-ristoranti{
    display: none;
}






#sec-main{
    width: 100%;
    height: 100vh;
    // background-color: rgba(255, 217, 0, 0.445);
    display: flex;

    .filter{
        width: 18%;
        height: 100%;
        // background-color: greenyellow;
        border-right: 1px solid rgb(221, 221, 221);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        .container-filter{
            width: 60%;
            height: 100%;
            // background-color: red;
            .categorie-solo{
                width: 100%;
                height: 10%;
                display: flex;
                justify-content: space-between;
                align-items: center;

                border-bottom: 1px solid rgb(219, 219, 219);
                img{
                    height: 15px;
                    transform: rotate(270deg);
                }
            }

            .ristoranti-solo{
                width: 100%;
                height: 10%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: 1px solid rgb(219, 219, 219);
                img{
                    height: 15px;
                    transform: rotate(270deg);
                }
            }



        }
    }

    .result{
        width: 82%;
        height: 100%;
        // background-color: green;
    }
}
</style>







