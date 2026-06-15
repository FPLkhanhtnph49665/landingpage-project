<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Child extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['uuid','name','gender','dob','bio','photo','status','metadata'];

    protected $casts = [
        'metadata' => 'array',
        'dob' => 'date',
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_child');
    }
}
