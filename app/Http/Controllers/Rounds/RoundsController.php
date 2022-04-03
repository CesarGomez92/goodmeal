<?php

namespace App\Http\Controllers\Rounds;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Rounds\Round;
use App\Http\Controllers\Controller;

class RoundsController extends Controller
{
    public function store()
    {
        request()->validate([
            'employee_name' => 'required',
        ]);

        $data = ['employee_name' => request()->get('employee_name'), 'round_date' => Carbon::now()];

        $round = Round::create($data);

        return $round;
    }
}
