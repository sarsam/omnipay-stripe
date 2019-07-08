<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Update Setup Intent Request.
 * @see  \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/setup_intents/confirm
 */
class ConfirmSetupIntentRequest extends AbstractRequest
{

    public function getData()
    {
        $this->validate('paymentIntentReference');

        $data = [];

        if ($this->getPaymentMethodReference()) {
            $data['payment_method'] = $this->getPaymentMethodReference();
        }

        if ($this->getReturnUrl()) {
            $data['return_url'] = $this->getReturnUrl()();
        }

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/setup_intents/'.$this->getPaymentIntentReference().'/confirm';
    }
}
