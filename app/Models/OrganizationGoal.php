<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrganizationEntry;
class OrganizationGoal extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'members_count',
        'created_by',
        'description',
        'incentive',
        'deadline',
        'k_p_i_id',
        'calls',
        'pitches'
    ];
    public function entries()
    {
        return $this->hasMany(OrganizationEntry::class);
    }

    public function kpi()
    {
        return $this->belongsTo(KPI::class);
    }

}