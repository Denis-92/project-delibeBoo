<template>

<header>

<div class="Up">


    <div class="Sx">
        <img src="images/HeaderGuest/deliveroo-logo.svg" alt="">
    </div>
    <div class="Dx">
        <button>Collabora con noi</button>
        <button>Registrati o accedi</button>
        <button>Menù</button>
    </div>


</div>

<div class="Down">
    
    <div class="container-center">
        <h3>I piatti dei ristoranti che ami e la spesa, a domicilio</h3>
        <p>inserisci un indirizzo per scoprire le opzioni disponibili nella tua zona</p>


        <div class="barra">
            <div class="BSX"></div>
            <div class="centro"><input type="text" name="" id="" placeholder="Inserisci il tuo indirizzo completo"></div>
            <div class="BDX"><button>Cerca</button></div>
        </div>


        <div class="info-last">
            <p><a href="">Accedi</a> per visualizzare i tuoi indirizzi recenti.</p>
        </div>



    </div>
        <img id="foto1" src="images/HeaderGuest/busta.jpg" alt="">
        <img id="foto2" src="images/HeaderGuest/burger.jpg" alt="">
    </div>




</header>




</template>


<style scoped lang="scss">

*{
    font-family: 'Roboto', sans-serif;

}




header{
    width: 100%;
    height: 60vh;
    background-color: rgb(0, 0, 0);

    .Up{
        width: 100%;
         height: 10%;
        // background-color: aqua;
        display: flex;
        justify-content: space-around;
        .Sx{
            width: 47%;
            height: 100%;
            // background-color: red;
            display: flex;
            align-items: center;
            img{
            width: 120px;
            }
        }
        .Dx{
            width: 47%;
            height: 100%;
            // background-color: bisque;
            display: flex;
            align-items: center;
            justify-content: end;
            gap: 20px;
            
            button{
                border: none;
                border-radius: 4px;
                padding: 1% 2.2% 1% 2.2%;
                
            }
        }

    }

    .Down{
        width: 100%;
        height: 90%;
        //  background-color: rgb(0, 192, 206);
        display: flex;
        justify-content: center;
        z-index: 500;
        position: relative;
        #foto1{
            position: absolute;
            bottom: 0;
            left: 0;
            z-index: 100;
            height: 100%;
        }
        #foto2{
            position: absolute;
            bottom: 0;
            right: 0;
            z-index: 100;
            height: 100%;
        }
        .container-center{
            // width: 70%;
            // background-color: red;
             padding-top: 5%;
             padding-bottom: 5%;
             display: flex;
             justify-content: space-around;
            
             flex-direction: column;
             text-align: center;
             z-index: 500;

             

            h3{
                color: white;
                font-size: 2.5rem;
            }
            p{
                color: rgba(236, 236, 236, 0.822);
                font-size: 1.1rem;
            }
            a{
                color: #00ccbc;
            }


            .barra{
                width: 60%;
                height: 20%;
                // background-color: aquamarine;
                margin: 0 auto;
                display: flex;
                .BSX{
                    width: 10%;
                    height: 100%;
                    background-color: rgb(255, 255, 255);
                    border-radius: 30px 0px 0px 30px;
                }
                .centro{
                    flex-grow: 1;
                    background-color: blue;
                    input{
                        width: 100%;
                        height: 100%;
                        border: none;
                    }
                }
                .BDX{
                    width: 25%;
                    height: 100%;
                    background-color: rgb(255, 255, 255);
                    border-radius: 0px 30px 30px 0px;
                    display: flex;
                    align-items: center;
                    button{
                        width: 97%;
                        height: 90%;
                        border: none;
                        border-radius: 30px;
                        background-color: #00ccbc;
                        
                    }
                }
            }

            .info-last p,a{
                font-size: 0.9rem;
            }
        }
    }
}

</style>




<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
