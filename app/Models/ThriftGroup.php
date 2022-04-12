<?php

namespace App\Models;

use App\Enums\ThriftSchedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThriftGroup extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'token',
        'name',
        'thrifters',
        'amount',
        'total_amount',
        'details',
        'is_open',
        'start_date',
        'schedule',
        'slot_positions'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'slot_positions' => 'array'
        // 'schedule' => ThriftSchedule::class, // Only available for php 8.1
    ];

    /**
     * Get the user that owns the UserThriftGroup
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
