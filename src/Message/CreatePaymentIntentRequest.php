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

    public function getData()
    {
        $this->validate('amount', 'currency');

        $data = parent::getData();

        $data['capture_method'] = $this->getCaptureMethod() ? $this->getCaptureMethod() : 'automatic';
        $data['confirm'] = $this->getConfirm() ? $this->getConfirm() : 'true';
        $data['confirmation_method'] = $this->getConfirmationMethod() ? $this->getConfirmationMethod() : 'manual';
        $data['payment_method_types'] = $this->getPaymentMethodTypes() ? $this->getPaymentMethodTypes() : ["card"];

        if ($this->getDestination()) {
            $data['transfer_data'] = [
                'destination' => $this->getDestination()
            ];
        }

        return $data;
    }
}
