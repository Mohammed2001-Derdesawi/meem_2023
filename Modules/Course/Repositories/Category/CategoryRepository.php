<?php

namespace Modules\Course\Repositories\Category;

use Modules\Course\Entities\Category\Category;
use Modules\Course\Entities\Course\Course;

class CategoryRepository implements CategoryInterface {

    public function categories ($params) {
        $categories = Category::select($params)->get();
        return $categories;
    }

    public function getCourses ($category_id , $relations = [] ,  $params = ['*']) {
        $courses = Course::where('category_id' , $category_id)->select($params)->get();
        dd($courses);
    }

}