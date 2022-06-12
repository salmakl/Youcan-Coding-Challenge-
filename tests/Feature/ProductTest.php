<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_get_products()
    {
        $response = $this->get('api/v1/products');

        $response->assertStatus(200);
    }

    public function test_create_product()
    {
        $response = $this->post('api/v1/products', [
            'name' => 'Product 1',
            'price' => '100',
            'description' => 'Product 1 description',
            'image' => 'product1.jpg',
            'category' => 1,
        ]);

        $response->assertStatus(201);
    }
}
