<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Update Setup Intent Request.
 * @see  \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/setup_intents/update
 */
class UpdateSetupIntentRequest extends AbstractRequest
{

    /**
     * @return mixed
     */
    public function getPaymentMethodTypes()
    {
        return $this->getParameter('paymentMethodTypes');
    }

    /**
     * Set payment method types, defaults to [“card”].
     * Valid payment method types include: card and card_present.
     *
     * @param  array $value
     *
     * @return $this
     */
    public function setPaymentMethodTypes(array $value)
    {
        return $this->setParameter('paymentMethodTypes', $value);
    }

    public function getData()
    {
        $this->validate('paymentIntentReference');

        $data = [];

        if ($this->getCustomerReference()) {
            $data['customer'] = $this->getCustomerReference();
        }

        if ($this->getDescription()) {
            $data['description'] = $this->getDescription();
        }

        if ($this->getMetadata()) {
            $data['metadata'] = $this->getMetadata();
        }

        if ($this->getPaymentMethodReference()) {
            $data['payment_method'] = $this->getPaymentMethodReference();
        }

        $data['payment_method_types'] = $this->getPaymentMethodTypes() ? $this->getPaymentMethodTypes() : ["card"];

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/setup_intents/'.$this->getPaymentIntentReference();
    }
}
