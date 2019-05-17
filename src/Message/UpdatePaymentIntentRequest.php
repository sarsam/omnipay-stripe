<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Update Payment Intent Request.
 *
 * @see \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/payment_intents/update
 */
class UpdatePaymentIntentRequest extends PaymentIntentRequest
{
    public function getData()
    {
        $this->validate('paymentIntentReference');

        return parent::getData();
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/payment_intents/' . $this->getPaymentIntentReference();
    }
}
