<template>
    <div>
        <div v-for="ristorante, index in ristoranti" :key="index">

            <div>
                <img class="restaurant-image" :src="`storage/${ristorante.image}`" alt="">
            </div>

            <div>
                <div>
                    <h5>{{ ristorante.name }}</h5>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "infoResturants",
    data() {
        return {
            url: 'api/resturants',
            ristoranti: undefined,
        }
    },
}
</script>

<style lang="scss" scoped>

</style>
