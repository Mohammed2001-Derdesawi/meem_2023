<?php

namespace Modules\Course\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Course\Repositories\Course\CourseInterface;

class CourseController extends Controller
{

    private $CourseRepo;
    public function __construct(CourseInterface $CourseRepo)
    {
        $this->CourseRepo = $CourseRepo;
    }


    public function getFreeCourses () {
        $this->CourseRepo->getFreeCourses($relations = [] , $params = ['*'] , $paginate = 9);
    }
}
