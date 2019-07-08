<?php

namespace Omnipay\Stripe\Message;

/**
 * Stripe Create Setup Intent Request.
 * @see  \Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/setup_intents/create
 */
class CreateSetupIntentRequest extends AbstractRequest
{
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
     *
     * @return $this
     */
    public function setConfirm($value)
    {
        return $this->setParameter('confirm', $value);
    }

    /**
     * Connect only
     * @return mixed
     */
    public function getOnBehalfOf()
    {
        return $this->getParameter('onBehalfOf');
    }

    /**
     * @param  string $value
     *
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
     *
     * @return $this
     */
    public function setPaymentMethodTypes(array $value)
    {
        return $this->setParameter('paymentMethodTypes', $value);
    }

    /**
     * @return mixed
     */
    public function getUsage()
    {
        return $this->getParameter('usage');
    }

    /**
     * Set usage << on_session or off_session >>.
     * Default value is off_session
     *
     * @param  $value
     *
     * @return $this
     */
    public function setUsage($value)
    {
        return $this->setParameter('usage', $value);
    }

    public function getData()
    {
        $data = [];

        if ($this->getConfirm()) {
            $data['confirm'] = $this->getConfirm();
        }

        if ($this->getCustomerReference()) {
            $data['customer'] = $this->getCustomerReference();
        }

        if ($this->getDescription()) {
            $data['description'] = $this->getDescription();
        }

        if ($this->getMetadata()) {
            $data['metadata'] = $this->getMetadata();
        }

        if ($this->getOnBehalfOf()) {
            $data['on_behalf_of'] = $this->getOnBehalfOf();
        }

        if ($this->getPaymentMethodReference()) {
            $data['payment_method'] = $this->getPaymentMethodReference();
        }

        $data['payment_method_types'] = $this->getPaymentMethodTypes() ? $this->getPaymentMethodTypes() : ["card"];

        if ($this->getReturnUrl()) {
            $data['return_url'] = $this->getReturnUrl()();
        }

        if ($this->getUsage()) {
            $data['usage'] = $this->getUsage();
        }

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/setup_intents';
    }
}
