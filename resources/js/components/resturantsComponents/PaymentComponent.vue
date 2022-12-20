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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                    </div>

                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <label for="cc_number">Credit Card Number</label>

                        <div class="form-group" id="card-number">

                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="expiry">Expiry</label>

                        <div class="form-group" id="expiration-date">

                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="cvv">CVV</label>

                        <div class="form-group" id="cvv">

                        </div>
                    </div>

                </div>

                <div class="spacer"></div>

                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button type="submit" class="btn btn-success">Submit Payment</button>
            </form>
        </div>
    </div>
</template>

<script>
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
