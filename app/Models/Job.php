<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;


class Job extends Model
{
    use HasFactory;
    public static array $experience = ['entry','intermediate', 'senior'];
    public static array $category = ['IT','Marketing','Sales','QA'];

    protected $fillable = ['title','description','salary','location','category'];

    public function scopeFilter(Builder| QueryBuilder $query,array $filters) : Builder| QueryBuilder{

        return $query->when($filters['search'] ?? null, function ($query) use ($filters) {
            $query->where(function ($query) use ($filters){
                $query->where('title', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('description', 'like', '%' . $filters['search'] . '%');
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

}
