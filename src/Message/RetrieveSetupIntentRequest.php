<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Retrieve Setup Intent Request.
 *
 * @see  \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/setup_intents/retrieve
 */
class RetrieveSetupIntentRequest extends AbstractRequest
{
    /**
     * @return mixed
     */
    public function getClientSecret()
    {
        return $this->getParameter('clientSecret');
    }

    /**
     * Set the client secret of the SetupIntent.
     *
     * @param  $value
     *
     * @return $this
     */
    public function setClientSecret($value)
    {
        return $this->setParameter('clientSecret', $value);
    }

    public function getData()
    {
        $this->validate('paymentIntentReference');

        $data = [];

        if ($this->getClientSecret()) {
            $data['client_secret'] = $this->getClientSecret();
        }

        return $data;
    }

    public function getHttpMethod()
    {
        return "GET";
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/setup_intents/'.$this->getPaymentIntentReference();
    }
}
