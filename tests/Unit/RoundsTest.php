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

        $data = ['employee_name' => 'César Gómez', 'round_date' => Carbon::createFromFormat('Y-m-d', '2022-04-04')];

        $response = $this->postJson('/rounds', $data);

        $response->assertStatus(201);
    }

}
