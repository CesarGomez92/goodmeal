<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Rounds\Round;

class RoundsTest extends TestCase
{
    public function test_save_round_success()
    {
        $employee_names = ['César Gómez', 'Johan Patiño', 'Yeny Villada',];

        $data = ['employee_name' => $employee_names[array_rand($employee_names)]];

        $response = $this->postJson('/rounds', $data);

        $response->assertStatus(201);
    }

    public function test_save_round_without_employee_name()
    {
        $data = [];

        $response = $this->postJson('/rounds', $data);

        $response->assertStatus(422);
    }

    public function test_get_rounds_list()
    {
        $response = $this->get('/rounds');

        $response->assertStatus(200);
    }

    public function test_get_products_found_without_group_list()
    {
        $round = Round::firstOrCreate(['employee_name' => 'César Gómez'], ['round_date' => Carbon::now()]);

        $response = $this->get('/rounds/' . $round->id . '/products-founds-without-group');

        $response->assertStatus(200);
    }

}
