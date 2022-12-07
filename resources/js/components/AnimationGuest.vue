<template>
    <section>
        <div class="container-animate">
            <div class="card-preview"></div>
            <div class="card-preview"></div>
            <div class="card-preview"></div>
            <div class="card-preview"></div>
            <div class="card-preview"></div>
            <div class="card-preview"></div>
            <div class="card-preview"></div>
            <div class="card-preview"></div>
            <div class="card-preview"></div>
            <div class="card-preview"></div>
            <div class="card-preview"></div>
            <div class="card-preview"></div>
            <div class="card-preview"></div>
            <div class="card-preview"></div>
            <div class="card-preview"></div>
            <div class="card-preview"></div>
            <div class="card-preview"></div>
            <div class="card-preview"></div>


        </div>
    </section>
</template>
    
    
    <style lang="scss" scoped>
        .container-animate{
            width: 100%;
            height: 25vh;
            background-color: rgba(255, 0, 0, 0.521);
            position: relative;
            bottom: 50px;
            z-index: 800;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            .card-preview{
                width: 10%;
                 height: 45%;
                background-color: rgb(124, 0, 196);
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
    