<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = ['expected_salary', 'user_id','job_id', 'cv_path'];
    protected $appends = ['expected_salary_formatted'];

    public function job():BelongsTo{
       return $this->belongsTo(Job::class);
    }

    public function user():BelongsTo{
        return  $this->belongsTo(User::class);
    }

    protected function expectedSalaryFormatted(): Attribute //accessor
    {
        return Attribute::make(
            get: fn () => '$ '.number_format($this->expected_salary)
        );
    }
}
