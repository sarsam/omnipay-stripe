<?php

namespace Omnipay\Stripe;

use Omnipay\Tests\GatewayTestCase;

/**
 * @property Gateway gateway
 */
class GatewayTest extends GatewayTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());
    }


    public function testPurchase()
    {
        $request = $this->gateway->purchase(array('amount' => '10.00'));

        $this->assertInstanceOf('Omnipay\Stripe\Message\CreatePaymentIntentRequest', $request);
        $this->assertSame('10.00', $request->getAmount());
    }

    public function testCapture()
    {
        $request = $this->gateway->capture(array('amount' => '10.00'));

        $this->assertInstanceOf('Omnipay\Stripe\Message\CapturePaymentIntentRequest', $request);
        $this->assertSame('10.00', $request->getAmount());
    }

    public function testRefund()
    {
        $request = $this->gateway->refund(array('amount' => '10.00'));

        $this->assertInstanceOf('Omnipay\Stripe\Message\RefundRequest', $request);
        $this->assertSame('10.00', $request->getAmount());
    }


    public function testCreatePaymentMethod()
    {
        $request = $this->gateway->createPaymentMethod(array('metaData' => array('name' => 'test')));

        $this->assertInstanceOf('Omnipay\Stripe\Message\CreatePaymentMethodRequest', $request);
        $this->assertSame('test', $request->getMetaData()['name']);
    }

    public function testUpdatePaymentMethod()
    {
        $request = $this->gateway->updatePaymentMethod(array('paymentMethodReference' => 'pm_1Ea15B2eZvKYlo2CgdLAV21e'));

        $this->assertInstanceOf('Omnipay\Stripe\Message\UpdatePaymentMethodRequest', $request);
        $this->assertSame('pm_1Ea15B2eZvKYlo2CgdLAV21e', $request->getPaymentMethodReference());
    }

    public function testRetrievePaymentMethod()
    {
        $request = $this->gateway->retrievePaymentMethod(array('paymentMethodReference' => 'pm_1Ea15B2eZvKYlo2CgdLAV21e'));

        $this->assertInstanceOf('Omnipay\Stripe\Message\RetrievePaymentMethodRequest', $request);
        $this->assertSame('pm_1Ea15B2eZvKYlo2CgdLAV21e', $request->getPaymentMethodReference());
    }

    public function testAttachPaymentMethod()
    {
        $request = $this->gateway->attachPaymentMethod(array(
            'paymentMethodReference' => 'pm_1Ea15B2eZvKYlo2CgdLAV21e',
            'customerReference' => 'cus_1MZSEtqSghKx99'
        ));

        $this->assertInstanceOf('Omnipay\Stripe\Message\AttachPaymentMethodRequest', $request);
        $this->assertSame('pm_1Ea15B2eZvKYlo2CgdLAV21e', $request->getPaymentMethodReference());
    }

    public function testDetachPaymentMethod()
    {
        $request = $this->gateway->detachPaymentMethod(array('paymentMethodReference' => 'pm_1Ea15B2eZvKYlo2CgdLAV21e'));

        $this->assertInstanceOf('Omnipay\Stripe\Message\DetachPaymentMethodRequest', $request);
        $this->assertSame('pm_1Ea15B2eZvKYlo2CgdLAV21e', $request->getPaymentMethodReference());
    }

    public function testCreateCustomer()
    {
        $request = $this->gateway->createCustomer(array('description' => 'foo@foo.com'));

        $this->assertInstanceOf('Omnipay\Stripe\Message\CreateCustomerRequest', $request);
        $this->assertSame('foo@foo.com', $request->getDescription());
    }

    public function testRetrieveCustomer()
    {
        $request = $this->gateway->retrieveCustomer(array('customerReference' => 'cus_1MZSEtqSghKx99'));

        $this->assertInstanceOf('Omnipay\Stripe\Message\RetrieveCustomerRequest', $request);
        $this->assertSame('cus_1MZSEtqSghKx99', $request->getCustomerReference());
    }

    public function testUpdateCustomer()
    {
        $request = $this->gateway->updateCustomer(array('customerReference' => 'cus_1MZSEtqSghKx99'));

        $this->assertInstanceOf('Omnipay\Stripe\Message\UpdateCustomerRequest', $request);
        $this->assertSame('cus_1MZSEtqSghKx99', $request->getCustomerReference());
    }

    public function testDeleteCustomer()
    {
        $request = $this->gateway->deleteCustomer(array('customerReference' => 'cus_1MZSEtqSghKx99'));

        $this->assertInstanceOf('Omnipay\Stripe\Message\DeleteCustomerRequest', $request);
        $this->assertSame('cus_1MZSEtqSghKx99', $request->getCustomerReference());
    }

}
