<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Cancel Setup Intent Request.
 * @see  \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/setup_intents/cancel
 */
class CancelSetupIntentRequest extends AbstractRequest
{
    /**
     * @return mixed
     */
    public function getCancellationReason()
    {
        return $this->getParameter('cancellationReason');
    }

    /**
     * Set the Reason for canceling
     * Possible values are abandoned, requested_by_customer, or duplicate
     *
     * @param  string $value
     *
     * @return $this
     */
    public function setCancellationReason($value)
    {
        return $this->setParameter('cancellationReason', $value);
    }

    public function getData()
    {
        $this->validate('paymentIntentReference');

        $data = [];

        if ($this->getCancellationReason()) {
            $data['cancellation_reason'] = $this->getCancellationReason();
        }

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/setup_intents/'.$this->getPaymentIntentReference().'/cancel';
    }
}
