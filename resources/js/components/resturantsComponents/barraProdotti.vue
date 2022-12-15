<template>
    <section id="sec">
        <div class="container-a">
            <a href="">Prova1</a>
            <a href="">Prova2</a>
            <a href="">Prova3</a>
            <a href="">Prova4</a>
            <a href="">Prova5</a>
            <a href="">Prova6</a>
            <a href="">Prova7</a>
            <a href="">Prova8</a>
            <a href="">Prova9</a>
        </div>
    </section>
</template>


<style scoped lang="scss">
#sec{
    width: 100%;
    height: 10vh;
    // background-color: red;
    display: flex;
    align-items: center;
    justify-content: center;
    border-top: 1px solid #00000014;
    border-bottom: 1px solid #00000014;
    
    .container-a{
        width: 90%;
        /* height: 70%; */
        // background-color: yellow;
        display: flex;
        gap: 80px;
        justify-content: center;
    }
}
</style>




<script>
export default {
    name: "barraProdotti",
}
</script>