<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * @var string
     */
    protected $table = 'profile';

    /**
     * @var string
     *
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    protected $attributes = [
        'name' => '(NULL)',
    ];
}
