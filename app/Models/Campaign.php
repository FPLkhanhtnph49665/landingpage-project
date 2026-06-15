<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['uuid','title','slug','description','target_amount','collected_amount','start_at','end_at','status','metadata'];

    protected $casts = [
        'metadata' => 'array',
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function children()
    {
        return $this->belongsToMany(Child::class, 'campaign_child');
    }
}
