<?php

namespace Modules\Student\Http\Controllers\Cart;

use Illuminate\Routing\Controller;
use Modules\Course\Entities\Course\Course;
use Modules\Student\Repositories\Cart\CartInterface;

class CartController extends Controller
{

    private $CartRepo;
    public function __construct(CartInterface $CartRepo)
    {
        $this->CartRepo = $CartRepo;
    }


    public function show() {
        $this->CartRepo->show(['courses'] , ['*'] , 'student');
    }


    public function store($id) {
        $course = Course::where('id' , $id)->first();
        $this->CartRepo->store($course);
    }


    public function delete($id) {
        $this->CartRepo->delete($id);
    }
}
