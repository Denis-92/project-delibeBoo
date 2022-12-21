<template>
    <div class="container-principale">
        <div class="container-content">
            <h2>Inserisci i tuoi dati per completare l'ordine</h2>



            <form id="payment-form">


<!-- ------------info card--------- -->

              <div class="info-card">
                    <div id="card-n">
                        <label for="cc_number">Numero della carta</label>
                        <input type="text" class="form-group" id="card-number">
                    </div>

                    <div id="secure-info">

                        <div class="prova">
                          <label for="expiry">Scadenza</label> 
                          <input type="text" name="Scadenza" id="">
                        </div>

                        <div class="prova">
                          <label for="cvv">CVV</label> 
                          <input type="number" name="CVV" id="">
                        </div>


                    </div>
              </div>


<!-- ------------info untente--------- -->
              
                <div class="form-group">

                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email">
                

                
                    <label for="name_on_card">Titolare</label>
                    <input type="text" class="form-control" id="name_on_card" name="name_on_card">
                

                
                                  
                     <label for="address">Indirizzo</label>
                     <input type="text" class="form-control" id="address" name="address">

                     <label for="phone">Cellulare</label>
                     <input type="text" class="form-control" id="phone" name="phone">
                      
                </div>







                    <router-link to="/checkout">
                        <button type="button" class="btn btn-outline-success mb-2 mt-2"
                        id="submit-button">Completa il pagamento</button>
                    </router-link>
                    <!-- / Form pagamento -->

            </form>
        </div>
    </div>
</template>



<style lang="scss" scoped>
*{
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}


.container-principale{
  width: 50%;
  height: 100%;
  background-color: #00f8ff8c;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  display: flex;
  align-items: center;
  justify-content: center;
  .container-content{
    width: 80%;
    background: red;
    h2{
      padding: 40px 0px;
      font-size: 2.2rem;
    }
    #payment-form{
      display: flex;
      flex-direction: column;
      align-items: center;
      .form-group{
        width: 80%;
        display: flex;
        flex-wrap: wrap;
      }

      .info-card{
        background: aquamarine;
        width: 80%;
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
}
</script>
