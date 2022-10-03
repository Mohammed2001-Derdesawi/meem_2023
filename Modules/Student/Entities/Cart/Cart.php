<?php

namespace Modules\Student\Entities\Cart;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Course\Entities\Course\Course;
use Modules\Student\Entities\Student\Student;

class Cart extends Model
{
    protected $fillable = ['student_id'];


    /**
     * Get the student that owns the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }


    /**
     * The courses that belong to the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'cart_course', 'cart_id', 'course_id')->withPivot('price');
    }
    
}
