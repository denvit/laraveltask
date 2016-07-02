<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobTag extends Model
{
    protected $table = 'job_tag';

    protected $fillable = ['job_id', 'tag_id'];

    public $timestamps = false;
}
