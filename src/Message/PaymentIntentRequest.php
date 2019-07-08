<?php

/**
 * Stripe Authorize Request.
 */

namespace Omnipay\Stripe\Message;

use Money\Formatter\DecimalMoneyFormatter;

/**
 * PaymentIntent Request.
 *
 * This is the parent class for all PaymentIntent requests if needed.
 * @see https://stripe.com/docs/api/payment_intents
 *
 * Class PaymentIntentRequest
 * @package Omnipay\Stripe\Message
 */
class PaymentIntentRequest extends AbstractRequest
{

    /**
     * @return string
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getApplicationFee()
    {
        $money = $this->getMoney('applicationFee');

        if ($money !== null) {
            $moneyFormatter = new DecimalMoneyFormatter($this->getCurrencies());

            return $moneyFormatter->format($money);
        }

        return '';
    }

    /**
     * Get the payment amount as an integer.
     *
     * @return integer
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getApplicationFeeInteger()
    {
        $money = $this->getMoney('applicationFee');

        if ($money !== null) {
            return (integer)$money->getAmount();
        }

        return 0;
    }

    /**
     * Set application fee.
     *
     * @param  $value
     * @return $this
     */
    public function setApplicationFee($value)
    {
        return $this->setParameter('applicationFee', $value);
    }

    /**
     * @return mixed
     */
    public function getCaptureMethod()
    {
        return $this->getParameter('captureMethod');
    }

    /**
     * Set capture method << automatic or manual >>.
     *
     * @param  string $value
     * @return $this
     */
    public function setCaptureMethod($value)
    {
        return $this->setParameter('captureMethod', $value);
    }

    /**
     * @return mixed
     */
    public function getConfirm()
    {
        return $this->getParameter('confirm');
    }

    /**
     * Set confirm << true or false >>.
     *
     * @param  $value
     * @return $this
     */
    public function setConfirm($value)
    {
        return $this->setParameter('confirm', $value);
    }

    /**
     * @return mixed
     */
    public function getConfirmationMethod()
    {
        return $this->getParameter('confirmationMethod');
    }

    /**
     * Set confirmation method << automatic or manual >>.
     *
     * @param  $value
     * @return $this
     */
    public function setConfirmationMethod($value)
    {
        return $this->setParameter('confirmationMethod', $value);
    }

    /**
     * Connect only
     *
     * @return mixed
     */
    public function getOnBehalfOf()
    {
        return $this->getParameter('onBehalfOf');
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setOnBehalfOf($value)
    {
        return $this->setParameter('onBehalfOf', $value);
    }

    /**
     * @return mixed
     */
    public function getPaymentMethodTypes()
    {
        return $this->getParameter('paymentMethodTypes');
    }

    /**
     * Set payment method types, defaults to [“card”].
     * Valid payment method types include: card and card_present.
     *
     * @param  array $value
     * @return $this
     */
    public function setPaymentMethodTypes(array $value)
    {
        return $this->setParameter('paymentMethodTypes', $value);
    }

    /**
     * @return mixed
     */
    public function getReceiptEmail()
    {
        return $this->getParameter('receiptEmail');
    }

    /**
     * @param  string $email
     * @return $this
     */
    public function setReceiptEmail($email)
    {
        $this->setParameter('receiptEmail', $email);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSavePaymentMethod()
    {
        return $this->getParameter('savePaymentMethod');
    }

    /**
     * Set save the PaymentIntent’s payment method.
     * << true or false >>  default is false.
     *
     * @param  $value
     * @return $this
     */
    public function setSavePaymentMethod($value)
    {
        return $this->setParameter('savePaymentMethod', $value);
    }

    /**
     * @return mixed
     */
    public function getSetupFutureUsage()
    {
        return $this->getParameter('setupFutureUsage');
    }

    /**
     * Set the SetupIntent’s future usage.
     *
     * @param  $value
     * @return $this
     */
    public function setSetupFutureUsage($value)
    {
        return $this->setParameter('setupFutureUsage', $value);
    }
    /**
     * @return mixed
     */
    public function getStatementDescriptor()
    {
        return $this->getParameter('statementDescriptor');
    }

    /**
     * @return mixed
     */
    public function getShipping()
    {
        return $this->getParameter('shipping');
    }

    /**
     * Set the customer’s shipping information.
     *
     * @param  array $value
     * @return $this
     */
    public function setShipping($value)
    {
        return $this->setParameter('shipping', $value);
    }

    /**
     * @param  $value
     * @return $this
     */
    public function setStatementDescriptor($value)
    {
        $value = str_replace(['<', '>', '"', '\''], '', $value);

        return $this->setParameter('statementDescriptor', $value);
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->getParameter('destination');
    }

    /**
     * @param  $value
     * @return PaymentIntentRequest
     */
    public function setDestination($value)
    {
        return $this->setParameter('destination', $value);
    }

    /**
     * Connect only.
     *
     * @return mixed
     */
    public function getTransferGroup()
    {
        return $this->getParameter('transferGroup');
    }

    /**
     * @param  $value
     * @return $this
     */
    public function setTransferGroup($value)
    {
        return $this->setParameter('transferGroup', $value);
    }

    public function getData()
    {
        $data = [];

        if ($this->getAmountInteger()) {
            $data['amount'] = $this->getAmountInteger();
        }

        if ($this->getCurrency()) {
            $data['currency'] = strtolower($this->getCurrency());
        }

        if ($this->getDescription()) {
            $data['description'] = $this->getDescription();
        }

        if ($this->getMetadata()) {
            $data['metadata'] = $this->getMetadata();
        }

        if ($this->getCustomerReference()) {
            $data['customer'] = $this->getCustomerReference();
        }

        if ($this->getStatementDescriptor()) {
            $data['statement_descriptor'] = $this->getStatementDescriptor();
        }

        if ($this->getOnBehalfOf()) {
            $data['on_behalf_of'] = $this->getOnBehalfOf();
        }

        if ($this->getApplicationFee()) {
            $data['application_fee_amount'] = $this->getApplicationFeeInteger();
        }

        if ($this->getTransferGroup()) {
            $data['transfer_group'] = $this->getTransferGroup();
        }

        if ($this->getSavePaymentMethod()) {
            $data['save_payment_method'] = $this->getSavePaymentMethod();
        }

        if ($this->getSetupFutureUsage()) {
            $data['setup_future_usage'] = $this->getSetupFutureUsage();
        }

        if ($this->getShipping()) {
            $data['shipping'] = $this->getShipping();
        }

        if ($this->getReceiptEmail()) {
            $data['receipt_email'] = $this->getReceiptEmail();
        }

        if ($this->getPaymentMethodReference()) {
            $data['payment_method'] = $this->getPaymentMethodReference();
        }

        if ($this->getSource()) {
            $data['source'] = $this->getSource();
        }

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/payment_intents';
    }
}
