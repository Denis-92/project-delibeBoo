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
            <div class="centro">w</div>
            <div class="BDX"></div>
        </div>


        <div class="info-last">
            <p><a href="">Accedi</a> per visualizzare i tuoi indirizzi recenti.</p>
        </div>
    </div>
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
        background-color: aquamarine;
        display: flex;
        justify-content: center;
        .container-center{
            width: 70%;
            background-color: red;
             padding-top: 5%;
             padding-bottom: 5%;
            display: flex;
            justify-content: space-around;
            
            flex-direction: column;
            text-align: center;

            h3{
                color: white;
                font-size: 2.5rem;
            }
            p{
                color: rgba(236, 236, 236, 0.822);
                font-size: 1.1rem;
            }
            a{
                color: rgb(0, 197, 154);
            }

            .barra{
                width: 50%;
                height: 20%;
                background-color: aquamarine;
                margin: 0 auto;
                display: flex;
                .BSX{
                    width: 10%;
                    height: 100%;
                    background-color: beige;
                }
                .centro{
                    flex-grow: 1;
                    background-color: blue;
                }
                .BDX{
                    width: 10%;
                    height: 100%;
                    background-color: beige;
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
