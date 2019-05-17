<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Confirm Payment Intent Request.
 *
 * @see  \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/payment_intents/confirm
 */
class ConfirmPaymentIntentRequest extends PaymentIntentRequest
{

    public function getData()
    {
        $this->validate('paymentIntentReference');

        $data = parent::getData();

        if ($this->getReturnUrl()) {
            $data['return_url'] = $this->getReturnUrl();
        }
        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/payment_intents/' . $this->getPaymentIntentReference() . '/confirm';
    }

}
