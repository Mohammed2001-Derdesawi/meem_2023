<?php


namespace Modules\Course\Repositories\Course;

use Modules\Course\Entities\Course\Course;

class CourseRepository implements CourseInterface {

    public function getFreeCourses ($relations , $params , $paginate) {
        $freeCourses = Course::where('type' , 'free')
        ->with($relations)
        ->select($params)
        ->paginate($paginate);

        dd($freeCourses);
    }

}

