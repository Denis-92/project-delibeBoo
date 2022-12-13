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
                          <li><input type="checkbox" name="" id="">{{ categoria.name }}</li>
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
                          <li><input type="checkbox" name="" id="">{{ ristorante.name }}</li>
                        </ol> 
                    </div>
                </div>

            </div>
        </div>


        <div class="result">


           
                <div class="card" v-for="ristorante in ristoranti" :key="ristorante.id">
                    <div class="up">
                        Foto
                    </div>
                    <div class="center">
                        <p>Orari di apertura</p>
                        <p>{{ristorante.lunch_opening}}{{ristorante.lunch_closing}}</p>
                        <div class="blocco1"><h3>-</h3></div>
                        <div class="blocco2"></div>
                    </div>
                    <div class="down">
                        <div class="info-down">
                            <h5>{{ristorante.name}}</h5>
                        </div>
                    </div>
                </div>
            


        </div>
    </section>
</template>

<!-- ------------------------------- -->

<style scoped lang="scss">
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

#tendina-categorie{
    display: none;
}
#tendina-ristoranti{
    display: none;
}

.blocco1{
    width: 20px;
    height: 15px;
    background-color: white;
    position: absolute;
    bottom: 11px;
    right: 75px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.blocco2{
    width: 22px;
    height: 15px;
    background-color: white;
    position: absolute;
    bottom: 11px;
    right: 15px;
}




#sec-main{
    width: 100%;
    // height: 100vh;
    // background-color: rgba(255, 217, 0, 0.445);
    display: flex;

    .filter{
        width: 18%;
        // height: 100%;
        // background-color: greenyellow;
        // border-right: 1px solid rgb(221, 221, 221);
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
                button{
                    border: none;
                }
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
                button{
                    border: none;
                }
                img{
                    height: 15px;
                    transform: rotate(270deg);
                }
            }



        }
    }

    .result{
        width: 82%;
        // height: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 10px;
        padding: 20px;
        // background-color: green;
        .card{
            width: 25%;
             height: 290px;
            // background-color: red;
            border: 10px;
            
            .up{
                width: 100%;
                flex-grow: 1;
                background-color: rgba(0, 255, 42, 0.521);
                border-radius: 10px 10px 0px 0px;
                border: 1px solid #00000017;
                border-bottom: none;
            }
            .center{
                width: 40%;
                height: 20%;
                // background-color: red;
                position: absolute;
                bottom: 46px;
                right: 30px;
                border-radius: 40px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                border: 1px solid #00000008;
                background-color: white;
                p{
                    font-weight: 800;
                }
            }
            .down{
                width: 100%;
                height: 25%;
                // background-color: blueviolet;
                border-radius: 0px 0px 10px 10px;
                border: 1px solid #00000017;
                border-top: none;
                .info-down{
                    width: 50%;
                    height: 100%;
                    // background-color: rgba(255, 0, 0, 0.308);
                    h5{
                        font-weight: 800;
                        padding: 5px 10px;
                    }
                }
            }
        }
    }
}
</style>















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

             // ------------Script tendina ristoranti---------
            buttonRisto.addEventListener("click", function(){
                if (dropdownRisto.style.display === "block") {
                    dropdownRisto.style.display = "none";
                } else {
                    dropdownRisto.style.display = "block";
                }
                
            })
           

        }
    },

    mounted(){
        this.takeResturantsandCategory()
    },
}  
</script>
















