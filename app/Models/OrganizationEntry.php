<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationEntry extends Model
{
    use HasFactory;
    protected $fillable = [
        'organization_goal_id',
        'calls',
        'user_id',
        'performed_on',
        'pitches'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function organizationGoal()
    {
        return $this->belongsTo(OrganizationGoal::class);
    }
}