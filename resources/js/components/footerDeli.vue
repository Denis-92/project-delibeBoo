<template>
    <section id="cos">
        <div class="container-footer">
            <div class="colonne">
                <h4>Scopri Deliveroo</h4>
                <ol>
                    <li>Investitori</li>
                    <li>Chi siamo</li>
                    <li>Porta via</li>
                    <li>di più</li>
                    <li>Sala stampa</li>
                    <li>Blog di ingegneria</li>
                    <li>Blog di progettazione </li>
                    <li>Carte regalo</li>
                    <li>Carriere</li>
                    <li>Iscrizione al ristorante</li>
                    <li>Diventa un Ristoratore</li>
                </ol>
            </div>
            <div class="colonne">
                <h4>Legale</h4>
                 <ol>
                    <li>Termini e Condizioni</li>
                    <li>Riservatezza</li>
                    <li>Biscotti</li>
                    <li>Dichiarazione sulla schiavitù moderna</li>
                    <li>Strategia fiscale</li>
                    <li>Sezione 172 Dichiarazione</li>
                 </ol>
            </div>
            <div class="colonne">
                <h4>Aiuto</h4>
                 <ol>
                    <li>Contatto</li>
                    <li>Domande frequenti</li>
                    <li>Cucine</li>
                    <li>Marche</li>
                 </ol>
            </div>
            <div class="colonne">
                <h4>Porta Deliverro con te</h4>
                <button>App Store</button> <br>
                <button>Google Play</button>
            </div>
        </div>
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
    .container-footer{
        width: 60%;
        height: 90%;
        background-color: #7a7e7e;
        display: flex;
        justify-content: space-between;
        .colonne{
            width: 24%;
            height: 90%;
            background-color: #434848;
            ol li{
                color: white;
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