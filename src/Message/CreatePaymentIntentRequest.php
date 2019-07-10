<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Create Payment Intent Request.
 *
 * @see  \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/payment_intents/create
 */
class CreatePaymentIntentRequest extends PaymentIntentRequest
{
    /**
     * @return mixed
     */
    public function getOffSession()
    {
        return $this->getParameter('offSession');
    }

    /**
     * Set the off_session.
     *
     * @param  $value
     *
     * @return $this
     */
    public function setOffSession($value)
    {
        return $this->setParameter('offSession', $value);
    }

    public function getData()
    {
        $this->validate('amount', 'currency');

        $data = parent::getData();

        $data['capture_method'] = $this->getCaptureMethod() ? $this->getCaptureMethod() : 'automatic';
        $data['confirm'] = $this->getConfirm() ? $this->getConfirm() : 'true';
        $data['confirmation_method'] = $this->getConfirmationMethod() ? $this->getConfirmationMethod() : 'manual';
        $data['payment_method_types'] = $this->getPaymentMethodTypes() ? $this->getPaymentMethodTypes() : ["card"];

        if ($this->getOffSession()) {
            $data['off_session'] = $this->getOffSession();
        }

        if ($this->getDestination()) {
            $data['transfer_data'] = [
                'destination' => $this->getDestination()
            ];
        }

        return $data;
    }
}
