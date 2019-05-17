<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe List A Customers Payment Methods Request.
 *
 * @see  \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/payment_methods/list
 */
class ListPaymentMethodsRequest extends AbstractRequest
{
    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->getParameter('type');
    }

    /**
     * Set type of the PaymentMethod.
     *
     * @param  string $value
     * @return $this
     */
    public function setType($value)
    {
        return $this->setParameter('type', $value);
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->getParameter('limit');
    }

    /**
     * Set Limit.
     *
     * @param  $limit
     * @return $this
     */
    public function setLimit($limit)
    {
        return $this->setParameter('limit', $limit);
    }

    /**
     * @return mixed
     */
    public function getEndingBefore()
    {
        return $this->getParameter('endingBefore');
    }

    /**
     * Set ending before.
     *
     * @param  $value
     * @return $this
     */
    public function setEndingBefore($value)
    {
        return $this->setParameter('endingBefore', $value);
    }

    /**
     * @return mixed
     */
    public function getStartingAfter()
    {
        return $this->getParameter('startingAfter');
    }

    /**
     * Set starting after.
     *
     * @param  $value
     * @return $this
     */
    public function setStartingAfter($value)
    {
        return $this->setParameter('startingAfter', $value);
    }


    public function getData()
    {
        $this->validate('customerReference');

        $data = [];
        $data['customer'] = $this->getCustomerReference();
        $data['type'] = $this->getType() ? $this->getType() : 'card';

        if ($this->getEndingBefore()) {
            $data['ending_before'] = $this->getEndingBefore();
        }

        if ($this->getLimit()) {
            $data['limit'] = $this->getLimit();
        }

        if ($this->getStartingAfter()) {
            $data['starting_after'] = $this->getStartingAfter();
        }

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/payment_methods';
    }

    public function getHttpMethod()
    {
        return 'GET';
    }

}
