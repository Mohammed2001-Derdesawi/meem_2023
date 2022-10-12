<?php

namespace Modules\Course\Repositories\Category;

interface CategoryInterface {

    public function categories ($params);

    public function getCourses ($category_id , $relations = [] ,  $params = ['*']);

}