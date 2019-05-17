<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe List All Customers Request
 *
 * @see  \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/customers/list
 */
class ListCustomersRequest extends CustomerRequest
{
    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->getParameter('reason');
    }

    /**
     * A filter on the list based on the object created field.
     *
     * @param array $value
     * @return $this
     */
    public function setCreated(array $value)
    {
        return $this->setParameter('reason', $value);
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
     * @param $limit
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
     * @param $value
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
     * @param $value
     * @return $this
     */
    public function setStartingAfter($value)
    {
        return $this->setParameter('startingAfter', $value);
    }

    public function getData()
    {
        $data = parent::getData();

        if ($this->getCreated()) {
            $data['created'] = $this->getCreated();
        }

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

    public function getHttpMethod()
    {
        return "GET";
    }
}
