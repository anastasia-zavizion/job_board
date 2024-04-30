<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\JobApplication;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;
    public static array $experience = ['entry','intermediate', 'senior'];
    public static array $category = ['IT','Marketing','Sales','QA'];

    protected $fillable = ['title','description','salary','location','category'];
    protected $appends = ['salary_formatted'];

    protected function salaryFormatted(): Attribute //accessor
    {
        return Attribute::make(
            get: fn () => '$ '.number_format($this->salary)
        );
    }


    public function employer() : BelongsTo
    {
        return $this->belongsTo(Employer::class);

    }


    public function scopeFilter(Builder| QueryBuilder $query,array $filters) : Builder| QueryBuilder{

        return $query->when($filters['search'] ?? null, function ($query,$value) {
            $query->where(function ($query) use ($value){
                $query->where('title', 'like', '%' . $value . '%')
                    ->orWhere('description', 'like', '%' . $value . '%')
                    ->orWhereHas('employer', function ($query) use ($value){
                        $query->where('company_name','LIKE','%' . $value . '%');
                    })
                ;
            });
        })->when($filters['min_salary']  ?? null, function ($query, $value){
            $query->where('salary', '>=', $value);
        })->when($filters['max_salary']  ?? null, function ($query,$value) {
            $query->where('salary', '<=', $value);
        })->when($filters['experience']  ?? null, function ($query,$value){
            $query->where('experience', $value);
        })->when($filters['category']  ?? null, function ($query,$value) {
            $query->where('category', $value);
        });
    }

    public function jobApplications():HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function hasUserApplied(User $user){
       return $this->where('id', $this->id)->whereHas('jobApplications',fn($query)=> $query->where('user_id',$user->id))->exists();
    }

}
