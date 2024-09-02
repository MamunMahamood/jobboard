<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Applydetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'career_objective',
        'user_id',
        'photo',
        'cv',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ajobs()
    {
        return $this->belongsToMany(Ajob::class);
    }
}


