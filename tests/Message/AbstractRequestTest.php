<?php

namespace Omnipay\Stripe\Message;

use GuzzleHttp\Psr7\Request;
use Mockery;
use Omnipay\Tests\TestCase;

class AbstractRequestTest extends TestCase
{
    public function setUp()
    {
        $this->request = Mockery::mock('\Omnipay\Stripe\Message\AbstractRequest')->makePartial();
        $this->request->initialize();
    }

    public function testCustomerReference()
    {
        $this->assertSame($this->request, $this->request->setCustomerReference('abc123'));
        $this->assertSame('abc123', $this->request->getCustomerReference());
    }

    public function testPaymentIntentReference()
    {
        $this->assertSame($this->request, $this->request->setPaymentIntentReference('abc123'));
        $this->assertSame('abc123', $this->request->getPaymentIntentReference());
    }

    public function testPaymentMethodReference()
    {
        $this->assertSame($this->request, $this->request->setPaymentMethodReference('abc123'));
        $this->assertSame('abc123', $this->request->getPaymentMethodReference());
    }

    public function testChargeReference()
    {
        $this->assertSame($this->request, $this->request->setChargeReference('abc123'));
        $this->assertSame('abc123', $this->request->getChargeReference());
    }

    public function testSource()
    {
        $this->assertSame($this->request, $this->request->setSource('abc123'));
        $this->assertSame('abc123', $this->request->getSource());
    }

    public function testMetadata()
    {
        $this->assertSame($this->request, $this->request->setMetadata(array('foo' => 'bar')));
        $this->assertSame(array('foo' => 'bar'), $this->request->getMetadata());
    }
}
