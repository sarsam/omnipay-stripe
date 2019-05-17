<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Detach Payment Method To A Customer Request.
 *
 * @see  \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/payment_methods/detach
 */
class DetachPaymentMethodRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('paymentMethodReference');

        return [];
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/payment_methods/' . $this->getPaymentMethodReference() . '/detach';
    }
}
