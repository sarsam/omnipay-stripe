<?php

namespace Omnipay\Stripe\Message;

/**
 * Customer Request
 *
 * This is the parent class for all customer requests if needed.
 * @see https://stripe.com/docs/api/customers
 *
 * Class CustomerRequest
 * @package Omnipay\Stripe\Message
 */
class CustomerRequest extends AbstractRequest
{

    /**
     * @return mixed
     */
    public function getAccountBalance()
    {
        return $this->getParameter('accountBalance');
    }

    /**
     * Set the customer's address.
     *
     * @param  integer $value
     * @return $this
     */
    public function setAccountBalance($value)
    {
        return $this->setParameter('accountBalance', $value);
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->getParameter('address');
    }

    /**
     * Set the customer's address.
     *
     * @param  array $value
     * @return $this
     */
    public function setAddress($value)
    {
        return $this->setParameter('address', $value);
    }

    /**
     * @return mixed
     */
    public function getCoupon()
    {
        return $this->getParameter('coupon');
    }

    /**
     * Set the coupon.
     *
     * @param  $value
     * @return $this
     */
    public function setCoupon($value)
    {
        return $this->setParameter('coupon', $value);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->getParameter('email');
    }

    /**
     * Set the customer's email address.
     *
     * @param string $value
     * @return $this
     */
    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }

    /**
     * @return mixed
     */
    public function getInvoicePrefix()
    {
        return $this->getParameter('invoicePrefix');
    }

    /**
     * Set the prefix for the customer used to generate unique invoice numbers.
     * Must be 3–12 uppercase letters or numbers
     *
     * @param  $value
     * @return $this
     */
    public function setInvoicePrefix($value)
    {
        return $this->setParameter('invoicePrefix', $value);
    }

    /**
     * @return mixed
     */
    public function getInvoiceSettings()
    {
        return $this->getParameter('invoiceSettings');
    }

    /**
     * Set customer default invoice settings.
     *
     * @param  array $value
     * @return $this
     */
    public function setInvoiceSettings($value)
    {
        return $this->setParameter('invoiceSettings', $value);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->getParameter('name');
    }

    /**
     * The customer’s full name or business name.
     *
     * @param  $value
     * @return $this
     */
    public function setName($value)
    {
        return $this->setParameter('name', $value);
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->getParameter('phone');
    }

    /**
     * Set the customer’s phone number.
     *
     * @param  $value
     * @return $this
     */
    public function setPhone($value)
    {
        return $this->setParameter('phone', $value);
    }

    /**
     * @return mixed
     */
    public function getPreferredLocales()
    {
        return $this->getParameter('preferredLocales');
    }

    /**
     * Set the customer’s preferred languages.
     *
     * @param  $value
     * @return $this
     */
    public function setPreferredLocales($value)
    {
        return $this->setParameter('preferredLocales', $value);
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
     * @return mixed
     */
    public function getTaxExempt()
    {
        return $this->getParameter('taxExempt');
    }

    /**
     * Set the customer’s tax exemption. One of none, exempt, or reverse.
     *
     * @param  string $value
     * @return $this
     */
    public function setTaxExempt($value)
    {
        return $this->setParameter('taxExempt', $value);
    }

    public function getData()
    {
        $data = [];

        if ($this->getAccountBalance()) {
            $data['account_balance'] = $this->getAccountBalance();
        }

        if ($this->getAddress()) {
            $data['address'] = $this->getAddress();
        }

        if ($this->getCoupon()) {
            $data['coupon'] = $this->getCoupon();
        }

        if ($this->getDescription()) {
            $data['description'] = $this->getDescription();
        }

        if ($this->getEmail()) {
            $data['email'] = $this->getEmail();
        }

        if ($this->getInvoicePrefix()) {
            $data['invoice_prefix'] = $this->getInvoicePrefix();
        }

        if ($this->getInvoiceSettings()) {
            $data['invoice_settings'] = $this->getInvoiceSettings();
        }

        if ($this->getMetadata()) {
            $data['metadata'] = $this->getMetadata();
        }

        if ($this->getName()) {
            $data['name'] = $this->getName();
        }

        if ($this->getPhone()) {
            $data['phone'] = $this->getPhone();
        }

        if ($this->getPreferredLocales()) {
            $data['preferred_locales'] = $this->getPreferredLocales();
        }

        if ($this->getShipping()) {
            $data['shipping'] = $this->getShipping();
        }

        if ($this->getSource()) {
            $data['source'] = $this->getSource();
        }

        if ($this->getTaxExempt()) {
            $data['tax_exempt'] = $this->getTaxExempt();
        }

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/customers';
    }
}
