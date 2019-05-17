<?php

namespace Omnipay\Stripe\Message;

use Omnipay\Tests\TestCase;

class RetrievePaymentMethodRequestTest extends TestCase
{

    public function setUp()
    {
        $this->request = new RetrievePaymentMethodRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->setPaymentMethodReference('pm_1Ea15B2eZvKYlo2CgdLAV21e');
    }

    public function testEndpoint()
    {
        $this->assertSame('https://api.stripe.com/v1/payment_methods/pm_1Ea15B2eZvKYlo2CgdLAV21e', $this->request->getEndpoint());
    }

    public function testHttpMethod()
    {
        $this->assertSame('GET', $this->request->getHttpMethod());
    }


    public function testSendSuccess()
    {
        $this->setMockHttpResponse('RetrievePaymentMethodSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertSame('pm_1Ea15B2eZvKYlo2CgdLAV21e', $response->getPaymentMethodReference());
        $this->assertNull($response->getMessage());
    }

    public function testSendFailure()
    {
        $this->setMockHttpResponse('RetrievePaymentMethodFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertNull($response->getPaymentMethodReference());
        $this->assertSame('No such payment_method: pm_1Ea15B2eZvKYlo2CgdLAV21ewr', $response->getMessage());
    }
}
