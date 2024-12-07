<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icon', 'members']; // Fillable fields

    // If you want to add relationships (e.g., a community has many posts), you can define them here
}
