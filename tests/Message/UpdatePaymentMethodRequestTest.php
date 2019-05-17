<?php

namespace Omnipay\Stripe\Message;

use Omnipay\Tests\TestCase;

class UpdatePaymentMethodRequestTest extends TestCase
{
    public function setUp()
    {
        $this->request = new UpdatePaymentMethodRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->setPaymentMethodReference('pm_1Ea15B2eZvKYlo2CgdLAV21e');
    }

    public function testEndpoint()
    {
        $this->assertSame('https://api.stripe.com/v1/payment_methods/pm_1Ea15B2eZvKYlo2CgdLAV21e', $this->request->getEndpoint());
    }

    public function testDataWithCard()
    {
        $card = $this->getValidCard();
        $this->request->setCard($card);

        $data = $this->request->getData();
        $this->assertSame($card['expiryYear'], $data['card']['exp_year']);
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('UpdatePaymentMethodSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertSame('pm_1Ea15B2eZvKYlo2CgdLAV21e', $response->getPaymentMethodReference());
        $this->assertNull($response->getMessage());
    }

    public function testSendFailure()
    {
        $this->setMockHttpResponse('UpdatePaymentMethodFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertNull($response->getPaymentMethodReference());
        $this->assertSame('No such payment_method: pm_1Ea15B2eZvKYlo2CgdLAV21ewr', $response->getMessage());
    }
}
