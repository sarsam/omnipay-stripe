<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Retrieve Customer Request.
 *
 * @see \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/customers/retrieve
 */
class RetrieveCustomerRequest extends AbstractRequest
{

    public function getData()
    {
        $this->validate('customerReference');

        return [];

    }

    public function getEndpoint()
    {
        return $this->endpoint . '/customers/' . $this->getCustomerReference();
    }

    public function getHttpMethod()
    {
        return "GET";
    }
}
