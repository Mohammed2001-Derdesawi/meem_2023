<?php

namespace Modules\Student\Entities\Student;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name' , 'email' , 'password' , 'phone' , 'gender' , 'image' , 'job'
     , 'specialization' , 'std_level' , 'description'];
}
