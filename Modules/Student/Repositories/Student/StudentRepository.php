<?php

namespace Modules\Student\Repositories\Student;

use Illuminate\Support\Facades\Auth;
use Modules\Student\Entities\Student\Student;

class StudentRepository implements StudentInterface {

    public function getMyCourses ($relations = [] ,  $params = ['*']) {
        $student_courses = Student::where('id' , Auth::guard('student')->user()->id)->with(['courses' => function($query) {
            $query->where('visiable' , 1)->select('id','title');
        }])->get();
        dd($student_courses);
    }

}