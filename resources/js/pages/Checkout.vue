<template>
    <div>
        <h2 class="ml-5 mt-5">Pagamento avvenuto con successo</h2>
        <button type="button" @click='returnResturant()' class="btn btn-outline-info ml-5">Torna alla lista ristoranti</button>
    </div>
</template>

<script>
export default{
    name: 'Checkout',

    methods: {
        returnResturant(){
            window.location.href='/#/resturants'
        }
    }
}

</script>

<style lang="scss" scoped>


</style>
