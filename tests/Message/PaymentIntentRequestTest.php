<?php

namespace Omnipay\Stripe\Message;

use GuzzleHttp\Psr7\Request;
use Mockery;
use Omnipay\Tests\TestCase;

class PaymentIntentRequestTest extends TestCase
{
    public function setUp()
    {
        $this->request = Mockery::mock('\Omnipay\Stripe\Message\PaymentIntentRequest')->makePartial();
        $this->request->initialize(array(
            'amount' => '12.00',
            'currency' => 'USD',
            'description' => 'payment N1',
            'metadata' => array(
                'foo' => 'bar',
            ),
            'applicationFee' => '1.00'
        ));
    }

    public function testGetData()
    {
        $data = $this->request->getData();

        $this->assertSame(1200, $data['amount']);
        $this->assertSame('usd', $data['currency']);
        $this->assertSame('payment N1', $data['description']);
        $this->assertSame(array('foo' => 'bar'), $data['metadata']);
        $this->assertSame(100, $data['application_fee_amount']);
    }


    public function testDataWithCustomerReference()
    {
        $this->request->setCustomerReference('abc');
        $data = $this->request->getData();

        $this->assertSame('abc', $data['customer']);
    }

    public function testDataWithStatementDescriptor()
    {
        $this->request->setStatementDescriptor('OMNIPAY');
        $data = $this->request->getData();

        $this->assertSame('OMNIPAY', $data['statement_descriptor']);
    }
}
