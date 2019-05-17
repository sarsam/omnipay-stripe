<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Update Customer Request.
 *
 * @see \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/customers/update
 */
class UpdateCustomerRequest extends CustomerRequest
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
    public function getDefaultSource()
    {
        return $this->getParameter('defaultSource');
    }

    /**
     * Set default source
     *
     * @param $value
     * @return $this
     */
    public function setDefaultSource($value)
    {
        return $this->setParameter('defaultSource', $value);
    }


    public function getData()
    {
        $this->validate('customerReference');

        $data = parent::getData();

        if ($this->getBillingDetails()) {
            $data['billing_details'] = $this->getBillingDetails();
        }

        if ($this->getDefaultSource()) {
            $data['default_source'] = $this->getDefaultSource();
        }

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/customers/' . $this->getCustomerReference();
    }
}
