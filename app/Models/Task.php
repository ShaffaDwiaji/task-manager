<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $hidden = [
        'updated_at',
        'created_at'
    ];
    protected $table = 'tugas';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description', 'status', 'due_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
