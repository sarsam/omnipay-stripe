<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Capture Payment Intent Request.
 *
 * @see \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/payment_intents/capture
 */
class CapturePaymentIntentRequest extends PaymentIntentRequest
{

    public function getData()
    {
        $this->validate('paymentIntentReference');

        $data = parent::getData();

        if ($amount = $this->getAmountInteger()) {
            $data['amount_to_capture'] = $amount;
        }

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/payment_intents/' . $this->getPaymentIntentReference() . '/capture';
    }

}
