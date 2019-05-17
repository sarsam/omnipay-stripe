<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Attach Payment Method To A Customer Request.
 *
 * @see  \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/payment_methods/attach
 */
class AttachPaymentMethodRequest extends AbstractRequest
{

    public function getData()
    {
        $this->validate('paymentMethodReference', 'customerReference');

        $data['customer'] = $this->getCustomerReference();

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/payment_methods/' . $this->getPaymentMethodReference() . '/attach';
    }
}
