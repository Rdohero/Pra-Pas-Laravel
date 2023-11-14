<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characters extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['tier','origin'];

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['tier'])) {
            $query->where('tier_id', $filters['tier']);
        }

        if (isset($filters['origin'])) {
            $query->where('origin_id', $filters['origin']);
        }

        return $query;
    }

    public function tier()
    {
        return $this->belongsTo(Tier::class);
    }

    public function origin()
    {
        return $this->belongsTo(Origin::class);
    }
}
