<template>
    <section id="sec">
        <div class="container-offert">
            <img src="images/HeaderGuest/download.svg" alt="">
            <div class="offert-content">
                <h2>Menù in offerta: sconti <br> fino al 25%</h2>
                <h3>Perfetti per dare più gusto alla tua settimana, ordinare i piatti più amati da tutta la famiglia e fare una pausa da fornelli.</h3>
                <p>Si applicano spese di consegna e di servizio.
                    Offerta soggetta a disponibilità, solo per <br>
                    risotranti aderenti all'iniziativa. Si applicano termini e condizioni,
                    consultabili qui. <a href="">Termini e condizioni qui.</a></p>
            </div>
        </div>
    </section>
</template>


<style scoped lang="scss">
 #sec{
    width: 100%;
    height: 55vh;
    //  background-color: red;
    display: flex;
    justify-content: center;
    align-items: center;
    .container-offert{
        width: 100%;
        height: 90%;
        // background-color: aquamarine;
        position: relative;
        
        img{
            width: 100%;
            height: 100%;
        }
        .offert-content{
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
             width: 35%;
            text-align: center;
            //  background-color: burlywood;
            h2{
                font-weight: 800;
                color: white;
                font-size: 3.5rem;
            }
            h3{
                color: rgba(255, 255, 255, 0.815);
                margin: 30px 0px;
                font-size: 1.25rem;
            }
            p,a{
                color: white;
                font-size: 0.75rem;
            }
            a{
                text-decoration: underline;
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