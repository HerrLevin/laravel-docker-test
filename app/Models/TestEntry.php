<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class TestEntry extends Model
{
    use HasUuids;

    protected $fillable = [
        'created_by',
    ];
}
