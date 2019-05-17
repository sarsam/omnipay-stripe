<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Confirm Payment Intent Request.
 *
 * @see  \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/payment_intents/cancel
 */
class CancelPaymentIntentRequest extends PaymentIntentRequest
{
    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->getParameter('reason');
    }

    /**
     * Set canceling reason.
     *
     * @param  $value
     * @return $this
     */
    public function setReason($value)
    {
        return $this->setParameter('reason', $value);
    }

    public function getData()
    {
        $this->validate('paymentIntentReference');

        $data = parent::getData();

        if ($this->getReturnUrl()) {
            $data['cancellation_reason'] = $this->getReturnUrl();
        }
        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/payment_intents/' . $this->getPaymentIntentReference() . '/cancel';
    }

}
