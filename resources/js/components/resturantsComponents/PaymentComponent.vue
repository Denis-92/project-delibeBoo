<template>


<div id="dropin-wrapper">
    <div class="container-principale" :class="show? 'd-flex': 'd-none'">

        <div class="container-content" >
           <div class="close">
            <button class="btn btn-outline-danger px-2" @click="closePayment()">X</button>
           </div>
            <h2>Inserisci i tuoi dati per completare l'ordine</h2>



            <form id="payment-form" >



<!-- ------------info untente--------- -->
              <div class="form-group">
                <div class="info-form">
                  <label for="name_on_card">Titolare</label>
                  <input type="text" class="form-control" id="name_on_card" name="name_on_card">



                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email">


                  <label for="phone">Cellulare</label>
                  <input type="text" class="form-control" id="phone" name="phone">

                  <label for="address">Indirizzo</label>
                  <input type="text" class="form-control" id="address" name="address">
                </div>
              </div>

<!-- ------------------------------------------------------------------ -->

                    <!-- ------------info card--------- -->

                    <div class="info-card" id="dropin-container">

                    </div>








                <!-- -altro -->
                    <router-link to="/checkout">
                        <button type="submit" class="btn btn-outline-success mb-2 mt-2 py-2"
                        id="submit-button">Completa il pagamento</button>
                        <div class="space">

                        </div>
                    </router-link>


            </form>
        </div>
    </div>
</div>
</template>



<style lang="scss" scoped>
*{
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}
.close{
    display: flex;
                        width: 89%;
                        justify-content: end;
                        padding-top: 15px;
}
input{
  background-color: white;
  border: 1px solid #000000a3;
  border-radius: 5px;
}

.space{
  width: 100px;
  height: 20px;

}
.container-principale{
  width: 100%;
  height: 100%;
  background-color: #0000008c;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  align-items: center;
  justify-content: center;
  .container-content{
    width: 35%;
    background: rgb(255 255 255);
    position: absolute;
    top: 10%;


    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: 18px;

    h2{
      padding: 40px 0px;
      font-size: 1.8rem;
      text-align: center;
    }
    #payment-form{
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 25px;
      width: 100%;
      .form-group{
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        // background-color: antiquewhite;
        .info-form{
          width: 70%;
        }
      }

      .info-card{
        // background: aquamarine;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 25px;
        #card-n{
          width: 70%;
          input{
            width: 100%;
          }
        }
        #secure-info{
          width: 100%;
          display: flex;
          justify-content: center;
          gap: 25px;
          .prova{
            display: flex;
            flex-direction: column;
            width: 33%;
          }
        }
      }
    }
  }
}


</style>














<script>
// Form pagamento
var button = document.querySelector('#submit-button');
braintree.dropin.create({
  // Insert your tokenization key here
  authorization: 'sandbox_243jssx7_62wm2bdchmxtqfp3',
  container: '#dropin-container'
}, function (createErr, instance) {
  button.addEventListener('click', function () {
    instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
      // When the user clicks on the 'Submit payment' button this code will send the
      // encrypted payment information in a variable called a payment method nonce
      $.ajax({
        type: 'POST',
        url: '/checkout',
        data: {'paymentMethodNonce': payload.nonce}
      }).done(function(result) {
        // Tear down the Drop-in UI
        instance.teardown(function (teardownErr) {
          if (teardownErr) {
            console.error('Could not tear down Drop-in UI!');
          } else {
            console.info('Drop-in UI has been torn down!');
            // Remove the 'Submit payment' button
            $('#submit-button').remove();
          }
        });
        if (result.success) {
          $('#checkout-message').html('<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>');
        } else {
          console.log(result);
          $('#checkout-message').html('<h1>Error</h1><p>Check your console.</p>');
        }
      });
    });
  });
});

export default {
    name: 'PaymentComponent',
    props:{
        show:Boolean,
        piatti:Array
    },
    methods:{
        piattishow(){
            console.log(this.piatti)
        },
        closePayment(){
            this.show=false
            this.$emit('close', this.show)
        }
    },

}
</script>
