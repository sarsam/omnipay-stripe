<?php

namespace Omnipay\Stripe\Message;

use Omnipay\Tests\TestCase;

class AttachPaymentMethodRequestTest extends TestCase
{

    public function setUp()
    {
        $this->request = new AttachPaymentMethodRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->setPaymentMethodReference('pm_1Ea15B2eZvKYlo2CgdLAV21e');
        $this->request->setCustomerReference('cus_F49NwfIlmeqtHn');
    }

    public function testEndpoint()
    {
        $this->assertSame('https://api.stripe.com/v1/payment_methods/pm_1Ea15B2eZvKYlo2CgdLAV21e/attach', $this->request->getEndpoint());
    }


    public function testSendSuccess()
    {
        $this->setMockHttpResponse('AttachPaymentMethodSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertSame('pm_1Ea15B2eZvKYlo2CgdLAV21e', $response->getPaymentMethodReference());
        $this->assertSame('cus_F49NwfIlmeqtHn', $response->getCustomerReference());
        $this->assertNull($response->getMessage());
    }

    public function testSendFailure()
    {
        $this->setMockHttpResponse('AttachPaymentMethodFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertNull($response->getPaymentMethodReference());
        $this->assertSame('No such customer: cus_F49NwfIl99Hn', $response->getMessage());
    }
}
