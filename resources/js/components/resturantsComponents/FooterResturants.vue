<template>
    <section id="cos">
        <div class="container-footer">
            <div class="colonne">
                <div class="prova">
                    <h4>Scopri Deliveroo</h4>
                     <ol>
                        <li><a href="https://corporate.deliveroo.co.uk/">Investitori</a></li>
                        <li><a href="https://deliveroo.it/it/about-us">Chi siamo</a></li>
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

        <!-- -----------Loghi section------------- -->
        <!-- <div class="loghi-box">
            <div class="twitter">
                <svg width="256px" height="209px" viewBox="0 0 256 209" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid">
                    <g>
                    <path d="M256,25.4500259 C246.580841,29.6272672 236.458451,32.4504868 225.834156,33.7202333 C236.678503,27.2198053 245.00583,16.9269929 248.927437,4.66307685 C238.779765,10.6812633 227.539325,15.0523376 215.57599,17.408298 C205.994835,7.2006971 192.34506,0.822 177.239197,0.822 C148.232605,0.822 124.716076,24.3375931 124.716076,53.3423116 C124.716076,57.4586875 125.181462,61.4673784 126.076652,65.3112644 C82.4258385,63.1210453 43.7257252,42.211429 17.821398,10.4359288 C13.3005011,18.1929938 10.710443,27.2151234 10.710443,36.8402889 C10.710443,55.061526 19.9835254,71.1374907 34.0762135,80.5557137 C25.4660961,80.2832239 17.3681846,77.9207088 10.2862577,73.9869292 C10.2825122,74.2060448 10.2825122,74.4260967 10.2825122,74.647085 C10.2825122,100.094453 28.3867003,121.322443 52.413563,126.14673 C48.0059695,127.347184 43.3661509,127.988612 38.5755734,127.988612 C35.1914554,127.988612 31.9009766,127.659938 28.694773,127.046602 C35.3777973,147.913145 54.7742053,163.097665 77.7569918,163.52185 C59.7820257,177.607983 37.1354036,186.004604 12.5289147,186.004604 C8.28987161,186.004604 4.10888474,185.75646 0,185.271409 C23.2431033,200.173139 50.8507261,208.867532 80.5109185,208.867532 C177.116529,208.867532 229.943977,128.836982 229.943977,59.4326002 C229.943977,57.1552968 229.893412,54.8901664 229.792282,52.6381454 C240.053257,45.2331635 248.958338,35.9825545 256,25.4500259" fill="#55acee"></path>
                    </g>
                </svg>
            </div>
        </div> -->


    </section>
</template>


<style scoped lang="scss">


@media screen and (max-width: 1600px) {
    .container-footer{
        width: 80% !important;
    }
}



@media screen and (max-width: 1200px){
    .container-footer{
        width: 90% !important;
    }
}







@media screen and (max-width: 950px) {
    #cos{
        height: 90vh !important;
        .container-footer{
            width: 90% !important;
            flex-wrap: wrap;
            gap: 15px;
            .colonne{
                width: 48% !important;
                height: auto !important;
            }
        }
    }
}



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
        .twitter{
            width: 15px;
            height: 15px;
            background-color: chocolate;
            svg{
                max-width: 100%;
                max-height: 100%;
            }
        }
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
        console.log('js Ok')
    }
}
</script>