<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messenger extends Model
{
    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var string
     */
    protected $table = 'messengers';

    public function client()
    {
        return $this->HasMany(UserToMessage::class, 'id')->get();
    }
}
