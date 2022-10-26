<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    public function scopeSearchItems($query, $input = null)
    {
        if (!empty($input)) {
            if (Item::where('name', 'like', $input . '%')->exists()) {
                return $query->where('name', 'like', $input . '%');

            }
        }
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'type',
        'detail',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];
}
