<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'job_listings';
    protected $guarded = [];
    //['employer_id', 'title', 'salary', 'description', 'company', 'location'];

    public function employer(){
        return $this->belongsTo(Employer::class);
    }

        }


