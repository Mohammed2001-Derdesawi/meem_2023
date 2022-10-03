<?php


namespace Modules\Course\Repositories\Course;

interface CourseInterface {
    public function getFreeCourses ($relations , $params , $paginate);
}

