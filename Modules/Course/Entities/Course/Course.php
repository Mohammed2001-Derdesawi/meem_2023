<?php

namespace Modules\Course\Entities\Course;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Course\Entities\Category\Category;
use Modules\Course\Entities\Image\CourseImage;
use Modules\Student\Entities\Cart\Cart;
use Modules\Student\Entities\Student\Student;

class Course extends Model
{
    protected $fillable = ['title' , 'lectures_num' , 'description' , 'start_at' , 'end_at', 
    'price' , 'type' , 'visiable' , 'course_time' , 'dates_image' , 'sub_title'];


    /**
     * The courses that belong to the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class, 'cart_course', 'cart_id', 'course_id')->withPivot('price');
    }


    /**
     * Get the image associated with the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function image(): HasOne
    {
        return $this->hasOne(CourseImage::class, 'course_id', 'id');
    }


    /**
     * The students that belong to the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'students_has_courses', 'student_id', 'course_id');
    }


    /**
     * Get the category that owns the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
