<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'marks',
        'activity_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
