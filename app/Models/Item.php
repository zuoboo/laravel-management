<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Purchase;

class Item extends Model
{
    use SoftDeletes;

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
        'price',
        'type',
        'detail',
    ];

    public function purchases()
    {
        return $this->belongsToMany(Purchase::class)
        ->withPivot('quantity');
    }

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
