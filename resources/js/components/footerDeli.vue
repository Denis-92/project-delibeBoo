<template>
    <section id="cos">
        <div class="container-footer">
            <div class="colonne"></div>
            <div class="colonne"></div>
            <div class="colonne"></div>
            <div class="colonne"></div>
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