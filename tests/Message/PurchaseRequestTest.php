<?php

namespace Omnipay\Stripe\Message;

use Omnipay\Tests\TestCase;

class PurchaseRequestTest extends TestCase
{
    public function setUp()
    {
        $this->request = new CreatePaymentIntentRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize(
            array(
                'amount' => '10.00',
                'currency' => 'USD',
                "payment_method_types" => array("card"),
            )
        );
    }

    public function testCapturedMethodIsAutomatic()
    {
        $data = $this->request->getData();
        $this->assertSame('automatic', $data['capture_method']);
    }

    public function testConfirmationMethodIsManual()
    {
        $data = $this->request->getData();
        $this->assertSame('manual', $data['confirmation_method']);
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('PurchaseSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('pi_1EXUHgBuLa9YAcAAbQv7ySNG', $response->getTransactionReference());
    }

    public function testSend3DSecure()
    {
        $this->setMockHttpResponse('PurchaseRequiresSourceAction.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertTrue($response->is3DSecure());
        $this->assertSame('pi_1EXUHgBuLa9YAcAAbQv7ySNG', $response->getTransactionReference());
    }

    public function testSendWithCustomerSuccess()
    {
        $this->setMockHttpResponse('PurchaseWithCustomerSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('pi_1EXUHgBuLa9YAcAAbQv7ySNG', $response->getTransactionReference());
        $this->assertSame('cus_F49NwfIlmeqtHn', $response->getCustomerReference());
    }

    public function testSendError()
    {
        $this->setMockHttpResponse('PurchaseFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('ch_1EaN9KBuLa9YAcAAphUREF4t', $response->getTransactionReference());
        $this->assertSame('Your card was declined.', $response->getMessage());
    }
}
