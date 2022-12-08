<template>
    <section id="sec">
        <div class="container-map">
            <div class="Sx">
                <div class="info">
                    <h1>Segui gli ordini passo passo</h1>
                    <p>I piatti e i prodotti che ami, consegnati in pochissimo tempo.
                        Vedrai quando il rider ha ritirato l'ordine, che potrai seguire passo passo,
                        e riceverai una notifica quando sarà quasi da te.
                    </p>
                    <button>App store</button>
                    <button>Google Play</button>
                </div>
            </div>
            <div class="Dx">
                <div class="map">
                    <img src="images/HeaderGuest/mappa.png" alt="">
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped lang="scss">

#sec{
    width: 100%;
    height: 50vh;
    // background-color: red;
    display: flex;
    justify-content: center;
    align-items: center;
    .container-map{
        width: 75%;
        height: 80%;
        border-radius: 15px;
        box-shadow: 0px 5px 30px -10px rgb(0 0 0 / 70%);
        // background-color: aliceblue;
        display: flex;
        .Sx{
            width: 40%;
            height: 100%;
            // background-color: rgb(0, 255, 0);
            display: flex;
            align-items: center;
            .info{
                width: 75%;
                margin-left: 40px;
                // background-color: aqua;
                
                h1{
                    font-weight: 800;
                }
                p{
                    font-size: 1.1rem;
                    color: rgba(0, 0, 0, 0.521);
                    margin: 25px 0px 50px 0px;
                }
            }
        }
        .Dx{
            width: 60%;
            height: 100%;
            // background-color: rgb(0, 138, 0);
            .map{
                width: 100%;
                height: 100%;
                img{
                    height: 100%;
                    width: 100%;
                    border-radius: 15px;
                }
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