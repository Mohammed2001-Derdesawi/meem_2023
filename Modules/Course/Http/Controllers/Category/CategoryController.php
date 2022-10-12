<?php

namespace Modules\Course\Http\Controllers\Category;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Course\Repositories\Category\CategoryInterface;

class CategoryController extends Controller
{
    protected $CategoryRepo;
    public function __construct(CategoryInterface $CategoryRepo)
    {
        $this->CategoryRepo = $CategoryRepo;   
    }

    public function categories () {
        $this->CategoryRepo->categories(['id' , 'title' , 'image']);
    }


    public function getCourses ($category_id) {
        $this->CategoryRepo->getCourses($category_id , ['courses'] , ['*']);
    }
}
