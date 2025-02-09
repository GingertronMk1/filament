<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'pronouns',
        'position1',
        'position2',
        'position3',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'position1' => 'integer',
        'position2' => 'integer',
        'position3' => 'integer',
    ];

    public function position1(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function position2(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function position3(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }
}
