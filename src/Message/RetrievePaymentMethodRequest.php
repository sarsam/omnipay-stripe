<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Retrieve Payment Method Request.
 *
 * @see \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/payment_methods/retrieve
 */
class RetrievePaymentMethodRequest extends AbstractRequest
{
    public function getData()
    {
        return [];
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/payment_methods/' . $this->getPaymentMethodReference();
    }

    public function getHttpMethod()
    {
        return 'GET';
    }
}
