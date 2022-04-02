<?php

namespace App\Models\Rounds;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    protected $fillable = ['employee_name', 'round_date'];

    protected $dates = ['created_at', 'updated_at', 'round_date',];

    protected $hidden = ['created_at', 'updated_at'];
}
