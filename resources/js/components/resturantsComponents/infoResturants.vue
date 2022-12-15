<template>
<div class="main">
    <div>
        <img :src="`storage/${resturant.image}`" alt="">
    </div>

    <div class="title">
        <h5>{{ resturant.name }}</h5>
    </div>
</div>
</template>

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

<style lang="scss" scoped>
.main{
    position: relative;
}
.title{
    position: absolute;
    top: 50;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

}
h5{
    font-size: 100px;
    color: white;
    background-color: #a5caeb;
}
</style>
