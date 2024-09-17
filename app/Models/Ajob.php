<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajob extends Model
{
    use HasFactory;


    protected $fillable = [
        'job_title',
        'region',
        'vacancy',
        'experience',
        'salary',
        'gender',
        'application_deadline',
        'job_description',
        'responsibilities',
        'education_experience',
        'other_benefits',
        'jobimg',
        'employment_status',
        'company_name',
        'job_location',
        'provided_id',
        'category_id',
        'views',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function applydetails()
    {
        return $this->belongsToMany(Applydetail::class);
    }


    public function incrementViews()
    {
        $this->increment('views');
    }

    public function userComments()
    {
        return $this->belongsToMany(User::class, 'ajob_user_comment')
                ->withPivot('comment')
                ->withPivot('id')
                ->withTimestamps();
    }
}
