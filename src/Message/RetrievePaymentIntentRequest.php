<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Retrieve Payment Intent Request.
 *
 * @see \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/payment_intents/retrieve
 */
class RetrievePaymentIntentRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('paymentIntentReference');

        return [];
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/payment_intents/' . $this->getPaymentIntentReference();
    }

    public function getHttpMethod()
    {
        return 'GET';
    }
}
