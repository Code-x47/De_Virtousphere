<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function projectBelongs() {
        return $this->belongsTo(User::class,"user_id");
        }
    
        public function projectHas() {
            return $this->hasMany(Task::class,"project_id");
        }
}
