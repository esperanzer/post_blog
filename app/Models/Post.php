<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes; // professional traits

    // Mass assignable fields
    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];


    // Relationship: each post belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Optional: cast fields to proper types
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',

    ];

    // Optional helper method example
    public function isRecent()
    {
        return $this->created_at->gt(now()->subWeek());
    }
}
