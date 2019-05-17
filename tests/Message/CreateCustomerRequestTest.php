<?php

namespace Omnipay\Stripe\Message;

use Omnipay\Tests\TestCase;

class CreateCustomerRequestTest extends TestCase
{
    public function setUp()
    {
        $this->request = new CreateCustomerRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testEndpoint()
    {
        $this->assertSame('https://api.stripe.com/v1/customers', $this->request->getEndpoint());
    }

    public function testData()
    {
        $this->request->setEmail('customer@business.dom');
        $this->request->setDescription('New customer');
        $this->request->setMetadata(array('field' => 'value'));

        $data = $this->request->getData();

        $this->assertSame('customer@business.dom', $data['email']);
        $this->assertSame('New customer', $data['description']);
        $this->assertArrayHasKey('field', $data['metadata']);
        $this->assertSame('value', $data['metadata']['field']);
    }

    public function testDataWithSource()
    {
        $this->request->setSource('xyz');
        $data = $this->request->getData();

        $this->assertSame('xyz', $data['source']);
        $this->assertFalse(isset($data['email']));
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('CreateCustomerSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('cus_1MZSEtqSghKx99', $response->getCustomerReference());
        $this->assertNull($response->getMessage());
    }

    public function testSendFailure()
    {
        $this->setMockHttpResponse('CreateCustomerFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('You must provide an integer value for \'exp_year\'.', $response->getMessage());
    }
}
