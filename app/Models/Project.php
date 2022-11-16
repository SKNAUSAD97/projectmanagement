<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Milestone;

class Project extends Model
{
    use HasFactory;
    protected $guarded;
    
    public function milestones()
    {
        return $this->hasMany(Milestone::class, 'project_id', 'id');
    }
}
