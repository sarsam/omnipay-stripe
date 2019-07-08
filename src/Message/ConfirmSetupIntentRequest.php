<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Update Setup Intent Request.
 * @see  \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/setup_intents/confirm
 */
class ConfirmSetupIntentRequest extends AbstractRequest
{
    /**
     * @return mixed
     */
    public function getSetupIntentReference()
    {
        return $this->getParameter('setupIntentReference');
    }

    /**
     * Set the setup intent reference.
     *
     * @param  string $value
     * @return $this
     */
    public function setSetupIntentReference($value)
    {
        return $this->setParameter('setupIntentReference', $value);
    }

    public function getData()
    {
        $this->validate('setupIntentReference');

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
        return $this->endpoint.'/setup_intents/'.$this->getSetupIntentReference().'/confirm';
    }
}
