<?php

namespace Modules\Student\Entities\Student;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Course\Entities\Course\Course;
use Modules\Student\Entities\Cart\Cart;

class Student extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'gender', 'image', 'job', 'specialization', 'std_level', 'description'
    ];


    /**
     * Get the cart associated with the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cart(): HasOne
    {
        return $this->hasOne(Cart::class, 'student_id', 'id');
    }


        /**
     * The courses that belong to the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'students_has_courses', 'student_id', 'course_id');
    }
}
