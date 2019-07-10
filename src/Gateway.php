<?php

namespace Omnipay\Stripe;

use Omnipay\Common\AbstractGateway;

/**
 * Stripe Gateway.
 *
 * Test modes:
 *
 * Stripe accounts have test-mode API keys as well as live-mode
 * API keys. These keys can be active at the same time. Data
 * created with test-mode credentials will never hit the credit
 * card networks and will never cost anyone money.
 *
 * Unlike some gateways, there is no test mode endpoint separate
 * to the live mode endpoint, the Stripe API endpoint is the same
 * for test and for live.
 *
 * Setting the testMode flag on this gateway has no effect.  To
 * use test mode just use your test mode API key.
 *
 * You can use any of the cards listed at https://stripe.com/docs/testing
 * for testing.
 *
 * Authentication:
 *
 * Authentication is by means of a single secret API key set as
 * the apiKey parameter when creating the gateway object.
 *
 * @see \Omnipay\Common\AbstractGateway
 * @see \Omnipay\Stripe\Message\AbstractRequest
 *
 * @link https://stripe.com/docs/api
 *
 * @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface completePurchase(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
 */
class Gateway extends AbstractGateway
{
    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return 'Stripe';
    }

    /**
     * Get the gateway parameters.
     *
     * @return array
     */
    public function getDefaultParameters()
    {
        return [
            'apiKey' => '',
        ];
    }

    /**
     * Get the gateway API Key.
     *
     * Authentication is by means of a single secret API key set as
     * the apiKey parameter when creating the gateway object.
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    /**
     * Set Api key
     * @param string $value
     *
     * @return Gateway provides a fluent interface.
     */
    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    /**
     * Create Purchase Request.
     *
     * @param  array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\CreatePaymentIntentRequest', $parameters);
    }

    /**
     * Capture Request.
     *
     * @param  array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\CapturePaymentIntentRequest', $parameters);
    }

    /**
     * Retrieve PaymentIntent Request.
     *
     * @param  array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function retrievePaymentIntent(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\RetrievePaymentIntentRequest', $parameters);
    }

    /**
     * Update PaymentIntent Request.
     *
     * @param  array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function updatePaymentIntent(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\UpdatePaymentIntentRequest', $parameters);
    }

    /**
     * Confirm PaymentIntent Request.
     *
     * @param  array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function confirmPaymentIntent(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\ConfirmPaymentIntentRequest', $parameters);
    }

    /**
     * Cancel PaymentIntent Request.
     *
     * @param  array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function cancelPaymentIntent(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\CancelPaymentIntentRequest', $parameters);
    }

    /**
     * List PaymentIntents Request.
     *
     * @param  array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function listPaymentIntents(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\ListPaymentIntentsRequest', $parameters);
    }

    /**
     * Create SetupIntent Request.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function createSetupIntent(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\CreateSetupIntentRequest', $parameters);
    }

    /**
     * Retrieve SetupIntent Request.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function retrieveSetupIntent(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\RetrieveSetupIntentRequest', $parameters);
    }

    /**
     * Update SetupIntent Request.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function updateSetupIntent(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\UpdateSetupIntentRequest', $parameters);
    }

    /**
     * Confirm SetupIntent Request.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function confirmSetupIntent(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\ConfirmSetupIntentRequest', $parameters);
    }

    /**
     * Cancel SetupIntent Request.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function cancelSetupIntent(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\CancelSetupIntentRequest', $parameters);
    }

    /**
     * Create PaymentMethod Request.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function createPaymentMethod(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\CreatePaymentMethodRequest', $parameters);
    }

    /**
     * Retrieve PaymentMethod Request.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function retrievePaymentMethod(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\RetrievePaymentMethodRequest', $parameters);
    }

    /**
     * Update PaymentMethod Request.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function updatePaymentMethod(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\UpdatePaymentMethodRequest', $parameters);
    }

    /**
     * List PaymentMethods Request.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function listPaymentMethods(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\ListPaymentMethodsRequest', $parameters);
    }

    /**
     * Attach PaymentMethod Request.
     *
     * Attaches a PaymentMethod object to a Customer.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function attachPaymentMethod(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\AttachPaymentMethodRequest', $parameters);
    }

    /**
     * Detach PaymentMethod Request.
     *
     * Detaches a PaymentMethod object from a Customer.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function detachPaymentMethod(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\DetachPaymentMethodRequest', $parameters);
    }

    /**
     * Create Customer Request.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function createCustomer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\CreateCustomerRequest', $parameters);
    }

    /**
     * Update Customer Request.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function updateCustomer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\UpdateCustomerRequest', $parameters);
    }

    /**
     * Retrieve Customer Request.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function retrieveCustomer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\RetrieveCustomerRequest', $parameters);
    }

    /**
     * Delete Customer Request.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function deleteCustomer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\DeleteCustomerRequest', $parameters);
    }

    /**
     * List Customers Request.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function listCustomers(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\ListCustomersRequest', $parameters);
    }

    /**
     * Refund Request.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\RefundRequest', $parameters);
    }
}
