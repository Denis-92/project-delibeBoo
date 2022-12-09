<template>
    <section id="cos">
        <div class="container-footer">
            <div class="colonne">
                <div class="prova">
                    <h4>Scopri Deliveroo</h4>
                     <ol>
                        <li><a href="">Investitori</a></li>
                        <li><a href="">Chi siamo</a></li>
                        <li><a href="">Porta via</a></li>
                        <li><a href="">di più</a></li>
                        <li><a href="">Sala stampa</a></li>
                        <li><a href="">Blog di ingegneria</a></li>
                        <li><a href="">Blog di progettazione</a></li>
                        <li><a href="">Carte regalo</a></li>
                        <li><a href="">Carriere</a></li>
                        <li><a href="">Iscrizione al ristorante</a></li>
                        <li><a href="">Diventa un Ristoratore</a></li>
                     </ol>
                </div>
            </div>
            <div class="colonne">
                <div class="prova">
                    <h4>Legale</h4>
                     <ol>
                        <li><a href="">Termini e Condizioni</a></li>
                        <li><a href="">Riservatezza</a></li>
                        <li><a href="">Biscotti</a></li>
                        <li><a href="">Dichiarazione sulla schiavitù moderna</a></li>
                        <li><a href="">Strategia fiscale</a></li>
                        <li><a href="">Sezione 172 Dichiarazione</a></li>
                     </ol>
                </div>
                
            </div>
            <div class="colonne">
                <div class="prova">
                    <h4>Aiuto</h4>
                     <ol>
                        <li><a href="">Contatto</a></li>
                        <li><a href="">Domande frequenti</a></li>
                        <li><a href="">Cucine</a></li>
                        <li><a href="">Marche</a></li>
                     </ol>
                </div>
                
            </div>
            <div class="colonne">
                <div class="prova">
                  <h4>Porta Deliverro con te</h4>
                  <button>App Store</button> <br>
                  <button>Google Play</button>
                </div>

            </div>            
        </div>

        <div class="loghi-box"></div>
    </section>
</template>


<style scoped lang="scss">
#cos{
    width: 100%;
    height: 50vh;
    background-color: #2e3333;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

    .loghi-box{
        width: 60%;
        height: 10%;
        background-color: red;
    }
    .container-footer{
        width: 60%;
        height: 80%;
        // background-color: #7a7e7e;
        display: flex;
        justify-content: space-between;
        .logo{
            width: 15px;
            height: 15px;
            svg{
                max-height: 100%;
            }
        }
        .colonne{
            width: 24%;
            height: 100%;
            background-color: #434848;
            display: flex;
            align-items: center;
            border-radius: 5px;
            .prova{
                width: 100%;
                height: 90%;
                // background-color: red;
            }

            h4{
                margin-left: 38px;
                color: white;
                font-weight: 700;
            }
            ol{
                list-style: none;
                li{
                    color: white;
                    padding: 2px 0px;
                    a{
                        color: white;
                    }
                    a:hover{
                        color: #00b8a9;
                        text-decoration: none;
                    }
                }
            }
            button{
                margin-left: 38px;
                margin-bottom: 10px;
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