<template>
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <h1>Payment Form</h1>
            <div class="spacer"></div>

            <form id="payment-form">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email">
                </div>

                <div class="form-group">
                    <label for="name_on_card">Name on Card</label>
                    <input type="text" class="form-control" id="name_on_card" name="name_on_card">
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="amount"></label>
                            <input type="text" class="form-control hidden" id="amount" name="amount" value="11">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Form pagamento -->
                    <div id="dropin-wrapper">
                        <div id="checkout-message"></div>
                        <div id="dropin-container"></div>
                    </div>
                    <router-link to="/checkout">
                        <button type="button" class="btn btn-outline-success mb-2 mt-2"
                        id="submit-button">Submit payment</button>
                    </router-link>
                    <!-- / Form pagamento -->
                    </div>
            </form>
        </div>
    </div>
</template>

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

<style lang="scss" scoped>
body {
    margin: 24px 0;
}

.hidden {
    display: none;
}

.spacer {
    margin-bottom: 24px;
}

#card-number,
#cvv,
#expiration-date {
    background: white;
    height: 38px;
    border: 1px solid #CED4DA;
    padding: .375rem .75rem;
    border-radius: .25rem;
}
</style>
