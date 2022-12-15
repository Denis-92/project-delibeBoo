
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
    display: flex;
    align-items: center;
}
.container-principale{
    width: 90%;
    height: 80%;
    //  background-color: rgba(9, 255, 0, 0.411);

    margin: auto;
    display: flex;
    align-items: center;
    gap: 20px;
    .Sx{

        height: 100%;
        // background-color: aquamarine;
        img{
            max-height: 100%;
            border-radius: 9px;
        }
    }
    .Dx{
        flex-grow: 1;
        height: 95%;
        // background-color: aqua;
        h5{
            font-weight: 500;
            font-size: 2.2rem;
        }
    }
}
</style>



<script>
export default {
    name: "infoResturants",
    props:{resturant:Object},
    mounted(){
        console.log(this.resturant)
    }
}
</script>


