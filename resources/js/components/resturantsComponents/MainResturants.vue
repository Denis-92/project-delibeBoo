<template>
    <section id="sec-main">
        <div class="filter">
            <div class="container-filter">
                <div class="categorie-solo">
                    <h4>Categorie</h4>



                    <button id="Freccia">
                        <img  src="images/ResturantImage/Freccia.png" alt="">
                    </button>
                    
                </div>



                <div id="tendina">
                    <div v-for="categoria in categorie" :key="categoria.id">                 
                        <ol >
                          <li>{{ categoria.name }}</li>
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
            console.log("Finalmente il console log")
            let button = document.getElementById("Freccia")
            let dropdown = document.getElementById("tendina")

            button.addEventListener("click", function(){
                if (dropdown.style.display === "block") {
                    dropdown.style.display = "none";
                } else {
                    dropdown.style.display = "block";
                }
                
            })
        }
    },

    mounted(){
        this.takeResturantsandCategory()
    },
}  
</script>








<style scoped lang="scss">


#tendina{
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



        }
    }

    .result{
        width: 82%;
        height: 100%;
        // background-color: green;
    }
}
</style>







