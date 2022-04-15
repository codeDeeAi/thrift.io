<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThriftActivity extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'thrift_group_id',
        'type',
        'details',
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
        'created_at' => 'datetime:Y-m-d H:m:s',
        'details' => 'array'
    ];

    /**
     * Get the thrift_group that owns the ThriftActivity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thrift_group()
    {
        return $this->belongsTo(ThriftGroup::class, 'thrift_group_id', 'id');
    }
}
