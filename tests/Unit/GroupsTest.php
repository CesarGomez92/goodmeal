<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Rounds\Round;
use App\Models\Products\Product;

class GroupsFoundTest extends TestCase
{
    public function test_save_product_found_success()
    {
        $round = Round::firstOrCreate(['employee_name' => 'César Gómez'], ['round_date' => Carbon::now()]);

        $product = Product::firstOrCreate(['name' => 'Arroz 500g'],
                ['price' => 1200, 'type' => 'seco',
                'code' => random_int(1000000000, 9999999999),
                'sku' => 'wre-' . random_int(100000, 999999), 'brand' => 'Roa',
                'date_elaboration' => Carbon::createFromFormat('Y-m-d', '2022-01-01'),
                'due_date' => Carbon::createFromFormat('Y-m-d','2022-04-03')]);


        $data = ['product_id' => $product->id];

        $response = $this->postJson('/product-founds/' . $round->id, $data);

        $response->assertStatus(200);
    }

    public function test_save_product_found_without_product()
    {
        $round = Round::firstOrCreate(['employee_name' => 'César Gómez'], ['round_date' => Carbon::now()]);

        $data = [];

        $response = $this->postJson('/product-founds/' . $round->id, $data);

        $response->assertStatus(422);
    }

}
