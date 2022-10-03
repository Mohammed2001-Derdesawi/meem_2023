<?php

namespace Modules\Course\Entities\Image;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Course\Entities\Course\Course;

class CourseImage extends Model
{
    protected $fillable = ['path' , 'course_id'];


    /**
     * Get the course that owns the CourseImage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
