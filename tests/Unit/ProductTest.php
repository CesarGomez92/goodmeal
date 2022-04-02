<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Products\Product;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_search_product_when_does_not_exist()
    {
        $response = $this->get('/products/123456788');

        $response->assertStatus(404);
    }

    public function test_save_product_with_validation_error()
    {

        $data = ['price' => 7000, 'type' => 'seco', 'sku' => 'wre-254789', 'brand' => 'Nestle',
                'date_elaboration' => '2022-01-01', 'due_date' => '2022-04-03'];

        $response = $this->postJson('/products', $data);

        $response->assertStatus(422);
    }

    public function test_save_product_success()
    {
        $types = ['Frío', 'Congelado', 'Seco'];
        $weight = ['100g', '200g', '250g', '500g', '750g', '1kg'];
        $prices = [3200, 5500, 1700, 4800, 7000, 2350, 900];
        $products = ['Papitas', 'Mekato', 'Doritos', 'Leche en polvo'];

        $data = ['name' => $products[array_rand($products)] . ' '. $weight[array_rand($weight)],
                'price' => $prices[array_rand($prices)], 'type' => $types[array_rand($types)],
                'code' => random_int(1000000000, 9999999999),
                'sku' => 'wre-' . random_int(100000, 999999), 'brand' => 'Nestle',
                'date_elaboration' => Carbon::createFromFormat('Y-m-d', '2022-01-01'),
                'due_date' => Carbon::createFromFormat('Y-m-d','2022-04-03')];

        $response = $this->postJson('/products', $data);

        $response->assertStatus(201);
    }

    public function test_search_product_when_exist()
    {
        $product = Product::first();
        $response = $this->get('/products/'. $product->code);

        $response->assertStatus(200);
    }

}
