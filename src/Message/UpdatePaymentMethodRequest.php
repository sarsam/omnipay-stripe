<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Update Payment Method Request.
 *
 * @see \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/payment_methods/update
 */
class UpdatePaymentMethodRequest extends AbstractRequest
{
    /**
     * @return mixed
     */
    public function getBillingDetails()
    {
        return $this->getParameter('billingDetails');
    }

    /**
     * Set billing details.
     *
     * @param  string $value
     * @return $this
     */
    public function setBillingDetails($value)
    {
        return $this->setParameter('billingDetails', $value);
    }

    public function getData()
    {
        $this->validate('paymentMethodReference');

        $data = [];

        if ($this->getBillingDetails()) {
            $data['billing_details'] = $this->getBillingDetails();
        }

        if ($this->getCard()) {
            $data['card'] = $this->getCardData();
        }

        if ($this->getMetadata()) {
            $data['metadata'] = $this->getMetadata();
        }

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/payment_methods/' . $this->getPaymentMethodReference();
    }

    /**
     * Get the card data.
     *
     * This request uses a slightly different format for card data to
     * the other requests and does not require the card data to be
     * complete in full (or valid).
     *
     * @return array
     */
    protected function getCardData()
    {
        $data = [];
        $card = $this->getCard();
        if (!empty($card)) {
            if ($card->getExpiryMonth()) {
                $data['exp_month'] = $card->getExpiryMonth();
            }
            if ($card->getExpiryYear()) {
                $data['exp_year'] = $card->getExpiryYear();
            }
        }

        return $data;
    }

}
