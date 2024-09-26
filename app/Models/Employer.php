<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Employer extends Model
{
    use HasFactory;
    protected $table = 'employer';
    protected $fillable = ['company',  'job', 'location', 'description'];

    public function jobs(){
        return $this->hasMany(Job::class);
    }
}
