<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Refund Request.
 *
 * @see \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/refunds
 */
class RefundRequest extends AbstractRequest
{
    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->getParameter('reason');
    }

    /**
     * Set the reason for the refund.
     * If set, possible values are duplicate, fraudulent, and requested_by_customer.
     *
     * @return $this
     */
    public function setReason($value)
    {
        return $this->setParameter('reason', $value);
    }

    /**
     * @return mixed
     */
    public function getRefundApplicationFee()
    {
        return $this->getParameter('refundApplicationFee');
    }

    /**
     * Whether the application fee should be refunded when refunding this charge.
     *
     * @param  bool $value Whether the application fee should be refunded
     * @return $this
     */
    public function setRefundApplicationFee($value)
    {
        return $this->setParameter('refundApplicationFee', $value);
    }

    /**
     * @return mixed
     */
    public function getReverseTransfer()
    {
        return $this->getParameter('reverseTransfer');
    }

    /**
     * Whether the transfer should be reversed when refunding this charge.
     *
     * @param  bool $value Whether the transfer should be refunded
     * @return $this
     */
    public function setReverseTransfer($value)
    {
        return $this->setParameter('reverseTransfer', $value);
    }

    public function getData()
    {
        $this->validate('chargeReference');

        $data = [];

        $data['charge'] = $this->getChargeReference();

        if($this->getAmount()){
            $data['amount'] = $this->getAmountInteger();
        }

        if ($this->getReason()) {
            $data['reason'] = $this->getReason();
        }

        if ($this->getMetadata()) {
            $data['metadata'] = $this->getMetadata();
        }

        if ($this->getRefundApplicationFee()) {
            $data['refund_application_fee'] = 'true';
        }

        if ($this->getReverseTransfer()) {
            $data['reverse_transfer'] = 'true';
        }

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/refunds';
    }

}
