<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Create Customer Request.
 *
 * @see  \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/customers/create
 */
class CreateCustomerRequest extends CustomerRequest
{

    /**
     * @return mixed
     */
    public function getTaxIdData()
    {
        return $this->getParameter('taxIdData');
    }

    /**
     * Set the customer’s tax IDs.
     *
     * @param  array $value
     * @return $this
     */
    public function setTaxIdData($value)
    {
        return $this->setParameter('taxIdData', $value);
    }

    public function getData()
    {
        $data = parent::getData();

        if ($this->getPaymentMethodReference()) {
            $data['payment_method'] = $this->getPaymentMethodReference();
        }

        if ($this->getTaxIdData()) {
            $data['tax_id_data'] = $this->getTaxIdData();
        }

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/customers';
    }
}
