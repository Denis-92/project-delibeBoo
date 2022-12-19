<template>


    <div id="sec-main" v-if='plate.length > 0'>
        <h2 id="order">Il tuo ordine</h2>

        <div class="mini-conteiner">

            <div v-for="element, index in plate" :key="index">

                <div class="content">


                    <div class="sx">
                        <h5>{{ element.piatto.name }}</h5>
                    </div>
                    <div class="dx">
                        <div>
                            <button type="button" class="btn btn-outline-info mr-2" @click="remove(index)"
                                v-if="element.counter == 1 ? '' : 'disabled'">-</button>
                            <span>{{ element.counter }}</span>
                            <button type="button" class="btn btn-outline-info ml-2" @click="add(index)">+</button>
                        </div>
                        <h5>{{ element.totalPrice }}€</h5>
                    </div>
                    <button type="button" class="btn btn-outline-danger ml-4 mb-2"
                        @click="plateToRemove(index)">Rimuovi</button>
                </div>
            </div>
            <h4>Totale ordine: {{ total }} €</h4>
        </div>

        <router-link  id="cart" type="button" class="btn btn-outline-info" :to="{ name: 'cart', params: { plates: plateToadd } }">Vai al Pagamento</router-link>

    </div>



</template>


<script>
export default {
    name: 'OrderComponent',
    data() {
        return {
            plate: [],
            platestorage: undefined
        }
    },
    props: {
        plateToadd: Array
    },
    computed: {
        total() {
            let sum = 0;
            for (let i = 0; i < this.plate.length; i++) {
                sum += (this.plate[i].piatto.price * this.plate[i].counter);
            }
            return sum;
        },
    },
    methods: {
        add(index) {
            this.plateToadd[index].counter = this.plateToadd[index].counter + 1
            let price = this.plateToadd[index].counter * this.plateToadd[index].piatto.price
            this.plateToadd[index].totalPrice = (Math.round(price * 100) / 100).toFixed(2);
        },
        remove(index) {
            this.plateToadd[index].counter = this.plateToadd[index].counter - 1
            let price = this.plateToadd[index].counter * this.plateToadd[index].piatto.price
            this.plateToadd[index].totalPrice = (Math.round(price * 100) / 100).toFixed(2);
        },
        plateToRemove(i) {
            this.plate.forEach((element, index) => {
                if (index == i) {
                    this.plate.splice(index, 1);
                }
            });
            console.log(this.plate)
        }
    },
    mounted() {
        this.plate = this.plateToadd


        this.platestorage = JSON.parse(localStorage.getItem('plates'));
        console.log('storage', this.platestorage)
        if (this.platestorage.length > 0) {
            this.platestorage.forEach(element => {
                console.log('element', element)
                this.plate.push(element)
            });
            console.log('push')
        }



    },
    updated() {
        localStorage.setItem('plates', JSON.stringify(this.plate))
    }
}
</script>

<style scoped lang="scss">
#order {
    margin-left: 25px;
    margin-top: 15px;
}

#cart {
    margin-left: 25px;
}

#sec-main {
    width: 35%;
    min-height: 300px;
    height: 100%;
    background-color: rgb(255 255 255 / 56%);
    display: flex;
    gap: 10px;
    flex-direction: column;
    align-items: flex-start;
    border-radius: 7px;
    border: 1px solid #00000012;
    box-shadow: #0000000a -4px 5px 9px 0px;


    margin-right: 30px;
    margin-top: 5%;

    .mini-conteiner {
        width: 90%;
        height: 100%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        gap: 20px;

        .content {
            width: 100%;
            height: 100%;
            // background-color: rgba(43, 226, 150, 0.377);
            display: flex;
            align-items: center;

            .sx {
                width: 30%;
                height: 100%;
                // background-color: burlywood;
            }

            .dx {
                width: 70%;
                height: 100%;
                // background-color: rgb(222, 135, 210);
                display: flex;
                justify-content: flex-end;
                gap: 15px;
            }
        }
    }
}
</style>
