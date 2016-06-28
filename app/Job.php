<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    protected $table = 'jobs';
    protected $fillable = ['email', 'title', 'description', 'location'];
    protected $dates = ['deleted_at'];

}
