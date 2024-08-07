<?php

namespace App\Tests\Catalog\Product\Presentation\Controller\Post;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostProductActionTest extends WebTestCase
{
    private readonly KernelBrowser $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    public function testCreateProduct(): void
    {
        $this->client->jsonRequest('POST', '/products', [
            'id' => '018b6d1a-5d95-7461-bb15-61544739c92a',
            'name' => 'Product 1',
            'description' => 'Product 1 description',
            'price' => [
                'amount' => '1499',
                'currency' => 'EUR',
            ],
            'status' => 'draft',
        ]);

        $expected = [
            'id' => '018b6d1a-5d95-7461-bb15-61544739c92a',
            'name' => 'Product 1',
            'description' => 'Product 1 description',
            'price' => [
                'amount' => '1499',
                'currency' => 'EUR',
            ],
            'status' => 'draft',
            'createdAt' => '@is_string_datetime',
        ];

        self::assertEquals($expected, $this->client->getInternalResponse()->toArray());
    }
}
