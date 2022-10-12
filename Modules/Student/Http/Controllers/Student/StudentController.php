<?php

namespace Modules\Student\Http\Controllers\Student;

use Illuminate\Routing\Controller;
use Modules\Student\Repositories\Student\StudentInterface;

class StudentController extends Controller
{
    protected $StudentRepo;
    public function __construct(StudentInterface $StudentRepo)
    {
        $this->StudentRepo = $StudentRepo;
    }

    public function getMyCourses () {
        $this->StudentRepo->getMyCourses(['courses']);
    }
}
