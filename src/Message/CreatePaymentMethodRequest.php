<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Create Payment Method Request.
 *
 * @see  \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/payment_methods/create
 */
class CreatePaymentMethodRequest extends AbstractRequest
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

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->getParameter('type');
    }

    /**
     * Set type of the PaymentMethod, one of: card and card_present.
     *
     * @param  string $value
     * @return $this
     */
    public function setType($value)
    {
        return $this->setParameter('type', $value);
    }

    public function getData()
    {
        $data['type'] = $this->getType() ? $this->getType() : 'card';

        if ($this->getBillingDetails()) {
            $data['billing_details'] = $this->getBillingDetails();
        }

        if ($this->getCard()) {
            $data['card'] = $this->getCardData();
        }

        if ($this->getToken()) {
            $data['card']['token'] = $this->getToken();
        }

        if ($this->getMetadata()) {
            $data['metadata'] = $this->getMetadata();
        }
        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/payment_methods';
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

        $data['number'] = $card->getNumber();
        $data['exp_month'] = $card->getExpiryMonth();
        $data['exp_year'] = $card->getExpiryYear();
        if ($card->getCvv()) {
            $data['cvc'] = $card->getCvv();
        }
        return $data;
    }
}
