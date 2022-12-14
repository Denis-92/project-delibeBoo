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

                        <ol>
                                <li v-for="categoria in categorie" :key="categoria.id"><input type="checkbox" :value="categoria.id" @change="isCheck($event)" name="" id=""><h5>{{ categoria.name }}</h5></li>
                        </ol>

                </div>

            </div>
        </div>


        <div  class="result">

                <div class="card" v-for="ristorante, index in ristoranti" :key="index">
                    <button @click="showMenu(ristorante.slug)" class="bottone-menù"></button>


                    <div class="up">
                        <img class="restaurant-image" :src="`storage/${ristorante.image}`" alt="">
                    </div>
                    <div v-if="time === 'am'" class="center">
                        <p>Orari di apertura</p>
                        <p>{{ristorante.lunch_opening}} - {{ristorante.lunch_closing}}</p>

                    </div>
                    <div v-else class="center">
                        <p>Orari di apertura</p>
                        <p>{{ristorante.dinner_opening}} - {{ristorante.dinner_closing}}</p>

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


<script>
 export default {
    name:"MainResturants",
    data(){
        return{
            url:'api/resturants',
            ristoranti:undefined,
            categorie:undefined,
            time:'',
            check:[],
        }
    },

// -------------------------


    methods:{
        showMenu(slug){
            this.$router.push('/resturants/' +slug)
        },

// ------------------------------


        takeResturantsandCategory(url){
            axios.get(url).then(({data})=>{
                this.ristoranti=data.ristoranti
                this.categorie= data.categorie
                this.ristoranti.forEach(element => {
                    element.lunch_opening=element.lunch_opening.split(':')
                    let deleteElement= element.lunch_opening.pop();
                    element.lunch_opening = element.lunch_opening.toString();

                    element.lunch_closing=element.lunch_closing.split(':')
                     deleteElement= element.lunch_closing.pop();
                    element.lunch_closing = element.lunch_closing.toString();

                    element.dinner_opening=element.dinner_opening.split(':')
                     deleteElement= element.dinner_opening.pop();
                    element.dinner_opening = element.dinner_opening.toString();

                    element.dinner_closing=element.dinner_closing.split(':')
                     deleteElement= element.dinner_closing.pop();
                    element.dinner_closing = element.dinner_closing.toString();


                });
            })
        },
        show(url){
            axios.get(url).then(({data})=>{
                console.log(data)
                this.ristoranti= data
                this.ristoranti.forEach(element => {
                    element.lunch_opening=element.lunch_opening.split(':')
                    let deleteElement= element.lunch_opening.pop();
                    element.lunch_opening = element.lunch_opening.toString();

                    element.lunch_closing=element.lunch_closing.split(':')
                     deleteElement= element.lunch_closing.pop();
                    element.lunch_closing = element.lunch_closing.toString();

                    element.dinner_opening=element.dinner_opening.split(':')
                     deleteElement= element.dinner_opening.pop();
                    element.dinner_opening = element.dinner_opening.toString();

                    element.dinner_closing=element.dinner_closing.split(':')
                     deleteElement= element.dinner_closing.pop();
                    element.dinner_closing = element.dinner_closing.toString();


                });

            })
        },
        isCheck(event){
            if(!event.target.checked){
                let value = event.target.value
                this.check = this.check.filter((item)=>{
                    return item != value
                })
                if(this.check.length>0){
                    let url= 'api/resturantsfiltred/'+ this.check
                    this.show(url)
                }else{
                    this.takeResturantsandCategory(this.url)

                }

            }
            else{

                    let valuecheck = event.target.value
                    this.check.push(valuecheck)
                    valuecheck=''
                    if(this.check.length >0){
                    let url= 'api/resturantsfiltred/'+ this.check
                    this.show(url)
                }else{
                    this.takeResturantsandCategory(this.url)
                }

            }

        }
    },

    mounted(){
        console.log(this.check)
        this.takeResturantsandCategory(this.url)
        let data = new Date();
        let times = data.toLocaleTimeString('it-IT')
        console.log(times)
        if(times.includes('14, 15, 16, 17, 18, 19, 20,21,22,23')){
           this.time = 'pm'
        }else{
           this.time = 'am'
        };




         // ------------Script tendina categorie---------
         console.log("Finalmente il console log")
            let buttonCat = document.getElementById("Freccia-cat")
            let dropdownCat = document.getElementById("tendina-categorie")
            //let buttonRisto = document.getElementById("Freccia-risto")
            //let dropdownRisto = document.getElementById("tendina-ristoranti")

            buttonCat.addEventListener("click", function(){
                if (dropdownCat.style.display === "block") {
                    dropdownCat.style.display = "none";
                } else {
                    dropdownCat.style.display = "block";

                }
            })

            // ------------Script tendina ristoranti---------
            /*buttonRisto.addEventListener("click", function(){
                if (dropdownRisto.style.display === "block") {
                    dropdownRisto.style.display = "none";
                } else {
                    dropdownRisto.style.display = "block";
                }

            })*/
    },
}
</script>





<style scoped lang="scss">

@media screen and (max-width: 1200px) {
    .card{
        height: 230px !important;
    }
    .center{
        bottom: 30px !important;
    }
}



@media screen and (max-width: 1100px){
    .center{
        width: 45% !important;
        right: 15px !important;
    }
}


@media screen and (max-width: 1000px) {
    .card{
        height: 230px !important;
        width: 48% !important;
    }
}




@media screen and (max-width: 750px) {

h5{
    font-size: 0.9rem;
}

#sec-main{
    flex-direction: column !important;
    .result{
        width: 100% !important;
    }
    .filter{
        width: 100% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: flex-start !important;
        flex-direction: column !important;
        .container-filter{
            width: 90% !important;
            height: 100% !important;
            .categorie-solo{
                width: 100% !important;
                height: 10% !important;
                display: flex !important;
                justify-content: space-between !important;
                align-items: center !important;
                border-bottom: 1px solid rgb(219, 219, 219) !important;
                margin: 25px 0px;
            }
            #tendina-categorie{
                margin-top: 20px;
                ol{
                    display: flex !important;
                    list-style: none !important;
                    gap: 40px !important;
                    justify-content: flex-start !important;
                    flex-wrap: wrap;
                    li{
                        gap: 5px !important;
                         margin: 0px 0px !important;
                    }
                }

            }
        }
    }
}
}


@media screen and (min-width: 240px) and (max-width: 650px) {

   .card{
    width: 100% !important;
   }

}

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.restaurant-image{
    width: 100%;
    height: 100%;
}
#tendina-categorie{
    display: none;
    ol{
        list-style: none;
        margin: 0px 10px;
        li{
            margin: 20px 0px;
            display: flex;
            gap: 5px;
            width: 170px;
        }
    }
}
#tendina-ristoranti{
    display: none;
}

.bottone-menù{
     height: 100%;
     width: 100%;
     background-color: rgba(255, 255, 255, 0);
     border: none;
     position: absolute;
 }




#sec-main{
    width: 100%;
    // height: 1290px;
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
            height: 1300px;
            //  background-color: red;
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
        align-content: flex-start;
        gap: 10px;
        padding: 20px;
        // background-color: green;
        .card{
            width: 32%;
             height: 290px;
            // background-color: red;
            border: 10px;
            position: relative;

            .up{
                width: 100%;
                height: 220px;
                flex-grow: 1;
                // background-color: rgba(0, 255, 42, 0.521);
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































