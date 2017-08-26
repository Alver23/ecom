<?php

namespace Ecom\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'parent_menu_id',
        'name',
        'url',
        'orden',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentMenu()
    {
        return $this->belongsTo(Menu::class, 'parent_menu_id');
    }
}
