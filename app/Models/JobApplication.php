<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = ['expected_salary', 'user_id','job_id'];

    public function job():BelongsTo{
        $this->belongsTo(Job::class);
    }

    public function user():BelongsTo{
        $this->belongsTo(User::class);
    }
}
