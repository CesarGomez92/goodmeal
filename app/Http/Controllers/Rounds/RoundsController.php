<?php

namespace App\Http\Controllers\Rounds;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Rounds\Round;
use App\Http\Controllers\Controller;

class RoundsController extends Controller
{
    public function store(){
        request()->validate([
            'employee_name' => 'required',
        ]);

        $data = request()->all();

        $round = Round::create($data);

        return $round;
    }
}
