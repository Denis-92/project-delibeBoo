
<template>




<section id="sec">
    <div class="container-principale">
        <div class="Sx">
            <img :src="`storage/${resturant.image}`" alt="">
        </div>
        <div class="Dx">
            <h5>{{ resturant.name }}</h5>
            
        </div>
    </div>
</section>





</template>

<style lang="scss" scoped>

@import url('https://fonts.googleapis.com/css2?family=Roboto=Roboto:wght@300;400;500&display=swap');

*{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    font-family: 'Roboto', sans-serif;

}

#sec{
    width: 100%;
    height: 30vh;
}
.container-principale{
    width: 90%;
    height: 100%;
    background-color: rgba(9, 255, 0, 0.411);

    margin: auto;
    display: flex;
    .Sx{

        height: 100%;
        background-color: aquamarine;
        img{
            max-height: 100%;
        }
    }
    .Dx{
        flex-grow: 1;
        height: 100%;
        background-color: aqua;
        h5{
            font-weight: 500;
        }
    }
}
</style>



<script>
export default {
    name: "infoResturants",
    props:{resturant:Object},
    data() {
        return {
        }
    },
}
</script>


