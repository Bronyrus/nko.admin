<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Case extends Model
{
    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var string
     */
    protected $table = 'cases';
}
