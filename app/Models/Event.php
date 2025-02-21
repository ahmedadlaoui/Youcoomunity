<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    protected $table ="_events";

    protected $fillable = [
        'title',
        'description',
        'location',
        'time',
        'category',
        'maxparticipants',
        'user_id',
    ];

    protected $casts = [
        'time' => 'datetime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
