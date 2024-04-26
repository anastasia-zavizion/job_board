<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    public static array $experience = ['entry','intermediate', 'senior'];
    public static array $category = ['IT','Marketing','Sales','QA'];

    protected $fillable = ['title','description','salary','location','category'];

}
