<template>
    <section id="sec-header">
        <div class="Sx"><img src="images/DelLogo.svg" alt="" id="element"></div>
        <div class="center">
            <input id="CercaCibo" type="text" name="" placeholder="Ristoranti, Piatti">
        </div>
        <div class="Dx">
            <button>Registrati o Accedi</button>
            <button>Carrello</button>
        </div>
    </section>
</template>

<style scoped lang="scss">


@media screen and (max-width: 650px) {

    .Sx{

        width: 0% !important;
        img{
            display: none;
        }
    }

    .Dx{
        width: 0% !important;
        button{
            display: none;
        }
    }

    .center{
        input{
            width: 100% !important;
        }
    }
    
}



#sec-header{
    width: 100%;
    height: 8vh;
    border-bottom: 1px solid #ebebeb;
    border-top: 1px solid #ebebeb;
    display: flex;
    .Sx{
        width: 26%;
        height: 100%;
        // background-color: blue;
        display: flex;
        align-items: center;
        margin-left: 40px;
        img{
            max-height: 45%;
        }
    }
    .center{
        flex-grow: 1;
        // background-color: rgb(0, 225, 255);
        display: flex;
        align-items: center;
        
        input{
            width: 77%;
            height: 70%;
            background-color: #f1f1f1;
            border: 1px solid #e8ebeb;
            border-radius: 6px;
        }
        input:focus{
            outline: none;
        }
    }
    .Dx{
        width: 26%;
        height: 100%;
        // background-color: blue;
        margin-right: 40px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 15px;
        button{
            border: none;
            padding: 7px 15px;
            background-color: white;
            border: 1px solid #e9e9e9;
            border-radius: 6px;
        }
    }
}
</style>


<script>
 export default {
            mounted() {
                let imgElement = document.getElementById('element')
                imgElement.onclick = function(){
                    window.location = "/";

                }
                }
            }
</script>