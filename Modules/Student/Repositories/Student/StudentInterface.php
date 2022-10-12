<?php

namespace Modules\Student\Repositories\Student;

interface StudentInterface {
    public function getMyCourses ($relations = [] ,  $params = ['*']);
}