<?php

namespace Modules\Course\Entities\Course;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Course\Entities\Image\CourseImage;
use Modules\Student\Entities\Cart\Cart;

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
}
