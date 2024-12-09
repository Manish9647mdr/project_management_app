<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    // One-to-many relationship :A project can have many tasks
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Belongs-to-relationship : The user who created the project
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Belongs-to-relationship : The user who last updated the project
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
